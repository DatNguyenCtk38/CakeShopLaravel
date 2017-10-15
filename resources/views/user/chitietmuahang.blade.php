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
								<h1 style="color: black">LỊCH SỬ MUA HÀNG</h1>
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
							@if (count($chiTietMuaHang)==0)
								
							@else
							 <div id="listBills">
                <table style="font-size: 14px;color: black" class="table table-striped table-bordered table-hover" id="example">
                    <thead>
                        <tr align="center" >
                            
                            <th class="title">STT</th>
                            <th class="title">Tên sản phẩm</th>
                            <th class="title">Hình ảnh</th>
                            <th class="title">Giá bán</th>
                            <th class="title">Số lượng</th>
                            <th class="title">Đơn vị</th>
                        </tr>
                    </thead>
                    <tbody>
                    	@php
                    		$i=1;
                    	@endphp
                        @foreach($chiTietMuaHang as $chitiet)
                        <tr id="{{$chitiet->id}}" value ="{{$chitiet->id}}" class="odd gradeX" align="center">
                            <td>{!!$i!!}</td>
                            <td>{{$chitiet->product->name}}</td>
                            <td><img style="width: 200px;height: 200px" src="public/source/images/stories/virtuemart/product/{{ $chitiet->product->image }}"></td>                            
                            <td>{{number_format($chitiet->unit_price)}} đồng</td>
                            <td>{{$chitiet->quantity}}</td>
                            <td>{{$chitiet->product->unit}}</td>
                            
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
					@if (count($chiTietMuaHang)>5)
								
							
					<div class="pagging-sort" style="margin-bottom: 10px">
                    <div class="pagination clearfix">
                      	{{ $danhSachHoaDon->links() }}
                    </div>
                    @endif

                </div>
                <div class="clear"></div>
				<a href="{{ url()->previous() }}" style="height: 36px;background: #0077b3;
				background-position: 0 -160px;color: #fff;cursor: pointer;
    			text-align: center;padding: 10px;border-radius: 5px"

				 id="back"  class="">Quay lại</a>
				</div>
			</div>
			
			
@endsection

	
			


