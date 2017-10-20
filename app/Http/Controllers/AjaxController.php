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
use App\Discount_code;
use App\User;
use Hash;
use Auth;
use Session;
use Mail;
class AjaxController extends Controller
{
   	public function getAddcartajax(Request $req){
        $id = $req->id;
        $product = Product::find($id);
        $oldCart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->add($product,$id);
        $req->session()->put('cart',$cart);
        echo Session('cart')->totalQty;
    }

    public function getUpdatecartajax(Request $req){
      	 $id =$req->id;
      	 $oldCart = Session::has('cart')?Session::get('cart'):null;
       	 $cart = new Cart($oldCart);
         $product = Product::find($id);
         if($req->sl>$cart->items[$id]['qty']){
           $cart->add($product,$id);
          }
          else{
            $cart->reduceByOne($id);
          }
         $req->session()->put('cart',$cart);
         return response()->json($cart);
          //  echo number_format($cart->items[$id]['qty']*$req->dg,0, ',', '.').' VNĐ';
            
        

       	//echo "<script>console.log( 'Debug Objects: " . $id . "' );</script>";
    }
    public function getDeletecartajax(Request $req){
         $id =$req->id;
         $oldCart = Session::has('cart')?Session::get('cart'):null;
         $cart = new Cart($oldCart);
         $cart->removeItem($id);
         $req->session()->put('cart',$cart);
          return response()->json($cart);
    }
    public function SortChangeajax(Request $req){
        $promotion_product;
        switch ($req->type) {
          case 'des':
          $promotion_product =  Product::where('promotion_price','<>',0)->orderBy('unit_price', 'desc')->paginate(6);
            # code...
            break;
          case 'asc':
          $promotion_product =  Product::where('promotion_price','<>',0)->orderBy('unit_price', 'asc')->paginate(6);
            break;
          case 'name':
          $promotion_product =  Product::where('promotion_price','<>',0)->orderBy('name', 'asc')->paginate(6);
            break;
          default:
            # code...
            break;
        }

        $returnHtml = view('Page.banhmoi',compact('promotion_product'))->render();
        return response()->json( array('success' => true, 'html'=>$returnHtml) );
    }
    public function CheckCode(Request $req){
        $code = Discount_code::where('name',$req->code_name)->get();
        if (count($code) > 0) {
           return response()->json(array('success'=>$code[0]->value,'response'=>1));
        }
        else{
           return response()->json(array('success'=>0,'response'=>0));
        }
    }
}
