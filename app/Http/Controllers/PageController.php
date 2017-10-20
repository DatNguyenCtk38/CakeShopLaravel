<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;
use App\Cart;
use App\Customer;
use App\Bill;
use App\BillDetail;
use App\User;
use Hash;
use Auth;
use Session;
use Mail;
use DB;
use App\Discount_code;
use App\Mail\SendMail;
class PageController extends Controller
{
    public function getIndex(){
    	
    	$promotion_product = Product::where('promotion_price','<>',0)->paginate(6);
        $top3Crepe = Product::where('id_type',4)->take(9)->get();
       
    	//print_r($top3Crepe);
    //	die();
    	//return view('page.trangchu',['slide'=>$slide]);
    	return view('page.trangchu',compact('top3Crepe','promotion_product'));
    }
    public function getLoaiSp($type, Request $req){
        $sp_theoloai;
        switch ($req->order) {
            case 'price-asc':
               $sp_theoloai = Product::where('id_type',$type)->orderBy('unit_price', 'asc')->paginate(9);
                break;
            case 'price-desc':
               $sp_theoloai = Product::where('id_type',$type)->orderBy('unit_price', 'desc')->paginate(9);
                break;
            case 'name':
               $sp_theoloai = Product::where('id_type',$type)->orderBy('name', 'asc')->paginate(9);
                break;
            default:
                $sp_theoloai = Product::where('id_type',$type)->paginate(9);
                break;
        }
        
       
        $loai_sp = ProductType::where('id',$type)->first();
        //print_r($loai_sp);
        //die();
    	return view('page.loaisanpham',compact('sp_theoloai','loai_sp'));
    }
    public function getChiTietSanPham(Request $req){
        $product = Product::where('id',$req->id)->first();
        $relateProduct = Product::where('id_type',$product->id_type)->paginate(8);
    	return view('page.chitietsanpham',compact('product','relateProduct'));
    }
    public function getLienHe(){
    	return view('page.lienhe');
    }
    public function getGioiThieu(){
      
    	return view('page.gioithieu');
    }
    public function getAddToCart(Request $req,$id){
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        return redirect()->back(); 
    }
    public function getAddcartajax(Request $req){
        $id = $req->id;
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        echo Session('cart')->totalQty;
    }
    public function getDelItemCart($id){
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items)>0) {
            Session::put('cart',$cart);
        }
        else {
            Session::forget('cart');
        }
        return redirect()->back();
    }
    public function getCheckout(){

        if (Auth::check()) {
            $listDiscount = Discount_code::where('user_id',Auth::user()->id)->get();
            return view('page.dathang',compact('listDiscount'));
        }
           
            return view('page.dathang');
    }
    public function postCheckout(Request $req){
        $cart = Session::get('cart');
        //var_dump($cart);
        if ($req->value_code > 0) {
            $giamGia = $req->value_code;
        }
        else{
            $giamGia = 0;
        }
        $id_customer;
        if (Auth::check()) {
            $id_customer = Auth::user()->id;
        }
        else{
            
                $id_customer =  null;
        }
        $bill = new Bill;
        $bill->id_user = $id_customer;
        $bill->customer_name = $req->name;
        $bill->phone_number = $req->phone;
        $bill->address = $req->address;
        $bill->date_order = date('Y-m-d');
        $bill->total = $cart->totalPrice-($cart->totalPrice*0.01*$giamGia);
        $bill->payment = $req->payment_method;
        $bill->note = $req->notes;
        $bill->status = 0;
        $bill->save();
        
        if ($giamGia >0) {
            $discount = Discount_code::where('name',$req->code)->get();
            $discount[0]->delete();
        }
       
        foreach ($cart->items as $key => $value) {
            $bill_detail = new BillDetail;
            $bill_detail->id_bill = $bill->id;
            $bill_detail->id_product = $key;
            $bill_detail->quantity = $value['qty'];
            $bill_detail->unit_price = $value['price']/$value['qty'];
            $bill_detail->save();
        }
        //print_r($cart);
        //die();
        //--------------------------MAIL-------------------
        //Mail::send(new newMail());
        //$listBill = BillDetail::where('id_bill',$bill->id)->get();
        $listBill= DB::table('bill_detail')
                ->join('products','products.id','bill_detail.id_product')
                ->select('bill_detail.*','products.name','products.image')
                ->where('bill_detail.id_bill','=',$bill->id)
                ->get();
        //print_r($listBill);
        
        Mail::send(new SendMail($listBill,$req->name,$req->phone,$req->address,$bill->created_at,$bill->total, $req->email));
        //__________________________MAIL___________________
        Session::forget('cart');
        
        return view('page.thongbaodathang',compact('bill','giamGia'));
       
    }
    public function getLogin(){
        return view('page.dangnhap');
    }
    public function getSignin(){
        return view('page.dangky');
    }
    public function postSignin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email|unique:users,email', 
                'password'=>'required|min:6|max:20',
                'fullname'=>'required',
                're_password'=>'required|same:password'
            ]
            ,
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Vui lòng nhập đúng định dạng email',
                'email.unique'=>'Email đã có người sử dụng',
                're_password.required'=>'Vui lòng điền mật khẩu',
                're_password.same'=>'Mật khẩu không giống nhau',
                'password.min'=>'Mật khẩu phải có ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không dài quá 20 kí tự'
            ]);
        $user = new User;
        $user->full_name =$req->fullname;    
        $user->email = $req->email;
        $user->address = $req->address;
        $user->phone_number = $req->phone;
        $user->password = Hash::make($req->password);
        $user->authority = 0;
        $user->save();
        return redirect()->back()->with('thanhcong','Tạo tài khoản thành công');
    }
    public function postLogin(Request $req){
        $this->validate($req,
            [
                'email'=>'required|email',
                'password'=>'required|min:6|max:20'
            ],
            [
                'email.required'=>'Vui lòng nhập email',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Vui lòng nhập mật khẩu',
                'password.min'=>'Mật khẩu ít nhất 6 kí tự',
                'password.max'=>'Mật khẩu không quá 20 kí tự'
            ]
        );
        $credentials = array('email'=>$req->email,'password'=>$req->password);
        
            if(Auth::attempt($credentials)){
                return redirect()->back();
            //return redirect()->route('trang-chu');
            }
            else{
                return redirect()->back()->with(['flag'=>'danger','message'=>'Đăng nhập không thành công']);
            }
        }
        
    public function postLogout(){
        Auth::logout();
        return redirect()->route('trang-chu');
    }
    public function getTimKiem(Request $req){
        $product = Product::where('name','like','%'.$req->key.'%')->orWhere('unit_price',$req->key)->get();
        return view('page.timkiem',compact('product'));
    }
    public function postTimTheoGia(Request $req){
        $products;
        switch ($req->keyword) {
            case '0to100':
                 $products= Product::where('unit_price','<',100000)->paginate(6);
                break;
            case '100to200':
                 $products= Product::whereBetween('unit_price', [100000, 200000])->paginate(6);
                # code...
                break;
            case '200tomax':
                $products= Product::where('unit_price','>',200000)->paginate(6);
                # code...
                break;
            default:
                $products = Product::where('name','like','%'.$req->keyword.'%')->orWhere('unit_price',$req->keyword)->paginate(6);
                break;
            
        }
        return view('page.timkiem',compact('products'));
    }
  

    public  function generateRandomString($length = 20) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}
