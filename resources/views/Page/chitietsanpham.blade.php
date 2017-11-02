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
                    <li class="active"><span class="divider"><i class="icon-home" rel="tooltip" title="You are here: "></i></span></li><li><a href="../../index-2.html" class="pathway">Home</a></li><li></li><li><span class="divider">/</span><span>{{ $product->name }}</span></li><li></li></ul>
            </div>
        </div>

    </div>
    <div id="yt_component" class="span12">
        <div class="component-inner"><div class="component-inner2">

                <div class="productdetails-view productdetails">


                    <div class="main_info clearfix">
                        <div class="product_image">
                            <div class="main-image">
                                <div id="wrap" style="top:0px;z-index:9999;position:relative;">
                                    <a id="yt_cloudzoom" href="public/source/images/stories/virtuemart/product/{{$product->image}}"  rel="zoomWidth:200, zoomHeight:200, adjustX: 20, adjustY: -3" style="position: relative; display: block;">
                                        <img class="img-large" style="height: 210px;width: 305px" src="public/source/images/stories/virtuemart/product/{{$product->image}}" title="" alt="" style="display: block;">

                                    </a>
                                    <div class="mousetrap" style="background-image: url(&quot;.&quot;); z-index: 999; position: absolute; width: 305px; height: 210px; left: 0px; top: 0px;">
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>

                    <div class="info-product">
                        <div class="spacer-buy-area">

                            <h2 class="tilte">{{ $product->name }}</h2>

                            <div class="vote-stock">
                                <div class="vote">      <div class="ratingbox dummy" title="Not Rated Yet">

                                    </div>
                                </div>
                                <div class="stock-status">
                                    <span class="title">Tình trạng:</span>
                                    <span class="in-stock">Còn hàng</span>
                                </div>
                            </div>

                            <br>
                            <div class="product-price" id="productPrice33">
                                <
                                @if ($product->promotion_price > 0)
                                    <div class="PricesalesPrice vm-display vm-price-value">
                                        <span class="vm-price-desc">Giá : </span><span style="text-decoration: line-through;" class="PricesalesPrice">{{ number_format($product->unit_price) }} ₫
                                        </span>
                                    </div>
                                <br>
                                    <div class="PricesalesPrice vm-display vm-price-value">
                                    <span class="vm-price-desc">Khuyến mãi: </span><span class="PricesalesPrice">{{ number_format($product->promotion_price) }}₫
                                    </span>
                                </div>
                                @else
                                    <div class="PricesalesPrice vm-display vm-price-value">
                                        <span class="vm-price-desc">Giá : </span><span class="PricesalesPrice">{{ number_format($product->unit_price) }}₫
                                        </span>
                                    </div>
                                <br>
                                @endif
                            </div>


                            <div class="addtocart-area">
                                <form method="post" class="product js-recalculate" action="#">

                                    <div class="addtocart-bar">
                                        <span class="addtocart-button">
                                            <input type="button" style="color: white" id="addtocart" name="addtocart" class="addtocart-button" value="Giỏ hàng" onclick="addcart(@php echo $product->id;@endphp)"
                                                                    >             </span>                             <!-- <label for="quantity33" class="quantity_box">Quantity: </label> -->
                                      


                                          </form>

                            </div>



                        </div>
                    </div>
                    <div class="clear"></div>


                    <div class="desc-review">
                        <div class="title-tabs">
                            <div class="active desc">Mô tả</div>
                            
                        </div>
                        <div class="detail-tabs">
                            <div class="product-description active">
                                <p>{{ $product->description}}</p>
                            </div>
                        </div>
                    </div>


                    <div class="product-related-products">
                        <h1>Sản phẩm liên quan</h1>
                        <div id="yt_component" class="span12">
        <div class="component-inner">
            <div class="component-inner2">
                <div class="browse-view">
                   
                        <!-- End Search Box -->
                     
                          @php
                            $i = 0;
                          @endphp
                        @foreach ($relateProduct as $product)
                        @php
                        if($i%2==0)
                        {
                            echo '<div class="row" style="margin-bottom:10px;border-bottom: 0.5px solid #c0f5f5">';
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
                                            <h2><a style="font-size: 13px" href="{!!url('chi-tiet-san-pham/'.$product->id.'-'.$product->slug)!!}">{{ $product->name }}</a></h2>
                                            <div class="product-price marginbottom12" id="productPrice54">
                                                <div class="PricesalesPrice vm-display vm-price-value"><span class="vm-price-desc">Giá: </span><span class="PricesalesPrice">{{ number_format($product->unit_price )  }} ₫</span></div>
                                            </div>
                                            <p class="product_s_desc">
                                                Makin zaten gravida eros quis justo sed nonummy...
                                            </p>
                                                <div class="btn-action clearfix">
                                                    
                                                        <div class="addtocart-area">

                                                            <form method="post" class="product js-recalculate" action="#">
                                                                
                                                                <div class="addtocart-bar">
                                                                <span class="addtocart-button">
                                                               <input type="button" style="color: white" id="addtocart" name="addtocart" class="addtocart-button" value="Giỏ hàng" onclick="addcart(@php echo $product->id;@endphp)"
                                                                    >
                                                                </span>
                                                 <div style="margin-left: 19px" class="wrap-button">
                                                        <a href="{!!url('chi-tiet-san-pham/'.$product->id.'-'.$product->slug)!!}" title="Diten face xare" class="button1 product-details">Chi tiết
                                                        </a>
                                                    </div>               
                                                                
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
               

                

            </div><!-- end browse-view -->
                <div class="horizontal-separator"></div>

                <div class="pagging-sort" style="margin-bottom: 10px">
                    <div class="pagination clearfix">
                       {{ $relateProduct->links() }}
                    </div>


                </div>

            </div><!-- end browse-view -->
                    </div>







                    
                </div>

            </div></div>
    </div>
</div>
@endsection
