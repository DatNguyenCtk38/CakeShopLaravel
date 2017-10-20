<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\BillDetail;
use App\Bill;
use Auth;
use Hash;
use App\Discount_code;
class FrontUserController extends Controller
{
    public function getQuanLyTaiKhoan(){
        return view('user.quanlytaikhoan');
    }
    public function getEditEmail(){
    	return view('user.thaydoiemail');
    }
    public function postEditEmail(Request $req){
    	$this->validate($req,
            [
                'Newemail'=>'required|email|unique:users,email', 
                'password'=>'required|min:6|max:20',
            ]
            ,
            [
                'Newemail.required'=>'Vui lòng nhập email',
                'Newemail.email'=>'Vui lòng nhập đúng định dạng email',
                'Newemail.unique'=>'Email đã có người sử dụng',
                'password.min'=>'Mật khẩu phải có ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 20 kí tự'
            ]);
    		if(Hash::check($req->password, Auth::user()->password))
    		{
            	$user = User::find(Auth::user()->id);
            	$user->email = $req->Newemail;
            	$user->save();
                return redirect()->back()->with('thanhcong','Đổi email thành công');
            //return redirect()->route('trang-chu');
            }
            else{
                return redirect()->back()->with(['flag'=>'danger','message'=>'Mật khẩu không chính xác']);
        }
    }
    public function getEditProfile(){
    	return view('user.thaydoithongtingiaohang');;
    }
    public function postEditProfile(Request $req){
        $this->validate($req,
            [
                'password'=>'required|min:6|max:20',
                'name'=>'required|min:6|max:50',
                'address'=>'required|min:6|max:100',
                'phone_number'=>'required|min:6|max:50',
            ]
            ,
            [
                'password.required'=>'Vui lòng nhập mật khẫu',  
                'name.required'=>'Vui lòng nhập tên',  
                'address.required'=>'Vui lòng nhập địa chỉ', 
                'phone_number.required'=>'Vui lòng nhập số điện thoại',     
                'name.max'=>'Họ và tên không quá 50 kí tự',
                'name.min'=>'Tên phải có ít nhất 6 kí tự',
                'address.max'=>'Địa chỉ không quá 100 kí tự',
                'address.min'=>'Địa chỉ phải có ít nhất 6 kí tự',
                'phone_number.max'=>'Số điện thoại không quá 20 kí tự',
                'phone_number.min'=>'Số điện thoại phải có ít nhất 6 kí tự',
                'password.min'=>'Mật khẩu phải có ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 20 kí tự'
            ]);
            if(Hash::check($req->password, Auth::user()->password))
            {
                $user = User::find(Auth::user()->id);
                $user->full_name = $req->name;
                $user->address = $req->address;
                $user->phone_number = $req->phone_number;
                $user->save();
                return redirect()->back()->with('thanhcong','Thay đổi thông tin thành công');
            //return redirect()->route('trang-chu');
            }
            else
            {
                return redirect()->back()->with(['flag'=>'danger','message'=>'Mật khẩu không chính xác']);
        }
    }
    public function getchangePassword(){
        return view('user.thaydoimatkhau');
    }
    public function postchangePassword(Request $req){
         $this->validate($req,
            [              
                'newpassword'=>'required|min:6|max:20',
                'oldpassword'=>'required',
                're_password'=>'required|same:newpassword'
            ]
            ,
            [
                'newpassword.required'=>'Vui lòng nhập mật khẫu cũ',                
                're_password.required'=>'Vui lòng điền mật khẩu',
                're_password.same'=>'Mật khẩu mới không giống với mật khẩu xác nhận',
                'newpassword.min'=>'Mật khẩu phải có ít nhất 6 kí tự',
                'newpassword.max'=>'Mật khẩu không quá 20 kí tự'
            ]);
        if(Hash::check($req->oldpassword, Auth::user()->password)){
            $user = User::find(Auth::user()->id);
            $user->password =Hash::make($req->re_password);
            $user->save();
            return redirect()->back()->with('thanhcong','Đổi mật khẩu thành công');
        }
            else{
                return redirect()->back()->with(['flag'=>'danger','message'=>'Mật khẩu cũ không chính xác']);
            }
        
    }
    public function getLichSuMuaHang(){
        $id = Auth::user()->id;
        $danhSachHoaDon = Bill::where('id_user',$id)->where('status',1)->paginate(5);
        return view('user.lichsumuahang',compact('danhSachHoaDon'));
    }	
    public function getChiTietMuaHang($id){
        $chiTietMuaHang = BillDetail::where('id_bill',$id)->paginate(5);
        return view('user.chitietmuahang',compact('chiTietMuaHang'));
    }
    public function getDonHang(){
        $id = Auth::user()->id;
        $danhSachHoaDon = Bill::where('id_user',$id)->where('status',0)->paginate(5);
        return view('user.dondathang',compact('danhSachHoaDon'));
    }
    public function xoadondathang(Request $req){
            $hoaDon = Bill::find($req->id);
            $hoaDon->delete();
            return $req->id;
     
    }
    public function getMaGiamGia(){
        $danhSachMa = Discount_code::where('user_id',Auth::user()->id)->paginate(5);
        return view('user.magiamgia',compact('danhSachMa'));
    }
}
