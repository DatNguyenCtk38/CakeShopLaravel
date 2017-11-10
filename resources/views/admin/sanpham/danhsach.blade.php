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
          <button style="float: right;" type="button" name="delete_many" id="delete_many" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</button>
          <button  style="float: right; margin-right: 2%" type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning add-modal"><span class="glyphicon glyphicon-edit"></span> Thêm</button>

          
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
            @foreach($danhSachSP as $sanpham)
            <tr id="row_{{$sanpham->id}}" value="{{$sanpham->id}}" class="odd gradeX" align="center">
              <td><input type="checkbox" name="product_id[]" class="delete_product" value="{{$sanpham->id}}" /></td>
              <td>{{$sanpham->id}}</td>
              <td id="td_name" value="{{$sanpham->id}}">{{$sanpham->name}}</td>
              <td>{{$sanpham->catename}}</td>
              
              <td><img width="100px" height="100px" src="public/source/images/stories/virtuemart/product/{{$sanpham->image}}"></td>
              
              <td>{{$sanpham->unit_price}}</td>
              <td>{{$sanpham->promotion_price}}</td>
              <td>{{$sanpham->unit}}</td>
              <td>{{$sanpham->new}}</td>
              
              <td class="center">
                <button onclick="xoasanpham('{{$sanpham->name}}',{{$sanpham->id}})" id="{{$sanpham->id}}" value="{{$sanpham->name}}" class="delete-modal btn btn-danger" >
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
@include('admin.sanpham.them')
<!--EDIT -->
@include('admin.sanpham.sua')
<!-- DELETE-->
@include('admin.sanpham.xoa')
@endsection
@section('script')
<script type="text/javascript">
   function xoasanpham(name,id) {
   
    $('#product_name').html(name);
     $('#id_article_delete').val(id);  
     $('#id_product_delete').val(id);
     $('#delete_data_Modal').modal('show');  
  }
  $(document).ready(function(){

   $('#delete_form').on("submit", function(event){  
      event.preventDefault(); 
      var id = $('#id_product_delete').attr('value');
      var CSRF_TOKEN = $('meta[name="delete-token"]').attr('content');
      $.ajax({  
        url:"admin/sanpham/xoasanpham",  
        type:"post",  
        data: {_token: CSRF_TOKEN},
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