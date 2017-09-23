<div id="content_left" class="span3">
    <div class="content-left-in row-fluid">
        <div id="position-2" class="span12">
            <!--<div class="yt-position-inner">-->
             <div class="module exclusive">
                 <div class="modcontent clearfix">
                    <div style="text-align: center;">
                        <h3 class="modtitle">Tìm kiếm</h3>
                    </div>
                    <div class="box">
                        <form method="get" action="{{ route('timkiem') }}">
                          
                           <span style="font-weight: bold; color: #d22222"> Giá :</span>
                            <select name="keyword" style="width: 85%">
                            <option value="0to100">Dưới 100.000 ₫</option>
                            <option value="100to200">Từ 100.000 ₫ - 200.000 ₫ </option>
                            <option value="200tomax">Trên 200.000 ₫</option>
                             </select>
                            <div style="text-align: center;" class="item-readmore">
                                <button type="submit" class="button1" title="Fate rinus late">
                                    Tìm kiếm
                                </button>
                            </div>
                                           
                        </form>
                    </div>
                </div>

            </div>
            <div class="module news1 bg-title">

                <!--<div class="wrap-title">-->
                <h3 class="modtitle">Categories</h3>
                <!--</div>-->
                <div class="modcontent clearfix">
                    
                    <ul class="nav menu _menu">
                        @php
                            $id = 0;
                            $actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") .
                             "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                            $myArray = explode('/', $actual_link);
                           // echo "<script>alert( 'Debug Objects: " . $myArray[4] . "' );</script>";
                            if ($myArray[4]=='loai-san-pham') {
                                $slug = $myArray[count($myArray)-1];
                                $array =  explode('-', $slug);
                                $id = $array[0];
                               
                                 
                            }
                            elseif ($myArray[4]=='chi-tiet-san-pham') {
                               $id=9999;
                            }
                            //echo "<script>alert( 'Debug Objects: " . $id . "' );</script>";
                        @endphp
                        @foreach ($loai_sp as $loai)
                         <li class="item-688 @if (($loai->id == $id)&&($id!=0))
                             current active
                            
                         @endif @if (isset($product))
                             @if (($loai->id == $product->id_type)&&($id!=0))
                             current active
                         @endif"
                         @endif> 
                            <a href="{!!url('loai-san-pham/'.$loai->id.'-'.$loai->slug)!!}">{{ $loai->catename }}</a>
                        </li>   
                       @endforeach
                    </ul>
                </div>
            </div>
        <div class="module news1 bg-title">

            <!--<div class="wrap-title">-->
            <h3 class="modtitle">Latest News</h3>
            <!--</div>-->
            <div class="modcontent clearfix">
                <div id="sj_basic_news_15045869711116694499" class="sj-basic-news">
                    <div class="bs-items">
                        
                                <div class="bs-item cf  bs-show-line ">
                                    <div class="bs-content">
                                        <div class="bs-title">
                                            <a href="index.php/joomla-pages/joomla-content/single-article.html" title="Bener senver cans">
                                                Bener senver cans
                                            </a>
                                            </div>
                                            <div class="bs-cat-date">
                                                <span class="bs-date">26 May 2011</span>
                                            </div>
                                            <div class="bs-description">
                                                Zute disse at libero porttitor nisi aliquet vulputate vitae at velit. Aliquam eget arcu magna, vel ...						
                                                <div class="bs-readmore">
                                                    <a href="index.php/joomla-pages/joomla-content/single-article.html" title="Bener senver cans">
                                                        Read more +
                                                    </a>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="bs-item cf  bs-show-line  last">
                                            <div class="bs-content">
                                                <div class="bs-title">
                                                    <a href="index.php/enkis-enka-pazine.html" title="Detus lapi tuka">
                                                        Detus lapi tuka
                                                    </a>
                                                    </div>
                                                    <div class="bs-cat-date">
                                                        <span class="bs-date">26 May 2011</span>
                                                    </div>
                                                    <div class="bs-description">
                                                        Suspendisse at libero porttitor nisi aliquet vulputate vitae at velit. Aliquam eget arcu magna, vel ...						
                                                        <div class="bs-readmore">
                                                            <a href="index.php/enkis-enka-pazine.html" title="Detus lapi tuka">
                                                                Read more +
                                                            </a>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                </div>
                                <div class="module exclusive">

                                    <div class="modcontent clearfix">


                                        <div>
                                            Exclusive Email Offers
                                        </div>
                                        <div>
                                            Get exclusive Millennium &amp; Copthorne offers delivered right to your inbox
                                        </div>
                                        <div class="box">
                                            <input type="text" placeholder="Your email">
                                            <input type="button" value="search">
                                        </div>
                                    </div>


                                </div>
                                <div class="module">

                                    <div class="modcontent clearfix">
                                        <div class="bannergroup">

                                            <div class="banneritem">
                                                <a href="http://www.smartaddons.com/" target="_blank" title="SJ Barkery">
                                                    <img src="public/source/images/banners/bakery.png" alt="SJ Barkery">
                                                </a>
                                                <div class="clr"></div>
                                            </div>

                                        </div>
                                    </div>


                                </div>

                                <!--</div>-->
                            </div>
                        </div>
                    </div>