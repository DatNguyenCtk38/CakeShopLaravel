@extends('admin.layout.index')
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
                    <small>Chi tiết hóa đơn</small>

                   

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
                           
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Hình ảnh</th>

                            <th>Giá bán</th>
                            <th>Số lượng</th>
                        
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($chiTietHoaDon as $chiTiet)
                        <tr id="{{$chiTiet->id}}" value ="{{$chiTiet->id}}" class="odd gradeX" align="center">
                           
                            <td>{{$chiTiet->id}}</td>
                            <td>{{$chiTiet->product->name}}</td>
                           <td><img width="100px" height="100px" src="public/source/images/stories/virtuemart/product/{{$chiTiet->product->image}}"></td>
                            <td>{{$chiTiet->unit_price}}</td>
                            <td>{{$chiTiet->quantity}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <button value="{{$chiTiet->bill->id}}" id="duyet" @if ($chiTiet->bill->status == 1)
                disabled 
              
              @else
                
              
              @endif class=" btn btn-success"><span id ="status" class="@if ($chiTiet->bill->status == 1)
                glyphicon glyphicon-check
              
              @else
               
               glyphicon glyphicon-unchecked
              @endif"></span> 
              @if ($chiTiet->bill->status == 1)
                Đã duyệt
              
              @else
                Chưa duyệt
              
              @endif
            </button>
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</div>

@endsection
@section('script')
  {{-- expr --}}
  <script type="text/javascript">
    $(document).ready(function () {
    $(document).on('click', '#duyet', function() {
      var id =  $(this).attr('value');
       $.ajax({  
        url:"admin/hoadon/duyet",  
        method:"get",  
        data:{bill_id:id},  
        success:function(data){
           $("#duyet").html('<span class=" glyphicon glyphicon-check"></span> Đã duyệt');
           $("#duyet").attr('disabled', 'true');
           $("#status").attr('class', 'glyphicon glyphicon-check');
        }  
    }); 
     
}  );  
  });
  </script>
@endsection