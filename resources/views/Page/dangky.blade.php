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
				<li></li><li><a href="/templates/joomla3/sj-bakery/index.php/virtuemart/other-pages/shopping-cart/cart" class="pathway">Đăng ký thành viên</a></li><li></li></ul>
			</div>
		
	   </div>
    
	</div>
		<div id="yt_component" class="span12">
            <div class="component-inner"><div class="component-inner2">
                <div class="registration">
	<div class="page-header">
		<h1>Đăng ký</h1>
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

	<form id="member-registration" action="{{route('dangky')}}" method="post" class="form-validate form-horizontal" >
				<input type="hidden" name="_token" value="{{csrf_token()}}">
				<fieldset>
					<!--<legend></legend>-->

				<div class="control-group">
					<div class="control-label">
					<span class="spacer"><span class="before"></span><span class="text"><label id="jform_spacer-lbl" class=""><strong class="red">*</strong> Bắt buộc phải điền</label></span><span class="after"></span></span>									</div>
					<div class="controls">&nbsp;</div>
            	</div>
				<div class="control-group">
					<div class="control-label">
					<label id="jform_name-lbl" for="jform_name" class="hasTooltip" title="<strong>Name</strong><br />Enter your full name." aria-invalid="true">
	Họ và tên:<span class="star">&nbsp;*</span></label></div>
				<div class="controls"><input type="text" name="fullname" id="jform_name" value="" class="required invalid" size="30" required="required" aria-required="true" aria-invalid="true"></div>
            </div>
				<div class="control-group">
				<div class="control-label">
					<label id="jform_username-lbl" for="jform_username" class="" title="<strong>Username</strong><br />Enter your desired username." aria-invalid="true">
	Email:<span class="star">&nbsp;*</span></label></div>
				<div class="controls"><input type="email" name="email" id="jform_username" value="" class="validate-username required invalid" size="30" required="required" aria-required="true" aria-invalid="true"></div>
            </div>
				<div class="control-group">
				<div class="control-label">
					<label id="jform_password1-lbl" for="jform_password1" class="" title="<strong>Password</strong><br />Enter your desired password." aria-invalid="true">
	Mật khẩu:<span class="star">&nbsp;*</span></label></div>
				<div class="controls"><input type="password" name="password" id="jform_password1" value="" autocomplete="off" class="validate-password required invalid" size="30" maxlength="99" required="required" aria-required="true" aria-invalid="true"></div>
            </div>
				<div class="control-group">
				<div class="control-label">
					<label id="jform_password2-lbl" for="jform_password2" class="" title="<strong>Confirm Password</strong><br />Confirm your password." aria-invalid="true">
	Xác nhận mật khẩu:<span class="star">&nbsp;*</span></label></div>
				<div class="controls"><input type="password" name="re_password" id="jform_password2" value="" autocomplete="off" class="validate-password required invalid" size="30" maxlength="99" required="required" aria-required="true" aria-invalid="true"></div>
            </div>
				<div class="control-group">
				<div class="control-label">
					<label id="jform_email1-lbl" for="jform_email1" class="" title="<strong>Email Address</strong><br />Enter your email address." aria-invalid="true">
	Số điện thoại:<span class="star">&nbsp;*</span></label></div>
				<div class="controls"><input type="text" name="phone" class=" required invalid" id="" value="" size="30" required="required" aria-required="true" aria-invalid="true"></div>
            </div>
				<div class="control-group">
				<div class="control-label">
					<label id="jform_email2-lbl" for="jform_email2" class="" title="<strong>Confirm email Address</strong><br />Confirm your email address." aria-invalid="true">
	Địa chỉ:<span class="star">&nbsp;*</span></label></div>
				<div class="controls"><input type="text" name="address" class=" required invalid" id="jform_email2" value="" size="30" required="required" aria-required="true" aria-invalid="true"></div>
            </div>
																				
		</fieldset>
			<div>
			<button type="submit" class=" button2" style="overflow:visible;">Đăng ký</button>
						<a class="button2" href="{{ route('trang-chu') }}" title="Cancel">Hủy</a>
			<input type="hidden" name="option" value="com_users">
			<input type="hidden" name="task" value="registration.register">
			<input type="hidden" name="c1941dd593ac4622b2f1ad90fa8a7f6f" value="1">		</div>
	</form>
</div>

            </div></div>
        </div>
@endsection