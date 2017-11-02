@extends('master')
@section('content')
<div class="content-main-inner row-fluid">
<div class="span12">
        <div id="system-message-container">
        </div>
    </div>
    <div id="position-3" class="span12">
        <div id="yt_component" class="span12">
        <div class="component-inner">
            <div class="component-inner2">
                <div class="browse-view">
                    <h2>ĐẶT HÀNG THÀNH CÔNG</h2>
                    <p class="width10 floatleft" id="name">Họ tên</p>
                    <p class="width30 floatleft" id="name">{{ $bill->customer_name }}</p>
                    <div class="clear"></div> 
                    <p class="width10 floatleft" id="name">Số điện thoại</p>
                    <p class="width30 floatleft" id="name">{{ $bill->phone_number}}</p>
                    <div class="clear"></div> 
                    <p class="width10 floatleft" id="name">Địa chỉ</p>
                    <p class="width30 floatleft" id="name">{{ $bill->address}}</p>
                    <div class="clear"></div> 
                    <p class="width10 floatleft" id="name">Giảm giá</p>
                    <p class="width30 floatleft" id="name">{{ $giamGia }}%</p>
                    <div class="clear"></div> 
                    <p class="width10 floatleft" id="name">Tổng tiền</p>
                    <p class="width30 floatleft" id="name">{{ number_format($bill->total)}} ₫</p>
                    <div class="clear"></div> 
                    <p class="width100 floatleft" id="name">Hệ thống đã gửi email đặt hàng cho bạn. Bạn có thể xem chi tiết đơn đặt hàng thông qua email chúng tôi đã gửi hoặc vào mục cá nhân để xem chi tiết đơn đặt hàng. Trân trọng cảm ơn quý khách.</p>
                   
                        <!-- End Search Box -->
                       
                        
                            
                               
                        <!-- end of spacer -->
                    </div> <!-- end of product -->
                           
                    
                  
                    
                <div class="horizontal-separator"></div>

                

            </div><!-- end browse-view -->
                <div class="horizontal-separator"></div>


            </div><!-- end browse-view -->



    <script id="jsVars_js" type="text/javascript">//<![CDATA[ 
        vmSiteurl = 'http://demo.smartaddons.com/templates/joomla3/sj-bakery/' ;
        vmLang = "";
        Virtuemart.addtocart_popup = '1' ; 
    usefancy = true; //]]>
    </script>

    <script id="ready.vmprices_js" type="text/javascript">//<![CDATA[ 
        jQuery(document).ready(function($) {
            Virtuemart.product(jQuery("form.product"));

        /*$("form.js-recalculate").each(function(){
            if ($(this).find(".product-fields").length && !$(this).find(".no-vm-bind").length) {
                var id= $(this).find('input[name="virtuemart_product_id[]"]').val();
                Virtuemart.setproducttype($(this),id);

            }
        });*/
    }); //]]>
    </script>

    </div></div>
    </div>

        <!--</div>-->
    </div>
    <span style="display:none">Hide Main content block</span>
</div>
@endsection
