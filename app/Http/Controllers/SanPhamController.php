<?php

namespace App\Http\Controllers;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;
use DB;
use File;
class SanPhamController extends Controller
{
    public function getDanhSachSanPham(){
         $nhomsp = ProductType::all();
    	$danhSachSP = DB::table('products')
        ->select('products.*','type_products.catename')
    	->join('type_products','products.id_type','=','type_products.id')
        ->orderby('products.id','desc')
    	->get();
    	//print_r($danhSachSP);
    	//die();
        //
    	return view('admin.sanpham.danhsach',compact('danhSachSP','nhomsp'));
    }
    
    public function getThemSanPham(){
        $nhomsp = ProductType::all();
    	return view('admin.sanpham.them',compact('nhomsp'));
    }
   public function postThemSanPham(Request $req){

        
        $sanPham = new Product();

        $sanPham->name = $req->name;
        $sanPham->id_type= $req->id_type;
        $sanPham->slug = str_slug($req->name);
        $sanPham->description = $req->description;
        $sanPham->unit_price = $req->unit_price;
        $sanPham->promotion_price = $req->promotion_price;
        $sanPham->unit = $req->unit;
        $sanPham->new = $req->news;
        if ($req->hasFile('image')) {
            $f = $req->file('image')->getClientOriginalName();

            $filename = time().'_'.$f;

            $sanPham->image = $filename;

            $req->file('image')->move('public/source/images/stories/virtuemart/product/',$filename);
        }
        
        $sanPham->save();
        //ajax về
        $danhSachSP = DB::table('products')
        ->select('products.*','type_products.catename')
        ->join('type_products','products.id_type','=','type_products.id')
        ->orderby('products.id','desc')
        ->get();
        $output = '';
        $output.='
                    <table class="table table-striped table-bordered table-hover" id="example">
                        <thead>

                            <tr align="center">
                                <th>ID</th>
                                <th>Tên sản phẩm</th>
                                <th>Nhóm</th>
                               
                                <th>Hình ảnh</th>
                                
                                <th>Giá</th>
                                <th>KM</th>
                                <th>Đơn vị</th>
                                <th>Mới</th>
                                <th>Xóa</th>
                                <th>Sửa</th>
                            </tr>
                        </thead>
                        <tbody>
                    ';

                                foreach($danhSachSP as $sanpham){
                                    $xoa = "admin/sanpham/xoasanpham/".$sanpham->id."";
                                    $sua = "admin/sanpham/sua-san-pham/".$sanpham->id."";
        $output.='           
                                    <tr class="odd gradeX" align="center">
                                        <td>'.$sanpham->id.'</td>
                                        <td>'.$sanpham->name.'</td>
                                        <td>'.$sanpham->catename.'</td>
                                        
                                        <td><img width="100px" height="100px" src="public/source/images/stories/virtuemart/product/'.$sanpham->image.'"></td>
                                        
                                        <td>'.$sanpham->unit_price.'</td>
                                        <td>'.$sanpham->promotion_price.'</td>
                                        <td>'.$sanpham->unit.'</td>
                                        <td>'.$sanpham->new.'</td>
                                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href='.$xoa.'> Xóa</a></td>
                                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href='.$sua.'> Sửa</a></td>
                                       
                                    </tr>
                ';
                               }
         $output.='  </tbody>
                    </table>
                     <script type="text/javascript">
                      $("#example").dataTable( 
                    {
                    "bSort" : false,
                    "searching": true,
                    " paging": true
                    } );
                    </script>
                 ';
       
       return response()->json($output);
    }
    public function getSuaSanPham($id){
        $sanPham = Product::find($id);
        $nhomsp = ProductType::all();
        return view('admin.sanpham.sua',compact('sanPham','nhomsp'));
    }
    public function postSuaSanPham(Request $req,$id){
        $this->validate($req,
            [
                'name'=>'required|min:6|max:50',
                'unit_price'=>'required|integer|between:1000,9999999',
                'promotion_price'=>'integer|between:1000,9999999',
                
            ],
            [
                'name.required'=>"Vui lòng điền tên sản phẩm",
               
                'name.min'=>"Tên sản phẩm ít nhất 6 kí tự",
                'name.max'=>"Tên sản phẩm không dài quá 50 kí tự",
                'unit_price.required'=>"Vui lòng điền giá sản phẩm",
               
                'unit_price.between'=>"Giá sản phẩm phải nằm từ 1000 đồng đến 9999999 đồng",
               
                'promotion_price.between'=>"Giá sản phẩm phải nằm từ 1000 đồng đến 9999999 đồng",
                'unit.required'=>"Vui lòng nhập đơn vị sản phẩm",
                
            ]
            );
        $sanPham = Product::find($id);

        $sanPham->name = $req->name;
        $sanPham->id_type= $req->id_type;
        $sanPham->slug = str_slug($req->name);
        $sanPham->description = $req->description;
        $sanPham->unit_price = $req->unit_price;
        $sanPham->promotion_price = $req->promotion_price;
        $sanPham->unit = $req->unit;
        $sanPham->new = $req->news;
        $file_path = 'public/source/image/product/'.$sanPham->image;   
        
             
        if ($req->hasFile('image')) {
            if (File::exists($file_path))
                {
                    File::delete($file_path);
                }
            
            $f = $req->file('image')->getClientOriginalName();
            $filename = time().'_'.$f;
            $sanPham->image = $filename;       
            $req->file('image')->move('public/source/image/product/',$filename);
        }       
      
        $sanPham->save();
        return redirect()->route('danhsachsanpham')->with('thongbao','Sửa thành công');
    }
    public function getXoaSanPham($id){
        $sanPham = Product::find($id);
        $sanPham->delete();
        return redirect()->back()->with('thongbao','Xóa thành công');
    }
}
