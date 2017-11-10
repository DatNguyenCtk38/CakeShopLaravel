<a id="top" name="scroll-to-top"></a>
<header id="yt_header" class="block pattern_1">
    <div class="yt-main">
        <div class="yt-main-in1 container">
            <div class="yt-main-in2 row-fluid">
                <div id="position-0" class="offset2 span6">
                    <!--<div class="yt-position-inner">-->
                    <div class="module">
                        <div class="modcontent clearfix">
                            <ul class="mobi-sj-login-regis" style="display: none">
                                <li class="sj-login">
                                    <a class="login-switch text-font" href="index.php/joomla-pages/2013-02-21-09-25-47/login-form.html" title="">
                                    </a>
                                </li>
                                <li class="sj-register">
                                    <a  style="color: #ffb6c3" class="register-switch text-font" href="index.php/joomla-pages/2013-02-21-09-25-47/register.html">
                                        Đăng kí</a>
                                </li>
                            </ul>
                            <ul class="sj-login-regis">

                                <li class="sj-register dropdown">
                                     @if(Auth::check())
                                        <a class="register-switch text-font" href="{{ route('dangxuat') }}">
                                            <span  style="color: #ffb6c3" class="title-link">Đăng xuất</span>

                                        </a>

                                    @else
                                        <a class="register-switch text-font" href="{{ route('dangky') }}">
                                            <span  style="color: #ffb6c3" class="title-link">Đăng kí</span>
                                        </a>
                                    @endif
                                </li>
                                
                                <li class="sj-login dropdown">
                                     @if(Auth::check())
                                    <a href="{{ route('ho-so') }}" data-toggle="dropdown" role="button" class="dropdown-toggle login-switch text-font" title="" >
                                        <span  style="color: #ffb6c3" class="title-link">
                                          {{Auth::user()->full_name}}
                                            
                                        </span>
                                        
                                    </a>
                                    
       
                                    @else
                                         <a id="dangnhap" href="#mod-login" role="button" class="login-switch text-font" title="" data-toggle="modal">
                                            <span style="color: #ffb6c3" class="title-link">
                                          Đăng nhập
                                           
                                        </span>
                                    </a>
                                     @endif  
                                    <div id="mod-login" class="modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
                                        </div>
                                        <div id="sj_login_box" class="show-box">
                                            <div class="sj_box_inner">
                                                <div class="sj_box_title">
                                                    <h3>Đăng nhâp</h3>
                                                </div>
                                                @if(count($errors)>0)
                                                <div class="alert alert-danger">
                                                    @foreach($errors->all() as $error)
                                                        {{$error}}
                                                    @endforeach
                                                </div>
                                            @endif
                                          
                                                <div class="sj_box_content">
                                                    <form id="login_form" action="{{route('login')}}" method="post">
                                                        <input type="hidden" name="_token" value="{{csrf_token()}}">
                                                        <fieldset class="userdata">
                                                            <div class="login_input">
                                                                <p>
                                                                    <label for="modlgn-username" class="sj-login-user">
                                                                        <span>&nbsp;</span>
                                                                        <input id="modlgn-username" required type="text" name="email" class="inputbox" size="25" placeholder="Email address">
                                                                        <a href="index.php/using-joomla/extensions/components/users-component/username-reminder.html" title="Forgot your username?">
                                                                            <span>?</span></a>
                                                                    </label>
                                                                </p>
                                                                <p>
                                                                    <label for="modlgn-passwd" class="sj-login-password">
                                                                        <span>&nbsp;</span><input required id="modlgn-passwd" type="password" name="password" class="inputbox" size="25" placeholder="Password">
                                                                        <a href="index.php/using-joomla/extensions/components/users-component/password-reset.html" title="Forgot your password?">
                                                                            <span>?</span></a>
                                                                    </label>
                                                                </p>
                                                            </div>
                                                            <div class="login_button">
                                                                <p id="form_login_remember">
                                                                    <input id="modlgn-remember" type="checkbox" name="remember" class="checkbox" value="yes">
                                                                    <label for="modlgn-remember">Nhớ tài khoản</label>
                                                                </p>
                                                                <div class="button2">
                                                                    <input type="submit" name="Submit" class="button" value="Đăng nhập">
                                                                </div>
                                                            </div>
                                                            <input type="hidden" name="option" value="com_users">
                                                            <input type="hidden" name="task" value="user.login">
                                                            <input type="hidden" name="return"
                                                                   value="aW5kZXgucGhwP29wdGlvbj1jb21fY29udGVudCZ2aWV3PWZlYXR1cmVkJkl0ZW1pZD00MzU=">
                                                            <input type="hidden" name="2ae1c06912d25cf3fbbe328a5bbb0ccb" value="1">							</fieldset>
                                                        <div class="more_login sj-login-links clearfix">


                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>

                            </ul>
                        </div>


                    </div>
                    <div class="module cart blank">

                        <div class="modcontent clearfix">
                            <!-- Default of smart -->
                            <div class="vmCartModule  cart blank" id="vmCartModule">
                                <h3 class="title"><a style="color: #ffb6c3" href="{{ route('dathang') }}">Giỏ hàng</a></h3>


                                <div  style="color: #ffb6c3" class="total_products gio-hang-tb">(@if(Session::has('cart'))
                                {{Session('cart')->totalQty}}
                                        @else 0
                                    @endif)</div>

                                <noscript>
                                Please wait	
                                </noscript>
                            </div>

                           
                        </div>
                    </div>
                </div>
                <div id="position-1" class="span4">
                    <!--<div class="yt-position-inner">-->
                    <!--BEGIN Search Box -->
                    <form action="{{ route('timkiem') }}" method="get" class="form-search">
                        <div class="search finder ">
                            <input name="keyword" id="mod_virtuemart_search" maxlength="20" class="inputbox search-query input-medium icon-search" 
                                   type="text" size="20" value="" placeholder="Search...">
                            <button type="submit" value="Search" class="button finder " onclick="this.form.keyword.focus();"><i class="icon-search icon-white"></i> 
                            </button>
                        </div>
                    </form>

                    <!-- End Search Box -->

                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
</header>
<section id="yt_menuwrap" class="block">
    <div class="yt-main">
        <div class="yt-main-in1 container">
            <div class="yt-main-in2 row-fluid">
                <div id="yt_logoposition">
                    <h1 class="logo">
                        <a href="index-2.html" title="SmartAddons.Com">
                            <img alt="SmartAddons.Com" src="public/source/templates/sj_bakery/images/logo.png">
                        </a>
                    </h1>
                </div>
               <div id="yt_menuposition" class="span10 offset2">
            <ul id="meganavigator" class="navi"><li class="active level1 first" style="float: left;">
<li class=" level1 first">
    <a class=" level1 first item-link" href="{{ route('trang-chu') }}"><span class="menu-title">Trang chủ</span></a>   </li>
<li class="level1 havechild" style="float: left;">
    <a class="level1 havechild item-link" href="{!!url('loai-san-pham/'.'1'.'-'.'banh-man')!!}"><span class="menu-title">Sản phẩm</span></a>   
            <!-- open mega-content div -->
        <div class="level2 mega-content" style="display: none;">
            
            <div class="mega-content-inner">
                
                <div class="mega-col first one">
                    <ul class="subnavi level2">                      
                        <li class="level2">
                             <a class="level2 item-link" href="{!!url('loai-san-pham/'.'1'.'-'.'banh-man')!!}"><span class="menu-title"></span>Bánh mặn</a>    
                        </li>
                        <li class="level2">
                             <a class="level2 item-link" href="{!!url('loai-san-pham/'.'2'.'-'.'banh-ngot')!!}"><span class="menu-title"></span>Bánh ngọt</a>    
                        </li>
                        <li class="level2">
                             <a class="level2 item-link" href="{!!url('loai-san-pham/'.'3'.'-'.'banh-trai-cay')!!}"><span class="menu-title"></span>Bánh trái cây</a>    
                        </li>
                        <li class="level2">
                             <a class="level2 item-link" href="{!!url('loai-san-pham/'.'4'.'-'.'banh-kem')!!}"><span class="menu-title"></span>Bánh kem</a>    
                        </li>
                        <li class="level2">
                             <a class="level2 item-link" href="{!!url('loai-san-pham/'.'5'.'-'.'banh-crepe')!!}"><span class="menu-title"></span>Bánh crepe</a>    
                        </li>
                        <li class="level2">
                             <a class="level2 item-link" href="{!!url('loai-san-pham/'.'6'.'-'.'banh-pizza')!!}"><span class="menu-title"></span>Bánh pizza</a>    
                        </li>
                        <li class="level2">
                             <a class="level2 item-link" href="{!!url('loai-san-pham/'.'7'.'-'.'banh-su-kem')!!}"><span class="menu-title"></span>Bánh su kem</a>    
                        </li>
                       
                    </ul>
                </div>
                
            </div>
        </div>
</li>
<li class=" level1 first">
    <a class=" level1 first item-link" href="{{ route('trang-chu') }}"><span class="menu-title">Tin tức</span></a>   </li>
<li class=" level1 first">
    <a class=" level1 first item-link" href="{{ route('trang-chu') }}"><span class="menu-title">Liên hệ</span></a>   </li>
</ul>   <script type="text/javascript">
        jQuery(function($){
            $('#meganavigator').megamenu({ 
                'wrap':'#meganavigator',
                'easing': 'easeOutSine',
                'speed': '400',
                'justify': 'left'
            });
        });
    </script>
           </div>
            </div>
        </div>
    </div>
</section>

