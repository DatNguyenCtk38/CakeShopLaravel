<?php

namespace App\Http\Controllers;
use App\Bill;
use DB;
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
}
