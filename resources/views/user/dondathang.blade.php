@extends('master')
@section('content')

<div class="content-main-inner row-fluid">
	<div class="span12">
		<div id="system-message-container">
		</div>

	</div>

	<div id="breadcrumb" class="span12">
		<!--<div class="yt-position-inner">-->
			<div class="module">

				<div class="modcontent clearfix">

					<ul class="breadcrumb ">


						<li></li><li></li></ul>
					</div>

				</div>

			</div>
			<div id="yt_component" class="span12">
				<div class="component-inner">
					<div class="component-inner2">
						<div class="registration">
							<div class="page-header">
								<h1 style="color: black">ĐƠN ĐẶT HÀNG</h1>
							</div>
							<div class="col-sm-3"></div>
							@if(count($errors)>0)
							<div class="alert alert-danger">
								@foreach($errors->all() as $error)
								{{$error}}<br>
								@endforeach
							</div>
							@endif
							@if(Session::has('message'))
							<div class="alert alert-danger">{{Session::get('message')}}</div>
							@endif
							@if(Session::has('thanhcong'))
							<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
							@endif
							@if (count($danhSachHoaDon)==0)
							<h3 style="color: black">Không có hóa đơn nào</h3>
							@else
							<div id="listBills">
								<table style="font-size: 14px;color: black" class="table table-striped table-bordered table-hover" id="example">
									<thead>
										<tr align="center" >

											<th class="title">STT</th>
											<th class="title">Họ tên</th>
											<th class="title">Điện thoại</th>
											<th class="title">Địa chỉ</th>
											<th class="title">Thời gian</th>

											<th class="title">Tổng tiền</th>
											<th class="titile">Chi tiết</th>
											<th class="titile">Hủy đơn hàng</th>
										</tr>
									</thead>
									<tbody>
										@php
										$i=1;
										@endphp
										@foreach($danhSachHoaDon as $hoadon)
										<tr id="row_{{$hoadon->id}}" value ="{{$hoadon->id}}" class="odd gradeX" align="center">
											<td>{!!$i!!}</td>
											<td>{{$hoadon->customer_name}}</td> 
											<td>{{$hoadon->phone_number}}</td>
											<td>{{$hoadon->address}}</td>
											<td>{{$hoadon->date_order}}</td>


											<td>{{number_format($hoadon->total)}} đồng</td>
											<td><a style="color: #122db9" href="{{ route('chitietmuahang',$hoadon->id) }}">Xem chi tiết</a>	</td>
											<td><button style ="background:none;border: none;color: #122db9" id="xoahoadon" value="{{$hoadon->id}}" onclick="deletebill()" class="delete-modal" style="color: #122db9" href="{{ route('chitietmuahang',$hoadon->id) }}">Hủy</button>	</td>
										</tr>
										@php
										$i++;
										@endphp
										@endforeach
									</tbody>
								</table>
							</div>
							@endif
						</div>

					</div>
					

					<div class="pagging-sort" style="margin-bottom: 10px">
						<div class="pagination clearfix">
							{{ $danhSachHoaDon->links() }}
						</div>
						

					</div>
					<div class="clear"></div>
				<a href="{{ url()->previous() }}" style="height: 36px;background: #0077b3;
				background-position: 0 -160px;color: #fff;cursor: pointer;
    			text-align: center;padding: 10px;border-radius: 5px"

				 id="back"  class="">Quay lại</a>
				</div>
			</div>
			
			<script type="text/javascript">
				function deletebill() {
					var id = $('#xoahoadon').val();
					
					if(confirm("Bạn có chắc muốn xóa hóa đơn trên"))
					{
				   	$.ajax({  
				   		url:"quanlytaikhoan/xoa-don-dat-hang",  
				   		method:"get",
				   		dataType: 'text',  
				   		data:{id:id},  
				   		success:function(data){
				   		
				   				$('tr#row_'+id+'').css('background-color', '#ccc');
				   				$('tr#row_'+id+'').fadeOut('slow');
				   				
				   			
				   		}  
				   	}); 

				   }
				   else{
				   	return false;
				   }
				 
}
</script>
@endsection