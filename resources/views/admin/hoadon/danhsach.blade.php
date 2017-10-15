+@extends('admin.layout.index')
@section('content')
<script type="text/javascript" src="http://code.jquery.com/jquery-latest.js"></script>
<script type="text/javascript"> 
  $(document).ready( function() {
    $('#notify').delay(2000).fadeOut();
});
</script>

<style type="text/css">
.row_selected{background-color: #c1c3f9 !important; z-index:9999}
</style>
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Danh mục
                    <small>Hóa đơn</small>

                    <button style="float: right;" type="button" name="add" id="delete" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning add-modal">Xóa</button>


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
            <div id="listBills">
                <table style="font-size: 14px" class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                        <tr align="center" >
                            <th></th>
                            <th>ID</th>
                            <th>Khách hàng</th>
                            <th>Thời gian</th>

                            <th>Tình trạng</th>
                            
                            <th>Xóa</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($danhSachHoaDon as $hoadon)
                        <tr id="{{$hoadon->id}}" value ="{{$hoadon->id}}" class="odd gradeX" align="center">
                            <td><input type="checkbox" name="customer_id[]" class="delete_customer" value="{{$hoadon->id}}" /></td>
                            <td>{{$hoadon->id}}</td>
                            <td>{{$hoadon->customer_name}}</td>
                            <td>{{$hoadon->created_at}}</td>
                            <td>@if ($hoadon->status == 0)
                                Chưa xử lý
                                @else
                                Đã xử lý
                            @endif</td>
                            <td class="center"><i class="fa fa-trash-o  fa-fw"></i><a href="{{route('xoasanpham',$hoadon->id)}}"> Xóa</a></td>

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

@endsection
@section('script')
<script type="text/javascript">
   $("#example tbody tr").click( function( e ) {
    if ( $(this).hasClass('row_selected') ) {
         $(':checkbox', this).trigger('click');
         
  }
  else {
            $(':checkbox', this).trigger('click');
        }
    });
  $('#example').dataTable( 
  {
    "bSort" : false,
    "searching": true,
    " paging": false
} );

  var oTable;
  var arrayId = new Array();
  var id;
  /* Add a click handler to the rows - this could be used as a callback */


  /* Add a click handler for the delete row */
  $('#delete').click( function() {
    if(confirm("Bạn có chắc muốn xóa hóa đơn này"))
    {
     var id = [];

     $(':checkbox:checked').each(function(i){
        id[i] = $(this).val();
      });

   if(id.length === 0) //tell you if the array is empty
   {
    alert("Vui lòng chọn hóa đơn để xóa");
}
else
{
    $.ajax({  
        url:"admin/hoadon/delete",  
        method:"get",  
        data:{product_id:id},  
        success:function(data){
           for(var i=0; i<id.length; i++)
              {
               $('tr#'+id[i]+'').css('background-color', '#ccc');
               $('tr#'+id[i]+'').fadeOut('slow');
              }
            id = new Array();
        }  
    }); 

}}
else{
    return false;
}} );

  /* Init the table */
  
  oTable = $('#example').dataTable( );


  /* Get the rows which are currently selected */
  function fnGetSelected( oTableLocal )
  {
    return oTableLocal.$('tr.row_selected');
}

</script>
{{-- expr --}}
@endsection