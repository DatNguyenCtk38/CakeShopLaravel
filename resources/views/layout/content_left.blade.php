<div id="content_left" class="span3">
    <div class="content-left-in row-fluid">
        <div id="position-2" class="span12">
            <!--<div class="yt-position-inner">-->
             <div class="module ">
                 <div class="modcontent clearfix">
                    <div style="text-align: center;">
                        <h3 class="modtitle">Tìm kiếm</h3>
                    </div>
                    <div class="box">
                        <form method="get" action="{{ route('timkiem') }}">
                          
                           <span style="font-weight: bold; color: #d22222">Từ khóa</span>
                            <input style ="width:190px" type="text" name="keyword">
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
                <h3 class="modtitle">Thể loại</h3>
                <!--</div>-->
                <div class="modcontent clearfix">
                    
                    <ul class="nav menu _menu">
                       
                        @foreach ($loai_sp as $loai)
                         <li class="item-688">
                            <a href="{!!url('loai-san-pham/'.$loai->id.'-'.$loai->slug)!!}">{{ $loai->catename }}</a>
                        </li>   
                       @endforeach
                    </ul>
                </div>
            </div>
        <div class="module news1 bg-title">

            <!--<div class="wrap-title">-->
            <h3 class="modtitle">Tin tức</h3>
            <!--</div>-->
            <div class="modcontent clearfix">
                <div id="sj_basic_news_15045869711116694499" class="sj-basic-news">
                    <div class="bs-items">
                        
                                <div class="bs-item cf  bs-show-line ">
                                    <div class="bs-content">
                                        <div class="bs-title">
                                            <a href="index.php/joomla-pages/joomla-content/single-article.html" title="Bener senver cans">
                                                Khuyễn mãi trung thu 2017
                                            </a>
                                            </div>
                                            <div class="bs-cat-date">
                                                <span class="bs-date">23 -9 - 2017</span>
                                            </div>
                                            <div class="bs-description">
                                               Tưng bừng trung thu 2017, khuyến mãi các mặt hàng từ ngày 23 - 27 tháng 9 ...						
                                                <div class="bs-readmore">
                                                    <a href="{{ route('trang-chu') }}">
                                                        xem thêm
                                                    </a>
                                                    </div>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="bs-item cf  bs-show-line  last">
                                            <div class="bs-content">
                                                <div class="bs-title">
                                                    <a href="index.php/enkis-enka-pazine.html" title="Detus lapi tuka">
                                                        Khuyến mãi kỉ niệm 1 năm
                                                    </a>
                                                    </div>
                                                    <div class="bs-cat-date">
                                                        <span class="bs-date">20 - 8 - 2017</span>
                                                    </div>
                                                    <div class="bs-description">
                                                        Nhân dịp kỉ niệm một năm. Chúng tối khuyến mãi 20%  ...						
                                                        <div class="bs-readmore">
                                                            <a href="{{ route('trang-chu') }}">
                                                                xem thêm
                                                            </a>
                                                            </div>
                                                        </div>


                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                    </div>


                                </div>
                               
                                <div class="module">

                                    <div class="modcontent clearfix">
                                        <div class="bannergroup">

                                            <div class="banneritem">
                                                <a href="{{ route('trang-chu') }}" target="_blank" title="SJ Barkery">
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