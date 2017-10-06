@extends('admin.layout.index')
@section('content')
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
    <script type="text/javascript"> 
      $(document).ready( function() {
        $('#notify').delay(2000).fadeOut();
      });
    </script>
<div id="page-wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Danh mục
                        <small>Sản Phẩm</small>
                          <button style="float: right;" type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Thêm</button>
                    </h1>
                
                </div>
               
                @if(Session::has('thongbao'))
                        <div id ="notify" class="alert alert-success">{{Session::get('thongbao')}}</div>
                    @endif  

                <!-- /.col-lg-12 -->
                <div id="list_product">
                  
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
                                @foreach($danhSachSP as $sanpham)
                                    <tr class="odd gradeX" align="center">
                                        <td>{{$sanpham->id}}</td>
                                        <td>{{$sanpham->name}}</td>
                                        <td>{{$sanpham->catename}}</td>
                                        
                                        <td><img width="100px" height="100px" src="public/source/images/stories/virtuemart/product/{{$sanpham->image}}"></td>
                                        
                                        <td>{{$sanpham->unit_price}}</td>
                                        <td>{{$sanpham->promotion_price}}</td>
                                        <td>{{$sanpham->unit}}</td>
                                        <td>{{$sanpham->new}}</td>
                                       
                                        <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('xoasanpham',$sanpham->id)}}"> Xóa</a></td>
                                        <td class="center"><i class="fa fa-pencil fa-fw"></i> <a href="{{route('suasanpham',$sanpham->id)}}">Sửa</a></td>
                                    </tr>
                                @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
     <div id="add_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Thêm sản phẩm</h4>
   </div>
   <div class="modal-body">
    <form method="POST" id="insert_form" enctype="multipart/form-data">
       @if(count($errors)>0)
                        <div id ="notify" class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{$error}}
                            @endforeach
                        </div>
                @endif
                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                        <div class="alert alert-danger print-error-msg" style="display:none">
                          <ul></ul> 
                        </div>
                        <meta name="csrf-token" content="{{ csrf_token() }}" />
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input class="form-control"  name="name" placeholder="Nhập tên danh mục">
                            <label>Mô tả:</label>
                            <textarea class="form-control" rows="2" required name="description" placeholder="Mô tả"></textarea>
                            <label>Ảnh sản phẩm </label>
                            <input type="file" class="form-control"  name="image" />
                            <label for="input-id">Chọn danh mục</label>
                                <select name="id_type" id="inputSltCate" required class="form-control">
                                    <option value="">--Chọn thương hiệu--</option>
                                    @foreach($nhomsp as $nhom)
                                        <option value="{{ $nhom->id }}" >{{ $nhom->catename }}</option>  
                                    @endforeach 
                                </select>
                            <label>Giá</label>
                            <input type="number" required class="form-control" name="unit_price" placeholder="Giá">
                            <label>Giá KM</label>
                            <input type="number" required class="form-control" name="promotion_price" placeholder="Giá khuyến mãi">
                            <label>Đơn vị</label>
                            <input class="form-control" required name="unit" placeholder="Đơn vị">
                            <label>Nổi bật</label>
                            <label class="radio-inline">
                                <input name="news" value="1" type="radio">Có
                            </label>
                            <label class="radio-inline">
                                <input name="news" value="0" checked type="radio">Không
                            </label>
                        </div>
                        <button type="submit" name="themdanhmuc" class="btn btn-default">Thêm </button>
                        <button type="reset" class="btn btn-default">Làm mới</button>
                    
                </form>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<div id="dataModal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Employee Details</h4>
   </div>
   <div class="modal-body" id="employee_detail">
    
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>
@endsection
  @section('script')
    <script type="text/javascript">
      $('#example').dataTable( 
    {
    "bSort" : false,
    "searching": true,
    " paging": true
    } );
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
 $('#insert_form').on("submit", function(event){  
  event.preventDefault();  
    var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
     $.ajax({  
    url:"{{ route('addProduct') }}",  
    type:"POST",  
     data: {_token: CSRF_TOKEN},
     dataType: 'JSON',
     data:new FormData(this),
     contentType:false,  
     processData:false, 
    success:function(data){
      if ((data.errors)) {
                $('.error').removeClass('hidden');
                $('.error').text(data.errors);
                printErrorMsg(data.errors);
            } else {
                 $('.error').remove();
                 $('#insert_form')[0].reset();  
                 $('#add_data_Modal').modal('hide');  
                 $('#list_product').html(data); 
            }  
     
    }  

   }); 
    
  }  
 )});
        function printErrorMsg (msg) {
      $(".print-error-msg").find("ul").html('');
      $(".print-error-msg").css('display','block');
      $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
      });
    }


 
    </script>
    {{-- expr --}}
@endsection