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
                    <form action="/templates/joomla3/sj-bakery/index.php/specialty-cake" method="get">
                        <div class="virtuemart_search">
                            <br>
                                <input name="keyword" class="inputbox" type="text" size="20" value="">
                                <input type="submit" value="Search in shop" class="button" onclick="this.form.keyword.focus();">
                        </div>
                                <input type="hidden" name="search" value="true">
                                <input type="hidden" name="view" value="category">
                    </form>
                   
                        <!-- End Search Box -->
                      <h1>Tìm thấy {{ $products->total() }}  sản phẩm </h1>
                       @if (count($products)==0)
                        Không có sản phầm nào
                        
                        @endif
                           @php
                            $i = 0;
                          @endphp
                        @foreach ($products as $product)
                        @if ($i%3==0)
                           <div class="row">
                                <div class="product  span4 vertical-separator">
                        @else
                            <div class="product  span4">
                        @endif
                        
                            
                                
                                <div class="spacer">
                                    <div class="floatleft center image-product">
                                        <a title="index.php?option=com_virtuemart&amp;view=productdetails&amp;virtuemart_product_id=54&amp;virtuemart_category_id=9" rel="vm-additional-images" href="{!!url('chi-tiet-san-pham/'.$product->id.'-'.$product->slug)!!}">
                                            <span class="item-image">
                                                <span class="border-img"></span>
                                                <span class="zoom-img"></span>
                                                <img style="height: 150px; width: 225px" src="public/source/images/stories/virtuemart/product/{{ $product->image }}" alt="v57" class="browseProductImage">                     </span>
                                            </a>
                                        </div>
                                        <div class="info-product">
                                            <h2><a href="{!!url('chi-tiet-san-pham/'.$product->id.'-'.$product->slug)!!}">{{ $product->name }}</a></h2>
                                            <div class="product-price marginbottom12" id="productPrice54">
                                                <div class="PricesalesPrice vm-display vm-price-value"><span class="vm-price-desc">Giá: </span><span 
                                                     @if ($product->promotion_price > 0)
                                                            style="text-decoration: line-through;" 
                                                        @endif
                                                    class="PricesalesPrice">{{number_format($product->unit_price) }} ₫
                                                    </span><br>
                                                    @if ($product->promotion_price == 0)
                                                          
                                                    <br>
                                                    <span hidden="hidden" class="vm-price-desc">Khuyến mãi: </span>
                                                    <span hidden="hidden" class="PricesalesPrice">{{number_format($product->promotion_price) }} ₫
                                                    </span>
                                                    @else
                                                    <span  class="vm-price-desc">Khuyến mãi: </span>
                                                    <span  class="PricesalesPrice">{{number_format($product->promotion_price) }} ₫</span>
                                                    @endif</div>
                                            </div>
                                            <p class="product_s_desc">
                                                Makin zaten gravida eros quis justo sed nonummy...
                                            </p>
                                                <div class="btn-action clearfix">
                                                    <div class="wrap-button">
                                                        <a href="{!!url('chi-tiet-san-pham/'.$product->id.'-'.$product->slug)!!}" title="Diten face xare" class="button1 product-details">Chi tiết
                                                        </a>
                                                    </div>
                                                        <div class="addtocart-area">
                                                            <form method="post" class="product js-recalculate" action="#">
                                                                <div class="addtocart-bar">
                                                                <span class="addtocart-button">
                                                                <input type="button" style="color: white" id="addtocart" name="addtocart" class="addtocart-button" value="Giỏ hàng" onclick="addcart(@php echo $product->id;@endphp)"
                                                                    >
                                                                </span>

                                                <div class="clear"></div>
                                                                </div>
                                           
                                        </form>

                                        <div class="clear"></div>
                                    </div>
                                </div>


                            </div>
                            <div class="clear"></div>
                        </div>
                        <!-- end of spacer -->
                    </div> <!-- end of product -->
                           
                    
                  
                      @php
                        $i++;
                        
                    @endphp   
                    @if ($i%3==0)
                        </div>
                    @endif
               
                 @endforeach
                <div class="horizontal-separator"></div>

                

            </div><!-- end browse-view -->
                <div class="horizontal-separator"></div>

               
                    <div class="pagging-sort" style="margin-bottom: 10px">
                    <div class="pagination clearfix">
                       {{ $products->appends(request()->input())->links()}}
                    </div>


                </div>
                

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
