

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
                                            <input type="hidden" class="pname" value="Diten face xare">
                                            <input type="hidden" name="option" value="com_virtuemart">
                                            <input type="hidden" name="view" value="cart">
                                            <input type="hidden" class="quantity-input js-recalculate" name="quantity[]" value="1">
                                            <noscript>&lt;input type="hidden" name="task" value="add"/&gt;</noscript>
                                            <input type="hidden" name="virtuemart_product_id[]" value="54">
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
                       {{ $promotion_product->appends(request()->input())->links() }}
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
