<!DOCTYPE html>
<html lang="en">
<head>
	<style type="text/css">
		
		.container{
			margin-top: 30px;
			margin-left: 100px;
		}
		#imgHeader{
			padding-bottom: 10px;
		}
		.main{
			padding-right: 133px;
		}
		#timeaddress{
			background-color: #f2f4f6;
			border-top: 2px solid #646464;
		}
		#time{
			width: 200px;
			float: left;
		}
		#address{
			width: 370px;
			float: right;
		}
		#orderdetail{
			
		}
		#mainDetail{
			border: 0.5px dashed #e8d9d9;
		}
	</style>
</head>
<body>
	
	
	
	<div class="container">
		<div class="header">
			<img id="imgHeader" style="width: 600px" src="{{ $message->embed('public/source/images/stories/virtuemart/product/cam_on_dat_hang.jpg') }}">
		</div>
		<div class="main">
			<div id="introduce">
				<strong>Kính chào quý khách </strong>
				<p>Yasuo vừa nhận được <b style="color: #f36f21">đơn hàng</b> của quý khách đặt ngày {{ $bill->date_order }},  với hình thức thanh toán là <b>@if ($bill->payment == "COD")
					thanh toán trực tiếp
					@else
					chuyển khoản ngân hàng
				@endif</b> . Chúng tôi sẽ gửi thông báo đến quý khách qua một email khác ngay khi sản phẩm được giao cho đơn vị vận chuyển</p>
			</div>
			<div id="timeaddress" style="overflow: hidden;padding-left: 10px">
				
				<div id="time">
					<p style="color: #646464;font-size: 15px">Thời gian dự kiến</p>
					<p>
						7 ngày tiếp theo
					</p>
					<p style="margin: 0"><b>Kiện hàng # 1</b>: {{$bill->create_at}}</p>
				</div>
				<div id="address">
					<p style="color: #646464;font-size: 15px">Đơn hàng sẽ được gởi đến</p>
					<p style="font-weight: bold;font-size: 18px;color: #fd4f39;">{{ $bill->customer_name }}</p>
					<p style="font-weight: bold;font-size: 18px;">{{ $bill->address }} </p>
					<p>Phone: <span style="font-weight: bold;font-size: 18px">{{ $bill->phone_number }}</span></p>
				</div>
			</div>
			<div style="clear: both">
					<p><b>Sau đây là thông tin chi tiết về đơn hàng:</b></p>
				</div>
			<div id="orderdetail" style="clear: both;border: 0.5px dashed #e8d9d9;margin-top: 20px" >
				
				<div id="headerDetail" style="padding-top: 10px;padding-left: 10px;border-bottom: 0.5px dashed #e8d9d9;background-color: #cddff5">
					<p style="margin: 0;">KIỆN HÀNG # 1 được giao bởi FZ Shop</p>
					<p>Đơn hàng được lập vào ngày : {{$bill->create_at}} với hình thức giao hàng Economy</p>
				</div>
				<base href="{{asset('')}}">
				@foreach ($listBillDetail as $billDetail)
				@php
					$ten = 'public/source/images/stories/virtuemart/product/'.$billDetail->product->image;
				@endphp

				<div id="mainDetail" style="float: left;width: 598px">
						<div style="width: 120px; float: left;padding-right: 30px">
						<img style="padding-left: 10px; padding-top: 10px" height="120px" width="120px" 
						src="<?php echo $message->embed($ten); ?>">
					</div>
					
					<div class="content" style="float: left;width: 300px;padding-right: 35px">
						<p>{{$billDetail->product->name}}</p>
						<p>{{$billDetail->quantity}}</p>
					</div>

					<div class="toal" style="float: left;">
						<p style="font-weight: bold;">{{number_format($billDetail->unit_price)}} VND</p>
					</div>
					
				</div>
				@endforeach
				<div id="footerDetail" style="clear: both;float: right;padding-right: 10px">
					<div class="name" style="float: left;">
							<p>Thành tiền</p>
							<p>Phí giao hàng</p>
							<p style="font-weight: bold;font-size: 15px">Tổng cộng</p>
						</div>
						<div class="price" style="float: left;padding-left: 20px">
							<p>{{number_format($bill->total)}} VND</p>
							<p>Free </p>
							<p style="font-weight: bold;font-size: 15px">{{number_format($bill->total)}} VND</p>
						</div>
				</div>
			</div>
		</div>
	</div>

</body>
<script>
	$(document).ready(function($) {    
		$(window).scroll(function(){
			if($(this).scrollTop()>150){
			$(".header-bottom").addClass('fixNav')
			}else{
				$(".header-bottom").removeClass('fixNav')
			}}
		)
	})
	</script>
</html>
