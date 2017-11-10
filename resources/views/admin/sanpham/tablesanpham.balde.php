<table class="table table-striped table-bordered table-hover" id="example">
                        <thead>

                            <tr align="center">
                                <th></th>
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

                                @foreach($danhSachSP as $sanpham)
                                    $xoa = "admin/sanpham/xoasanpham/".$sanpham->id."";
                                    $sua = "admin/sanpham/sua-san-pham/".$sanpham->id."";
                  
                                     <tr id="row_{{$sanpham->id}}'" value="{{$sanpham->id}}"  class="odd gradeX" align="center">
                                      <td><input type="checkbox" name="product_id[]" class="delete_product" value="{{$sanpham->id}}" /></td>
                                        <td>{{$sanpham->id}}</td>

                                        <td id="td_name" value="{{$sanpham->id}}">{{$sanpham->name}}</td>
                                        <td>{{$sanpham->catename}}</td>
                                        
                                        <td><img width="100px" height="100px" src="public/source/images/stories/virtuemart/product/{{$sanpham->image}}"></td>
                                        
                                        <td>{{$sanpham->unit_price}}</td>
                                        <td>{{$sanpham->promotion_price}}</td>
                                        <td>{{$sanpham->unit}}</td>
                                        <td>{{$sanpham->new}}</td>
                                        <td class="center"><button onclick="xoasanpham()" id="{{$sanpham->id}}" value ="{{$sanpham->name}}" class="delete-modal btn btn-danger"  data-id="" data-name="">
                                          <span class="glyphicon glyphicon-edit"></span> Xóa
                                        </button></td>
                                        <td class="center"><button class="edit-modal btn btn-info" id='{{$sanpham->id}}' >
                                            <span class="glyphicon glyphicon-edit"></span> Sửa
                                          </button></td>
                                       
                                    </tr>
                                @endforeach
                               
             </tbody>
                    </table>
                     <script type="text/javascript">
                      $("#example").dataTable( 
                    {
                    "bSort" : false,
                    "searching": true,
                    " paging": true
                    } );
                        
                    </script>