<section id="yt_slideshow" class="block pattern_1">
    <div class="yt-main">
        <div class="yt-main-in1 container">
            <div class="yt-main-in2 row-fluid">
                <div id="slide_show" class="span12">
                    <!--<div class="yt-position-inner">-->
                    <div class="module">

                        <div class="modcontent clearfix">
                            <script id="jsVars_js" type="text/javascript">//<![CDATA[ 
                                vmSiteurl = 'index.html';
                                vmLang = "";
                                Virtuemart.addtocart_popup = '1';
                                usefancy = true; //]]>
                            </script>

                            <script id="ready.vmprices_js" type="text/javascript">//<![CDATA[ 
                                jQuery(document).ready(function ($) {
                                    Virtuemart.product(jQuery("form.product"));

                                   
                                }); //]]>
                            </script>

                            <div id="sj-slickslider232" class="sj-slickslider  slide slickslider-right" 
                                 data-interval="5000" data-pause="hover">
                                <!-- Slickslider items -->
                                <div class="slickslider-items bg-style1">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($slide as $sl)
                                        @if ($i ==0)
                                            <div class="slickslider-item item clearfix active">
                                                 
                                        @else
                                            <div class="slickslider-item item clearfix">
                                                 
                                        @endif
                                        

                                        <div class="item-image">
                                            <div class="btn-pre" data-id="#sj-slickslider232" data-jslide="prev"></div>
                                            <div class="btn-next" data-id="#sj-slickslider232" data-jslide="next"></div>
                                            <img class="bg_slideshow" src="public/source/images/stories/virtuemart/product/{{ $sl->image }}" alt="">
                                            <div class="item-image-inner">
                                                <a href="{!!url('chi-tiet-san-pham/'.$sl->id.'-'.$sl->slug)!!}" title="{{
                                                    $sl->name
                                                }}">
                                                    <img style="height: 281px" src="public/source/images/stories/virtuemart/product/{{ $sl->image }}" alt="{{ $sl->name }}" title="{{ $sl->name }}">
                                                </a>
                                            </div>
                                        </div>

                                        <div class="item-content ">
                                            <div class="item-content-inner">

                                                <div class="item-title">
                                                    <a href="{!!url('chi-tiet-san-pham/'.$sl->id.'-'.$sl->slug)!!}" title="{{ $sl->name }}">
                                                        {{ $sl->name }}
                                                    </a>
                                                </div>

                                                <div class="item-price">
                                                    <div class="PricesalesPrice vm-display vm-price-value">
                                                        <span class="PricesalesPrice">{{ number_format($sl->unit_price) }}</span></div>
                                                </div>
                                                <div class="item-description">
                                                    <p>{{ $sl->description }}</p></div>
                                                <div class="item-addtocart">
                                                    <div class="addtocart-area">
                                                        <form method="post" class="product js-recalculate" action="#">
                                                            <div class="addtocart-bar">
                                                                <span class="addtocart-button">
                                                                    <input type="submit" name="addtocart" class="addtocart-button" value="Giỏ hàng" title="Add to Cart">	
                                                                </span> 					
                                                                <!-- <label for="quantity89" class="quantity_box">Quantity: </label> -->
                                                                <span class="quantity-box">
                                                                    <input type="text" class="quantity-input js-recalculate" name="quantity[]"
                                                                           onblur="Virtuemart.checkQuantity(this, 1, 'You can buy this product only in multiples of %s pieces!');"
                                                                           onclick="Virtuemart.checkQuantity(this, 1, 'You can buy this product only in multiples of %s pieces!');" 
                                                                           onchange="Virtuemart.checkQuantity(this, 1, 'You can buy this product only in multiples of %s pieces!');"
                                                                           onsubmit="Virtuemart.checkQuantity(this, 1, 'You can buy this product only in multiples of %s pieces!');"
                                                                           value="1" data-init="1" data-step="1">
                                                                </span>
                                                                <span class="quantity-controls js-recalculate">
                                                                    <input type="button" class="quantity-controls quantity-plus" value="plus">
                                                                    <input type="button" class="quantity-controls quantity-minus" value="minus">
                                                                </span>


                                                                <input type="hidden" name="virtuemart_product_id[]" value="89">
                                                                <noscript>&lt;input type="hidden" name="task" value="add"/&gt;</noscript> 
                                                            </div>			<input type="hidden" name="option" value="com_virtuemart">
                                                            <input type="hidden" name="view" value="cart">
                                                            <input type="hidden" name="virtuemart_product_id[]" value="89">
                                                            <input type="hidden" class="pname" value="Dace rita simas">
                                                            <input type="hidden" name="Itemid" value="435">		</form>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        </div>
                                     @php
                                        $i++;
                                    @endphp
                                    @endforeach
                                </div>

                                <!-- Slickslider nav -->
                                <div class="nav-pagination conner-bl bg-style1">
                                    <ul class="type-dot type-dot">
                                        <!--<li class="left" data-id="#sj-slickslider" data-jslide="prev"></li>-->
                                        <li class="pag-item" data-id="#sj-slickslider232" data-jslide="0"><span>1</span></li>
                                        <li class="pag-item sel" data-id="#sj-slickslider232" data-jslide="1"><span>2</span></li>
                                        <li class="pag-item" data-id="#sj-slickslider232" data-jslide="2"><span>3</span></li>
                                        <li class="pag-item" data-id="#sj-slickslider232" data-jslide="3"><span>4</span></li>
                                        <li class="pag-item" data-id="#sj-slickslider232" data-jslide="4"><span>5</span></li>
                                        <!--<li class="right" data-id="#sj-slickslider" data-jslide="next"></li>-->
                                    </ul>
                                </div>
                            </div>

                            <script>
                                //<![CDATA[
                                jQuery(document).ready(function ($) {

                                    if (typeof Virtuemart !== 'undefined') {
                                        Virtuemart.addtocart_popup = "1";
                                        usefancy = "1";
                                        vmLang = "";
                                        window.vmSiteurl = "index.html";
                                    }

                                    $('#sj-slickslider232').each(function () {
                                        var $this = $(this), options = options = !$this.data('modal') && $.extend({}, $this.data());
                                        $this.jcarousel(options);

                                        $this.bind('jslide', function (e) {
                                            var index = $(this).find(e.relatedTarget).index();
                                            // process for nav
                                            $('[data-jslide]').each(function () {
                                                var $nav = $(this), $navData = $nav.data(), id,
                                                        $target = $($nav.attr('data-target') || (id = $nav.attr('data-id')) && id.replace(/.*(?=#[^\s]+$)/, ''));
                                                if (!$target.is($this))
                                                    return;
                                                if (typeof $navData.jslide == 'number' && $navData.jslide == index) {
                                                    $nav.addClass('sel');
                                                } else {
                                                    $nav.removeClass('sel');
                                                }
                                            });
                                        });
                                        $this.touchwipe({
                                            wipeLeft: function () {
                                                $this.jcarousel('next');
                                            },
                                            wipeRight: function () {
                                                $this.jcarousel('prev');
                                            },
                                            wipeUp: function () {
                                                $this.jcarousel('next');
                                            },
                                            wipeDown: function () {
                                                $this.jcarousel('prev');
                                            }
                                        });
                                    });
                                    return;
                                });
                                //]]>
                            </script>

                        </div>


                    </div>

                    <!--</div>-->
                </div>
            </div>
        </div>
    </div>
</section>