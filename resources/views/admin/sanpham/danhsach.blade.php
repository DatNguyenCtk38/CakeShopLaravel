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
          <button style="float: right;" type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning add-modal">Thêm</button>
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
            <tr id="row_{{$sanpham->id}}" value="{{$sanpham->id}}" class="odd gradeX" align="center">
              <td>{{$sanpham->id}}</td>
              <td id="td_name" value="{{$sanpham->id}}">{{$sanpham->name}}</td>
              <td>{{$sanpham->catename}}</td>
              
              <td><img width="100px" height="100px" src="public/source/images/stories/virtuemart/product/{{$sanpham->image}}"></td>
              
              <td>{{$sanpham->unit_price}}</td>
              <td>{{$sanpham->promotion_price}}</td>
              <td>{{$sanpham->unit}}</td>
              <td>{{$sanpham->new}}</td>
              
              <td class="center">
                <button id="{{$sanpham->id}}" value="{{$sanpham->name}}" class="delete-modal btn btn-danger"  data-id=""
                data-name="">
                <span class="glyphicon glyphicon-trash"></span> Xóa
              </button></td>
              <td class="center"><button class="edit-modal btn btn-info" id="{{$sanpham->id}}" data-id=""
                data-name="">
                <span class="glyphicon glyphicon-edit"></span> Sửa
              </button></td>
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
      <input class="form-control" required name="name" placeholder="Nhập tên danh mục">
      <label>Mô tả:</label>
      <textarea class="form-control" rows="2" required name="description" placeholder="Mô tả"></textarea>
      <label>Ảnh sản phẩm </label>
      <input type="file" class="form-control" id="profile-img" name="image" />
      <img src="" id="profile-img-tag" width="200px" />
      <br>
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
    
    
    
  </div>
  <div class="modal-footer">
    <button type="submit" name="themdanhmuc" class="btn btn-success">Thêm </button>
    <button type="reset" class="btn btn-default">Làm mới</button>
    <button type="button" class="btn btn-warning" data-dismiss="modal">
      <span class='glyphicon glyphicon-remove'></span> Đóng
    </button>
  </div>
</form>
</div>
</div>
</div>
<!--EDIT -->
<div id="edit_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Sửa sản phẩm</h4>
  </div>
  <div class="modal-body">
    <form method="POST" id="edit_form" enctype="multipart/form-data">
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
    <meta name="edit-token" content="{{ csrf_token() }}" />
    <div class="form-group">
      <input class="form-control"  type="hidden" id="id_product" name="id_product">
      <label>Tên sản phẩm</label>
      <input class="form-control" required id="name"  name="name" placeholder="Nhập tên danh mục">
      <label>Mô tả:</label>
      <textarea class="form-control" id="description" rows="2" required name="description" placeholder="Mô tả"></textarea>
      <label>Ảnh sản phẩm </label>
      <input type="file" class="form-control" id="profile-img-edit" name="image" />
      <img src="" id="profile-img-tag-edit" width="150px" height="150px" />
      <br>
      <label for="input-id">Chọn danh mục</label>
      <select name="id_type" id="nhom" required class="form-control">
        <option value="">--Chọn thương hiệu--</option>
        @foreach($nhomsp as $nhom)
        <option value="{{ $nhom->id }}" >{{ $nhom->catename }}</option>  
        @endforeach 
      </select>
      <label>Giá</label>
      <input type="number" required id="unit_price" class="form-control" name="unit_price" placeholder="Giá">
      <label>Giá KM</label>
      <input type="number" required id="promotion_price" class="form-control" name="promotion_price" placeholder="Giá khuyến mãi">
      <label>Đơn vị</label>
      <input class="form-control" id="unit" required name="unit" placeholder="Đơn vị">
      <label>Nổi bật</label>
      <label class="radio-inline">
        <input id="hot" name="news" value="1" type="radio">Có
      </label>
      <label class="radio-inline">
        <input id="no" name="news" value="0" checked type="radio">Không
      </label>
    </div>
    
    
    
  </div>
  <div class="modal-footer">
    <button type="submit" name="themdanhmuc" class="btn btn-success edit">Sửa </button>
    <button type="reset" class="btn btn-default">Làm mới</button>
    <button type="button" class="btn btn-warning" data-dismiss="modal">
      <span class='glyphicon glyphicon-remove'></span> Đóng
    </button>
  </div>
</form>
</div>
</div>
</div>
<!-- DELETE-->
<div id="delete_data_Modal" class="modal fade">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title">Xóa</h4>
  </div>
  <form method="post" id="delete_form" enctype="multipart/form-data">
      <input class="form-control"  type="hidden" id="id_product_delete" name="id_product">
  <div class="modal-body">
    
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    Bạn có chắc chắn muốn xóa sản phẩm <span id="product_name"></span>
    <meta name="delete-token" content="{{ csrf_token() }}" />
  </div>
  <div class="modal-footer">
    <button type="submit"  class="btn btn-danger delete"> <span class="glyphicon glyphicon-trash"></span> Xóa </button>
   
    <button type="button" class="btn btn-warning" data-dismiss="modal">
      <span class='glyphicon glyphicon-remove'></span> Đóng
    </button>
  </div>
</form>
</div>
</div>
</div>
@endsection
@section('script')
<script type="text/javascript">
  $(document).ready(function () {
    $(document).on('click', '.delete-modal', function() {
   var name = ($(this).attr('value'));
   var id = $(this).attr('id');
    $('#product_name').html(name);
     $('#id_product_delete').val(id);  
  $('#delete_data_Modal').modal('show');

}  );  
  });
  $(document).ready(function(){

   $('#delete_form').on("submit", function(event){  
      event.preventDefault(); 
      var id = $('#id_product_delete').attr('value');

      $.ajax({  
        url:"admin/sanpham/xoasanpham",  
        type:"post",  
      
        dataType: 'text',
        data:new FormData(this),
        contentType:false,  
        processData:false, 
        success:function(data){
         
           $('.error').remove();
           $('#delete_form')[0].reset();  
           $('#delete_data_Modal').modal('hide');  
           $('#row_'+id).fadeOut(1000);
           

   }  

}); 

  }  
  )});
</script>
<base href="{{asset('')}}">
<script src="public/source/media/system/js/myjs.js" type="text/javascript"></script>
{{-- expr --}}
@endsection