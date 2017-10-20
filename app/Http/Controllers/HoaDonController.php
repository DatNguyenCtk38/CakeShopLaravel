<?php

namespace App\Http\Controllers;
use App\Bill;
use App\BillDetail;
use DB;
use App\Discount_code;
use Auth;
use Illuminate\Http\Request;

class HoaDonController extends Controller
{
    public function getDanhSachHoaDon(){
    	$danhSachHoaDon = Bill::all();
    	return view('admin.hoadon.danhsach',compact('danhSachHoaDon'));
    }
    public function getXoaDSHoaDon(Request $req){
    	foreach ($req->product_id as $key => $id) {
    		$hoaDon  = Bill::find($id);
    		$hoaDon->delete();
    	}
    	return "success";
    }
    public function getChiTietHoaDon($id){
        $chiTietHoaDon = BillDetail::where('id_bill',$id)->paginate(5);
        return view('admin.hoadon.chitiethoadon',compact('chiTietHoaDon'));
    }
    public function getDuyet(Request $req){
        $hoaDon  = Bill::find($req->bill_id);
        $hoaDon->status = 1;
        $hoaDon->save();
        if ($hoaDon->total >= 500000 && $hoaDon->total <1000000) {
                $discount_code  = new Discount_code;
                $discount_code->name = $this->generateRandomString(15);
                $discount_code->description ="Mã giảm giá 10% trên tổng hóa đơn";
                $discount_code->value = 10;
                $discount_code->user_id = Auth::user()->id;
                $discount_code->save();
                return 1;
            }
            elseif($hoaDon->total >= 1000000){
                $discount_code  = new Discount_code;
                $discount_code->name = $this->generateRandomString(15);
                $discount_code->description ="Mã giảm giá 15% trên tổng hóa đơn";
                $discount_code->value = 15;
                $discount_code->user_id = Auth::user()->id;
                $discount_code->save();
                return 1;
            }
            else{

                return 1;
            }
        return 1;
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
