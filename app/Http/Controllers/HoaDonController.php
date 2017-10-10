<?php

namespace App\Http\Controllers;
use App\Bill;
use DB;
use Illuminate\Http\Request;

class HoaDonController extends Controller
{
    public function getDanhSachHoaDon(){
    	$danhSachHoaDon = DB::table('bills')
    	->select('bills.*','customer.name')
    	->join('customer','bills.id_customer','=','customer.id')
    	->orderBy('bills.id','DESC')
    	->get();
    	return view('admin.hoadon.danhsach',compact('danhSachHoaDon'));
    }
    public function getXoaDSHoaDon(Request $req){
    	foreach ($req->product_id as $key => $id) {
    		$hoaDon  = Bill::find($id);
    		$hoaDon->delete();
    	}
    	return "success";
    }
}
