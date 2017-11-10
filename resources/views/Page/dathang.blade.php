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
<li class="active">
	<span class="divider">
		<i class="icon-home" rel="tooltip" title="You are here: "></i>
	</span>
</li>
<li>
	<a href="/templates/joomla3/sj-bakery/index.php" class="pathway">Home</a>
	<span class="divider">/</span>
</li>
<li></li><li><a href="/templates/joomla3/sj-bakery/index.php/virtuemart/other-pages/shopping-cart/cart" class="pathway">Shopping Cart</a></li><li></li></ul>
	    </div>
		
	   
	</div>
    
			<!--</div>-->
		</div>
		          <div id="yt_component" class="span12">
            <div class="component-inner"><div class="component-inner2">
       @if(Session::has('thongbao'))
						<div class="alert alert-success">{{Session::get('thongbao')}}</div>
					@endif         
<div class="cart-view">
	<div class="vm-cart-header-container">

		<div class="width50 floatleft ">
			<h1 style="color: black">Giỏ hàng</h1>

			<div class="payments_signin_button"></div>
		</div>
				
		<div class="clear"></div>
	</div>
	@php
		
		if (Auth::check()){
			 $name = Auth::user()->full_name ;
			
			 $email =  Auth::user()->email ;
			 $address =  Auth::user()->address ;
			 $phone =  Auth::user()->phone_number ;
			 
		}
		else{
			 $name = "";
			
			 $email = "" ;
			 $address =  "" ;
			 $phone =  "" ;
			}
		
	@endphp
	    <form id="com-form-login" action="{{route('chuyenhang')}}" method="post" >
	    	<input type="hidden" name="_token" value="{{csrf_token()}}">
    <fieldset class="userdata">
	     <div>
	     	<p>@if (Auth::check())
	     		{{-- expr --}}
	     	
	     	@else
	     		<h3>Bạn chưa đăng nhập. Nếu có tài khoản hãy<span><a href="#mod-login" role="button" class="login-switch text-font" title="" data-toggle="modal">
                        Đăng nhập 
                </a></span> </h3>
	     		
	     	@endif</p>
	     <p class="width10 floatleft" id="name">
            Họ tên
		</p>

        <p class="width30 floatleft" id="name">
            <input required style="margin-bottom: 20px;width: 130%" type="text" value="{!! $name !!}" name="name" class="inputbox" size="18" placeholder="Họ tên">
		</p>
		<div class="clear"></div>
		<!--Giới tính-->
		
        <!-- Email-->
        <div class="clear"></div>
         <p class="width10 floatleft" id="email">
            Email
		</p>
        <p class="width30 floatleft" id="email">
            <input required value="{!! $email !!}" style="margin-bottom: 20px;width: 130%" type="text" name="email" class="inputbox" size="18" placeholder="Email@gmail.com">
		</p>
		<!--Địa chỉ-->
		<div class="clear"></div>
		 <p class="width10 floatleft" id="address">
            Địa chỉ
		</p>
        <p class="width30 floatleft" id="address">
            <input required value="{!! $address !!}" style="margin-bottom: 20px;width: 130%" type="text" name="address" class="inputbox" size="18" placeholder="Địa chỉ">
		</p>
		<!--Điện thoại-->
		<div class="clear"></div>
		 <p class="width10 floatleft" id="phone">
            Số điện thoại
		</p>
        <p class="width30 floatleft" id="phone">
            <input required value="{!! $phone !!}" style="margin-bottom: 20px;width: 130%" type="text" name="phone" class="inputbox" size="18" placeholder="Số điện thoại">
		</p>
		<!--Ghi chú-->
		<div class="clear"></div>
		 <p class="width10 floatleft" id="notes">
            Ghi chú
		</p>
        <p class="width30 floatleft" id="notes">
            <input style="margin-bottom: 20px;width: 130%" type="text" name="notes" class="inputbox" size="18" placeholder="Ghi chú">
		</p>
		<div class="clear"></div>
		 <p class="width10 floatleft" id="code">
            Mã giảm giá
		</p>
        <p class="width30 floatleft" id="code">
             <input id="discount_code" onblur="change()" onchange="change()" style="margin-bottom: 20px;width: 100%" type="text" name="code" class="inputbox"  placeholder="Mã giảm giá">
             <input  hidden id="value_code" name="value_code">
		</p>
		<p class="width30 floatleft" >
			<button style="height: 30px" class="vm-button-correct" type="button" id="checkcode" onclick="change()">
				Kiểm tra mã code
			</button>
		</p>
		<p class="width50 floatleft" id="status_code">
          
		</p>
		<div class="clear"></div>
		<!--Giới tính-->
		 <p class="width10 floatleft" id="gender">
            <h1 style="color: black">Phương thức thanh toán</h1>
		</p>
        <p class="width50 floatleft" id="payment_method">
           <div class="form-block"  style="margin-bottom: 20px">
							
							<div style="margin-bottom: 3%">
								<input id="payment_method" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" style="width: 5%"><span style="
									    font-size: 17px;
									    font-weight: bold;
									    color: #00abff;
									">Thanh toán trực tiếp</span>
							</div>
							
							<p style="background-color: #f8f8f8;padding-left: 5%;padding:10px;width: auto;margin-left: 5%" class="width100 floatleft">Cửa hàng sẽ gửi hàng đến địa chỉ của bạn, bạn sẽ thanh toán tiền cho nhân viên giao hàng</p>
							<br>
							<div style="margin-top: 5%" >
								<input id="payment_method" type="radio" class="input-radio" name="payment_method" value="ATM" style="width: 5%"><span style="
									    font-size: 17px;
									    font-weight: bold;
									    color: #00abff;
									">Chuyển khoản</span>
							</div>
							<p style="background-color: #f8f8f8;padding-left: 5%;padding:10px;width: auto;margin-left: 5%;margin-bottom: 3%;margin-top:3%" class="width100 floatleft">Quý khách vui lòng gửi vào số tài khoản 23101992847887 hoặc 124578999.</p>
										
						</div>
		</p>
	     </div>
        <div class="clr"></div>

        <div class="clr"></div>

		<input type="hidden" name="task" value="user.login">
        <input type="hidden" name="option" value="com_users">
        <input type="hidden" name="return" value="aHR0cDovL2RlbW8uc21hcnRhZGRvbnMuY29tL3RlbXBsYXRlcy9qb29tbGEzL3NqLWJha2VyeS9pbmRleC5waHAvdmlydHVlbWFydC9vdGhlci1wYWdlcy9zaG9wcGluZy1jYXJ0L2NhcnQ=">
        <input type="hidden" name="399889050d22d18e23c81a1c3a736aa4" value="1">    



<table class="cart-summary" cellspacing="0" cellpadding="0" border="0" width="100%">
<tbody><tr>
	<th align="left">Tên sản phẩm</th>
	<th style="min-width:70px;width:5%;align:right;text-align:center" align="left">Hình ảnh</th>
	<th style="min-width:70px;width:5%;align:right;text-align:center">Giá</th>
	<th style="min-width:120px;width:10%;align:right;text-align:center">Số lượng		/ Xóa</th>
	
	<th style="min-width:150px;width:5%;align:right;text-align:center">Tổng giá</th>
</tr>

@if(Session::has('cart'))

	@foreach($product_cart as $cart)
					<!-- end one item -->				
	<tr id="row_{{$cart['item']['id']}}" valign="top" class="sectiontableentry1">

	<input type="hidden" name="cartpos[]" value="0">
	<td align="left">
				<span class="cart-images">
						 						</span>
				<a href="/templates/joomla3/sj-bakery/index.php/fruits-cake/dika-lote-case-detail">{{$cart['item']['name']}}</a><div class="vm-customfield-cart"></div>
	</td>
	<td align="center" style="width: 23%">
		<img width="92%" src="public/source/images/stories/virtuemart/product/{{$cart['item']['image']}}" alt="" class="pull-left">
	</td>
	<td align="right">
        <div class="PricesalesPrice vm-display vm-price-value"><span class="vm-price-desc"></span><span " class="PricesalesPrice">@if ($cart['item']['promotion_price']>0)
        	{{number_format($cart['item']['promotion_price'])}}
        @else
        	{{number_format($cart['item']['unit_price'])}}
        @endif ₫</span></div>        
        
	</td>
	<td align="center">
		<input min="1" max="5" id="gh_sl_{{$cart['item']['id']}}" onchange="changecart({{$cart['item']['id']}},
			@if ($cart['item']['promotion_price']==0)
				{{$cart['item']['unit_price']}}
			@else
				{{$cart['item']['promotion_price']}}
			@endif

		)" type="number" title="Update Quantity In Cart" class="quantity-input js-recalculate" size="3"  name="quantity[0]" value="{{$cart['qty']}}">
			<a type="button" onclick="deletecart({{$cart['item']['id']}})" style="background-image: url('public/source/images/stories/virtuemart/product/icons8-Delete Bin-20.png');" type="submit" class="vmicon vm2-remove_from_cart" name="delete.0" title="Delete Product From Cart"><i class="fa fa-trash-o"></i></button>
	</td>

		
	<td colspan="1" align="right">
		<div class="PricesalesPrice vm-display vm-price-value"><span class="vm-price-desc"></span><span id="gh_tt_{{$cart['item']['id']}}" class="PricesalesPrice">{{number_format($cart['price'])}} ₫</span></div></td>
	</tr>
	@endforeach
@endif
	<!--Begin of SubTotal, Tax, Shipment, Coupon Discount and Total listing -->
<tr class="sectiontableentry1">
	<td colspan="4" align="right">Tổng tiền</td>

		
	<td align="right"><div class="PricesalesPrice vm-display vm-price-value"><span class="vm-price-desc"></span><span id="totalPrice" class="PricesalesPrice">@if (isset($totalPrice))
		{{number_format($totalPrice)}} 
		@else
		0
	@endif₫</span></div></td>
</tr>

</tbody>
</table>
</fieldset>


	
	 <div class="checkout-button-top"> <button @if(Session::has('cart'))
           
           		@if (Session('cart')->totalQty>0)
           		
           		@else
           		disabled 
           		@endif
           	@else
           	disabled
            @endif type="submit" id="checkoutFormSubmit" onclick="@if (Auth::check())
            	ShowProgressAnimation()
            @else
            	{{-- false expr --}}
            @endif" name="checkout" value="1" class="vm-button-correct"><span>Đặt hàng</span> </button>

        </div>

				<input type="hidden" name="order_language" value="en-GB">
		<input type="hidden" name="task" value="updatecart">
		<input type="hidden" name="option" value="com_virtuemart">
		<input type="hidden" name="view" value="cart">
	</form>
	
	<script src="public/source/templates/sj_bakery/js/jquery-latest.js" type="text/javascript"></script>
	<div id="loading-div-background">
    <div id="loading-div" class="ui-corner-all" >
      <img style="height:80px;margin:30px;" src="public/source/images/stories/virtuemart/product/loading.gif" alt="Loading.."/>
      <h2 style="color:black;font-weight:normal;">Hệ thống đang xử lý</h2>
      <p style="color: black" >Vui lòng đợi trong giây lát</p>
     </div>
</div>
	
</div>








<script id="keepAliveTime_js" async="async" type="text/javascript">//<![CDATA[ 
var sessMin = 15;var vmAliveUrl = "index.php?option=com_virtuemart&view=virtuemart&task=keepalive";var maxlps = "4";var minlps = "1" //]]>
</script>


            </div></div>
        </div>
		 </div>
<script type="text/javascript">
	$(document).ready(function () {
            $("#loading-div-background").css({ opacity: 0.8 });
           
        });

		
        function ShowProgressAnimation() {
           

            $("#loading-div-background").show();

        }

	


    function change() {
      	var name = document.getElementById("discount_code").value;
      	
              $.ajax({
                url: "{{ route('CheckCode') }}",
                type: "get",
                dataType: "json",
                data: {
                    code_name: name,
                },
                success: function (data) {
                	if (data.response == 1) {
                		$('#status_code').html("Bạn đã sử dụng mã giảm giá. Hóa đơn sẽ được giảm "+"<span style='color:red;font-weight:bold;font-size:25px'>"+data.success+"%</span>" +" trên toàn bộ hóa đơn");
                	}
                	else{
                		$('#status_code').html("Mã giảm giá không chính xác");
                	}
                	$('#value_code').attr('value', data.success);
                }

            });
      }
      
      
   </script>
@endsection