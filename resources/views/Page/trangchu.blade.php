@extends('master')
@section('content')
<div class="content-main-inner row-fluid">
<div class="span12">
        <div id="system-message-container">
        </div>
    </div>
    <div id="position-3" class="span12">
        <!--<div class="yt-position-inner">-->
        <div class="module">
            <div class="modcontent clearfix">
            
                <div id="sj_extraslider_4184451341504586970" class="sj-extraslider slide  extra-resp01-3 extra-resp02-3 extra-resp03-2 extra-resp04-1" data-interval="3000" data-pause="hover"><!--<![endif]-->
                    <div class="heading-title">Sản phẩm HOT</div><!--end heading-title-->
                    <div class="extraslider-control  ">
                        <!--<a class="button-prev" href="/templates/joomla3/sj-bakery/" data-jslide="prev"></a>-->
                        <ul class="nav-page">
                            <li class="page">
                                <a class="button-page" href="#sj_extraslider_4184451341504586970" data-jslide="0"></a>
                            </li>
                            <li class="page">
                                <a class="button-page sel" href="#sj_extraslider_4184451341504586970" data-jslide="1"></a>
                            </li>
                            <li class="page">
                                <a class="button-page" href="#sj_extraslider_4184451341504586970" data-jslide="2"></a>
                            </li>
                        </ul>
                        <!--<a class="button-next" href="/templates/joomla3/sj-bakery/" data-jslide="next"></a>-->
                    </div>
                    <div class="extraslider-inner">
                      @php
                        $i = 0;
                    @endphp
                     @foreach ($top3Crepe as $product)
                   	@if ($i % 3==0)
                   		@if ($i ==0)
                   			<div class="item active ">
                                  <div class="line">
                   		@else
                   			<div class="item ">
                                  <div class="line">
                   		@endif
                   	@endif
                   
                        
                           
                                <div class="item-wrap style2">
                                    <div class="item-wrap-inner">
                                        <div class="item-image">
                                            <a href="{!!url('chi-tiet-san-pham/'.$product->id.'-'.$product->slug)!!}" title="Fate rinus late">
                                                <span class="item-image">
                                                    <span class="border-img"></span>
                                                    <span class="zoom-img"></span>

                                                    <img style="width: 250px; height: 200px" src="public/source/images/stories/virtuemart/product/{{ $product->image }}" alt="Fate rinus late" title="Fate rinus late">                                    
                                                </span></a></div>

                                        <div class="item-info">
                                            <div class="item-title">
                                                <a href="{!!url('chi-tiet-san-pham/'.$product->id.'-'.$product->slug)!!}" title="Fate rinus late">
                                                   {{ $product->name }}
                                                    </a>
                                            </div>

                                            <div class="item-content">

                                                <div class="item-description">
                                                    <p>{{str_limit($product->description, $limit = 50, $end = '...')}}</p>
                                                    </div>

                                                <div class="item-price">
                                                    <div class="PricesalesPrice vm-display vm-price-value">
                                                    <span class="vm-price-desc">Giá: 
                                                    </span>
                                                    <span 
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
                                                    @endif
                                                    </div></div>
                                                <div class="addtocard-readmore">
                                                    <div class="item-readmore">
                                                        <a class="button1" href="index.php/fruits-cake/fate-rinus-late-detail.html" title="Fate rinus late">
                                                           Chi tiết
                                                        </a>
                                                    </div></div>
                                                <div class="item-addtocart">

                                                    <div class="addtocart-area">
                                                        <form method="post" class="product js-recalculate" action="#">

                                                            <div class="addtocart-bar">
                                                                <span class="addtocart-button">
                                                                    <input type="button" style="color: white" id="addtocart" name="addtocart" class="addtocart-button" value="Giỏ hàng" onclick="addcart( {{$product->id}})">
                                                                    
                                                                    
                                                                </span> 							<!-- <label for="quantity17" class="quantity_box">Quantity: </label> -->
                                                                


                                                               
                                                            </div>			<input type="hidden" name="option" value="com_virtuemart">
                                                            <input type="hidden" name="view" value="cart">
                                                            <input type="hidden" name="virtuemart_product_id[]" value="17">
                                                            <input type="hidden" class="pname" value="Fate rinus late">
                                                            <input type="hidden" name="Itemid" value="435">		</form>

                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </div>
                                </div>
                   		@php
                   			$i++;
                   		@endphp
                        
                        @if ($i%3==0)
                        	</div>
                                  </div>
                        @endif
                       
                    
                            

                     @endforeach
                        
                    </div>
                    <!--end extraslider-inner -->
                </div>
                <script>
                    //<![CDATA[
                    jQuery(document).ready(function ($) {
                        ;
                        (function (element) {
                            var $element = $(element);

                            if (typeof Virtuemart !== 'undefined') {
                                Virtuemart.addtocart_popup = "1";
                                usefancy = "1";
                                vmLang = "";
                                window.vmSiteurl = "index.html";
                            }

                            $element.each(function () {
                                var $this = $(this), options = options = !$this.data('modal') && $.extend({}, $this.data());
                                $this.jcarousel(options);
                                $this.bind('jslide', function (e) {
                                    var index = $(this).find(e.relatedTarget).index();
                                    // process for nav
                                    $('[data-jslide]').each(function () {
                                        var $nav = $(this), $navData = $nav.data(), href, $target = $($nav.attr('data-target') || (href = $nav.attr('href')) && href.replace(/.*(?=#[^\s]+$)/, ''));
                                        if (!$target.is($this))
                                            return;
                                        if (typeof $navData.jslide == 'number' && $navData.jslide == index) {
                                            $nav.addClass('sel');
                                        } else {
                                            $nav.removeClass('sel');
                                        }
                                    });
                                });
                                $this.touchSwipeLeft(function () {
                                    $this.jcarousel('next');
                                }
                                );
                                $this.touchSwipeRight(function () {
                                    $this.jcarousel('prev');
                                }
                                );
                                return;
                            });

                        })('#sj_extraslider_4184451341504586970');
                    });
                    //]]>
                </script>
            </div>
        </div>
        <div class="module free-shipping blank">
            <!--<div class="wrap-title">-->
            <h3 class="modtitle">Free Shipping</h3>
            <!--</div>-->
            <div class="modcontent clearfix">
                Miễn phí giao hàng trên toàn quốc
            </div>


        </div>
        <div id="yt_component" class="span12">
        <div id="component-inner" class="component-inner">
              

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
                     <div class="row">
                                <h1 class="span8">Bánh mới</h1>
                             
                        </div>
                          @php
                            $i = 0;
                          @endphp
                        @foreach ($promotion_product as $product)
                        @php
                        if($i%2==0)
                        {
                            echo '<div class="row">';
                            echo '<div class="product  span6 vertical-separator">';
                        }
                        else{
                             echo '<div class="product  span6">';
                        }
                        @endphp
                        
                            
                                
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
                                                {{str_limit($product->description, $limit = 50, $end = '...')}}
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
                        if($i%2==0)
                        {
                            echo '</div>';

                        }

                    @endphp   
               
                 @endforeach
                <div class="horizontal-separator"></div>

                

            </div><!-- end browse-view -->
                <div class="horizontal-separator"></div>

                <div class="pagging-sort" style="margin-bottom: 10px">
                    <div class="pagination clearfix">
                       {{ $promotion_product->links() }}
                    </div>
                    <div class="orderby-displaynumber">
        
        
        <div class="floatleft">
            <div class="orderlistcontainer">
                <div class="title">Xem theo &nbsp</div>
                <select id="name" name="type" onchange="sortchange()" style="width: 66%">
                    <option value="name">Tên sản phẩm</option>
                    <option value="des">Giá giảm dần </option>
                    <option value="asc">Giá tăng dần</option>
                 </select>
            </div>
        </div>
    </div>

                </div>
  

            </div><!-- end browse-view -->



    

    </div></div>
    </div>

        <!--</div>-->
    </div>
    <span style="display:none">Hide Main content block</span>
</div>
@endsection
