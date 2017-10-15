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
            <div class="component-inner"><div class="component-inner2">
                <div class="registration">
				<div class="page-header">
					<h1 style="color: black">Quản lý tài khoản</h1>
				</div>
			    <div class="col-sm-3"></div>
								@if(count($errors)>0)
									<div class="alert alert-danger">
										@foreach($errors->all() as $error)
											{{$error}}
										@endforeach
									</div>
								@endif
								@if(Session::has('thanhcong'))
									<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
								@endif
				<div style="background-color: #f7f7f7;padding: 2%;color: black;margin-left: 0" class="span5">
			  	<h3>Thông tin cá nhân</h3>
			  	<p>{{Auth::user()->full_name}}</p>
			  	<p>{{Auth::user()->email}}</p>
			  	<p><a style="color: #122db9" href="{{ route('editemail') }}">THAY ĐỔI EMAIL</a></p>
			  	<p><a style="color: #122db9" href="{{ route('changePassword') }}">THAY ĐỔI MẬT KHẨU</a></p>
			  </div>
			  <div style="background-color: #f7f7f7;padding: 2%;color: black" class="span5">
			  	<h3>Địa chỉ nhận hàng mặc định</h3>
			  	<p>{{Auth::user()->full_name}}</p>
			  	<p>{{Auth::user()->address}}</p>
			  	<p>{{Auth::user()->phone_number}}</p>
			  	<p><a style="color: #122db9" href="{{ route('editprofile') }}">CHỈNH SỬA</a></p>
			  </div>
				</div>

            </div>
            <div class="row">

			  
			
			</div>
        </div>
    </div>
@endsection