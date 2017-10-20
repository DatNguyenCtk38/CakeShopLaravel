
<div id="content_left" class="span3">
    <div class="content-left-in row-fluid">
        <div style="color: black" id="position-2" class="span12">
            <!--<div class="yt-position-inner">-->
             
           

                <!--<div class="wrap-title">-->
                <h3>{{Auth::user()->full_name}}</h3>
                <!--</div>-->
                <div class="modcontent clearfix">
                    <p><a style="color:#122db9" href="{{ route('ho-so') }}">Quản lý tài khoản</a></p>
                    <p><a style="color:#122db9" href="{{ route('dondathang') }}">Đơn đặt hàng</a></p>
                   
                    <p><a style="color:#122db9" href="{{ route('lichsumuahang') }}">Xem lịch sử mua hàng</a></p>
                    <p><a style="color:#122db9" href="{{ route('magiamgia') }}">Mã giảm giá</a></p>
                </div>
           
        </div>
    </div>
</div>