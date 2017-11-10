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
                        <small>Thể Loại</small>
                        <button style="float: right;" type="button" name="delete_many" id="delete_many" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span> Xóa</button>
          <button  style="float: right; margin-right: 2%" type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning add-modal"><span class="glyphicon glyphicon-edit"></span> Thêm</button>
                    </h1>
               
                </div>
                @if(count($errors)>0)
                        <div id ="notify" class="alert alert-danger">
                            @foreach($errors->all() as $error)
                                {{$error}}
                            @endforeach
                        </div>
                @endif
                @if(Session::has('thongbao'))
                        <div id ="notify" class="alert alert-success">{{Session::get('thongbao')}}</div>
                    @endif  
                <!-- /.col-lg-12 -->
                <div id="listcategory">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                    <thead>
                        <tr align="center">
                            <th>ID</th>
                            <th>Tên danh mục</th>
                           
                            <th>Xóa</th>
                            <th>Sửa</th>
                        </tr>
                    </thead>
                    <tbody>
                            @foreach($danhSachTheLoai as $theloai)
                                <tr class="odd gradeX" align="center">
                                    <td>{{$theloai->id}}</td>
                                    <td>{{$theloai->catename}}</td>
                                   

                                    <td class="center">
                                    <button onclick="xoatheloai('{{$theloai->catename}}',{{$theloai->id}})" id="{{$theloai->id}}" value="{{$theloai->catename}}" class="delete-modal btn btn-danger" >
                                    <span class="glyphicon glyphicon-trash"></span> Xóa
                                  </button></td>
                                  <td class="center"><button class="edit-modal btn btn-info" id="{{$theloai->id}}" data-id=""
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
@include('admin.theloai.them')
<!--EDIT -->
@include('admin.theloai.sua')
<!-- DELETE-->
@include('admin.theloai.xoa')
@endsection
@section('script')
<script type="text/javascript">
    $(document).ready(function(){

$('#insert_form').on("submit", function(event){  
event.preventDefault();  
var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
 $.ajax({  
        url:"admin/theloai/addProductType",  
        type:"POST",  
        data: {_token: CSRF_TOKEN},
        dataType: 'json',
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
           $('#listcategory').html(data.html); 
       }  
        }  
      }); 
}  
)}
   
);
     function printErrorMsg (msg) {
  $(".print-error-msg").find("ul").html('');
  $(".print-error-msg").css('display','block');
  $.each( msg, function( key, value ) {
    $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
});
}
</script>

@endsection