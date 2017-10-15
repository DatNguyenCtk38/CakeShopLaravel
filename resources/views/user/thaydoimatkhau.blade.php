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
					<h1 style="color: black">THAY ĐỔI MẬT KHẨU</h1>
				</div>
			    <div class="col-sm-3"></div>
								@if(count($errors)>0)
									<div class="alert alert-danger">
										@foreach($errors->all() as $error)
											{{$error}}
										@endforeach
									</div>
								@endif
								@if(Session::has('message'))
									<div class="alert alert-danger">{{Session::get('message')}}</div>
								@endif
								@if(Session::has('thanhcong'))
									<div class="alert alert-success">{{Session::get('thanhcong')}}</div>
								@endif
				<form method="post" action="{{ route('changePassword') }}" >
			 	<input type="hidden" name="_token" value="{{csrf_token()}}">
			 	<p class="width20 floatleft profile" id="name">
        		    Mật khẩu cũ
				</p>

       			 <p class="width30 floatleft" id="name">
         		   <input  required style="margin-bottom: 20px;width: 130%;color: black" type="password" name="oldpassword" value="" class="profile inputbox" size="18" placeholder="Mật khẩu cũ">
				</p>
				<div class="clear"></div>
				<p class="width20 floatleft profile" id="name">
        		    Mật khẩu mới
				</p>

       			 <p class="width30 floatleft" id="name">
         		   <input required style="margin-bottom: 20px;width: 130%;color: black" type="password" name="newpassword" class="profile inputbox" size="18" placeholder="Mật khẩu mới">
				</p>
				<div class="clear"></div>
				<p class="width20 floatleft profile" id="name">
        		    Xác nhận mật khẩu
				</p>

       			 <p class="width30 floatleft" id="name">
         		   <input required style="margin-bottom: 20px;width: 130%;color: black" type="password" name="re_password" class="profile inputbox" size="18" placeholder="Xác nhận mật khẩu">
				</p>
				<div class="clear"></div>
				<button style="height: 36px" type="submit" class="vm-button-correct"><span>Xác nhận</span> </button>
				
			 </form>
				</div>

            </div>
            <div class="row">

			
			
			</div>
        </div>
    </div>
@endsection