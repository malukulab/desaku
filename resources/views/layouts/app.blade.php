
<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->
<head>
	<!-- Basic Page Needs -->
	<meta charset="UTF-8">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<title>@yield('title', 'Beranda')</title>

	<meta name="author" content="azmanabdlh">

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">


    <!-- Prefetch -->
    <link rel="prefetch" type="text/javascript" href="{{ asset('vendor/finance-accounting/js/jquery.min.js') }}">
    <link rel="prefetch" type="text/javascript" href="{{ asset('vendor/finance-accounting/js/bootstrap.min.js') }}">
    <link rel="prefetch" type="text/javascript" href="{{ asset('vendor/finance-accounting/js/jquery.easing.js') }}">
    <link rel="prefetch" type="text/javascript" href="{{ asset('vendor/finance-accounting/js/jquery.flexslider-min.js') }}">
    <link rel="prefetch" type="text/javascript" href="{{ asset('vendor/finance-accounting/js/waypoints.min.js') }}">
    <link rel="prefetch" type="text/javascript" href="{{ asset('vendor/finance-accounting/js/main.js') }}">

	<!-- Boostrap style -->
    <link rel="prefetch" type="text/css" href="{{ asset('vendor/finance-accounting/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/finance-accounting/css/bootstrap.min.css') }}">

    @hasSection('carousel')
    <!-- REVOLUTION LAYERS STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/finance-accounting/revolution/css/layers.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/finance-accounting/revolution/css/settings.css') }}">
    @endif
	<!-- Theme style -->
    {{-- <link rel="prefetch" type="text/css" href="{{ asset('vendor/finance-accounting/css/style.css') }}"> --}}
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/finance-accounting/css/style.css?id='. Str::random(10)) }}">

    <!-- Colors -->
    <link rel="stylesheet" type="text/css" href="stylesheet/colors/color1.css" id="colors">

	<!-- Reponsive -->
    <link rel="prefetch" type="text/css" href="{{ asset('vendor/finance-accounting/css/responsive.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('vendor/finance-accounting/css/responsive.css') }}">

    <!-- Animation Style -->
    <link rel="stylesheet" type="text/css" href="{{ asset('vendor/finance-accounting/css/animate.css') }}">

    @yield('head')
</head>
	<body>

        <div class="boxed">
		<!-- Preloader -->
	    <div class="preloader">
	        <div class="clear-loading loading-effect-2">
	            <span></span>
	        </div>
	    </div>

		<div class="top">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="flat-infomation">
							<li class="phone">Hubungi kami: <a href="+61383766284" title="phone">+61 3 8376 6284</a></li>
							<li class="email">Alamat email: <a href="mailto:support24-7@gmail.com" title="email">support24-7@gmail.com</a></li>
						</ul><!-- /flat-infomation -->
						<div class="flat-questions">
							<a href="#" title="" class="questions">Kamu memiliki pertanyaan?</a>
						</div><!-- /.flat-questions -->
						<div class="clearfix"></div><!-- /.clearfix -->
					</div>
				</div>
			</div>
		</div><!-- /.top -->

		<header id="header" class="header bg-color">
			<div class="container">
				<div class="row">
					<div class="header-wrap">
						<div class="col-md-2">
							<div id="logo" class="logo">
								<a href="#" title="">
									<img src="images/logo-blog.png" alt="Logo"/>
								</a>
							</div><!-- /#logo -->
						</div><!-- /.col-md-2 -->
						<div class="col-md-10">
                            <div class="flat-show-search">
    							<div class="show-search">
    		                        <a href="#"><i class="fa fa-search"></i></a>
    		                    </div>
                                <div class="top-search">
                                    <form action="#" id="searchform-all" method="get">
                                        <div>
                                            <input autocomplete="off" type="text" id="s" class="sss" placeholder="Telusuri berita">
                                            <input type="submit" value="" id="searchsubmit">
                                        </div>
                                    </form>
                                </div> <!-- /.top-search -->
                            </div>	<!-- /.flat-show-search -->
							<div class="nav-wrap">
                                <div class="btn-menu">
                                    <span></span>
                                </div><!-- //mobile menu button -->
								<nav id="mainnav" class="mainnav">
									<ul class="menu">
										<li>
											<a href="#" title="Beranda">Beranda</a>
										</li>

										<li>
											<a href="#" title="Tentang desa">Tentang Desa  <i class="fa fa-angle-down" aria-hidden="true"></i></a>
											<ul class="sub-menu">
												<li><a href="services-v1.html" title="">Services Grid</a></li>
                                                <li><a href="services-v2.html" title="">Risk Management</a></li>
											</ul><!-- /.sub-menu -->
										</li>
                                        <li>
											<a href="#" title="Berita">Berita</a>
										</li>
										<li>
											<a href="#" title="Demografi">Informasi Demografi  <i class="fa fa-angle-down" aria-hidden="true"></i></a>
											<ul class="sub-menu">
												<li><a href="portfolio-v3.html" title="">Portfolio Default</a></li>
                                                <li><a href="portfolio-v2.html" title="">Layout 02</a></li>
                                                <li><a href="portfolio-v1.html" title="">Portfolio Load More</a></li>
											</ul><!-- /.sub-menu -->
										</li>
										<li>
											<a href="blog.html" title="Potensi">Potensi  <i class="fa fa-angle-down" aria-hidden="true"></i></a>
											<ul class="sub-menu">
												<li><a href="blog.html" title="">Blog</a></li>
												<li><a href="blog-single.html" title="">Blog Grid</a></li>
											</ul><!-- /.sub-menu -->
										</li>
										<li>
											<a href="#" title="">Galeri</a>
										</li>
									</ul><!-- /.menu -->
								</nav><!-- /#mainnav -->
							</div><!-- /.nav-wrap -->
						</div><!-- /.col-md-9 -->
					</div><!-- /.header-wrap -->
				</div><!-- /.row -->
			</div><!-- /.container -->
		</header><!-- /header -->

        @hasSection('carousel')
		<!-- START REVOLUTION SLIDER 5.4.2 auto mode -->
        <div id="banner-container" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classic4export" data-source="gallery" style="margin:0px auto;background-color:transparent;padding:0px;margin-top:0px;margin-bottom:0px;">
                <!-- START REVOLUTION SLIDER 5.3.0.2 auto mode -->
                <div id="banner-slide" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.3.0.2">
                    <div class="slotholder"></div>


                    <ul><!-- SLIDE  -->

                        <!-- SLIDE 3 -->
                        <li data-index="rs-3049" data-transition="slideremovedown" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"    data-rotate="0"  data-saveperformance="off"  data-title="Ken Burns" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">

                            <!-- MAIN IMAGE -->
                            <img src="images/slides/slide1.png"  alt=""  data-bgposition="center center" data-kenburns="off" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
                            <!-- LAYERS -->

                            <!-- LAYER NR. 12 -->
                            <div class="tp-caption title-slide color-white letter-spacing3px"
                                id="slide-3049-layer-1"
                                data-x="['left','left','left','left']" data-hoffset="['39','39','39','39']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['-105','-77','-77','-77']"
                                data-fontsize="['55','52','45','35']"
                                data-lineheight="['60','57','50','40']"
                                data-fontweight="['600','600','600','600']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"

                                data-type="text"
                                data-responsive_offset="on"

                                data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'

                                data-textAlign="['left','left','left','left']"
                                data-paddingtop="[10,10,10,10]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0"
                                data-paddingleft="[0,0,0,0]"

                                style="z-index: 16; white-space: nowrap;text-transform:left;">We help businesses<br>innovate and grow
                            </div>

                            <!-- LAYER NR. 13 -->
                            <div class="tp-caption sub-title color-white"
                                id="slide-3049-layer-4"
                                data-x="['left','left','left','left']" data-hoffset="['37','37','37','37']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['30','30','30','0']"
                                data-fontsize="['20',18','18','14']"
                                data-lineheight="['30','28','28','24']"
                                data-fontweight="['400','400','400','400']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"

                                data-type="text"
                                data-responsive_offset="on"

                                data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                data-textAlign="['left','left','left','left']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"

                                style="z-index: 17; white-space: nowrap;text-transform:left;">With over 10 years of experience helping businesses to find<br>comprehensive solutions
                            </div>

                            <a href="#" target="_self" class="tp-caption flat-button-slider bg-blue"

                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'

                            data-x="['left','left','left','left']" data-hoffset="['36','36','36','36']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['140','140','140','80']"
                            data-fontsize="['14','14','14','14']"
                            data-width="['auto']"
                            data-height="['auto']">Our Company
                            </a><!-- END LAYER LINK -->

                            <a href="#" target="_self" class="tp-caption flat-button-slider bg-transparent"

                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'

                            data-x="['left','left','left','left']" data-hoffset="['205','205','205','205']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['140','140','140','80']"
                            data-fontsize="['14',14','14','14']"
                            data-width="['auto']"
                            data-height="['auto']">Get in Touch
                            </a><!-- END LAYER LINK -->
                        </li>

                        <!-- SLIDE 2 -->
                        <li data-index="rs-3048" data-transition="random-static" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"    data-rotate="0"  data-saveperformance="off"  data-title="HTML5 Video" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">
                            <!-- MAIN IMAGE -->
                            <img src="images/slides/slide1.png"  alt=""  data-bgposition="center center" data-bgfit="cover" data-bgparallax="10" class="rev-slidebg" data-no-retina>

                            <!-- BACKGROUND VIDEO LAYER -->
                            <div class="rs-background-video-layer"
                                data-forcerewind="on"
                                data-volume="mute"
                                data-vimeoid="183002944"
                                data-videoattributes="background=1&title=0&amp;byline=0&amp;portrait=0&amp;api=1"
                                data-videowidth="100%"
                                data-videoheight="100%"
                                data-videocontrols="none"
                                data-videostartat="00:00"
                                data-videoendat="00:48"
                                data-videoloop="loop"
                                data-forceCover="1"
                                data-aspectratio="4:3"
                                data-autoplay="true"
                                data-autoplayonlyfirsttime="false" ></div>


                            <!-- LAYER NR. 12 -->
                            <div class="tp-caption title-slide color-white"
                                id="slide-3048-layer-1"
                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['-95','-95','-95','-55']"
                                data-fontsize="['58','55','45','30']"
                                data-lineheight="['60','57','55','35']"
                                data-fontweight="['600','600','600','600']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"

                                data-type="text"
                                data-responsive_offset="on"

                                data-frames='[{"delay":1000,"speed":2000,"frame":"0","from":"y:-50px;opacity:0;","to":"o:1;","ease":"Power3.easeInOut"},{"delay":"wait","speed":300,"frame":"999","to":"auto:auto;","ease":"Power3.easeInOut"}]'

                                data-textAlign="['center','center','center','center']"
                                data-paddingtop="[10,10,10,10]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0"
                                data-paddingleft="[0,0,0,0]"

                                style="z-index: 16; white-space: nowrap;text-transform:left;">FINANCE WORDPRESS THEME
                            </div>

                            <!-- LAYER NR. 13 -->
                            <div class="tp-caption sub-title color-white"
                                id="slide-3048-layer-4"
                                data-x="['center','center','center','center']" data-hoffset="['0','0','0','0']"
                                data-y="['middle','middle','middle','middle']" data-voffset="['-15','-15','0','0']"
                                data-fontsize="['20',18','18','14']"
                                data-lineheight="['30','28','28','24']"
                                data-fontweight="['400','400','400','400']"
                                data-width="none"
                                data-height="none"
                                data-whitespace="nowrap"

                                data-type="text"
                                data-responsive_offset="on"

                                data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":1500,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'
                                data-textAlign="['center','center','center','center']"
                                data-paddingtop="[0,0,0,0]"
                                data-paddingright="[0,0,0,0]"
                                data-paddingbottom="[0,0,0,0]"
                                data-paddingleft="[0,0,0,0]"

                                style="z-index: 17; white-space: nowrap;text-transform:left;">With over 10 years of experience helping businesses to find<br>comprehensive solutions
                            </div>

                            <a href="#" target="_self" class="tp-caption flat-button-slider bg-transparent"

                            data-frames='[{"from":"y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;","mask":"x:0px;y:[100%];s:inherit;e:inherit;","speed":2000,"to":"o:1;","delay":2000,"ease":"Power4.easeInOut"},{"delay":"wait","speed":1000,"to":"y:[100%];","mask":"x:inherit;y:inherit;s:inherit;e:inherit;","ease":"Power2.easeInOut"}]'

                            data-x="['center','center','center','center']" data-hoffset="['-18','-18','0','0']"
                            data-y="['middle','middle','middle','middle']" data-voffset="['100','100','100','70']"
                            data-fontsize="['14',14','14','14']"
                            data-width="['188']"
                            data-height="['auto']">Purchase Theme
                            </a><!-- END LAYER LINK -->
                        </li>
                    </ul>
                </div>
        </div><!-- END REVOLUTION SLIDER -->
        @endif

        @yield('content')

		<footer id="footer">
            <!-- Visi, Misi & Moto -->
            <div class="footer-blockquote">
                <div class="container">
                    <div class="flat-row flat-client">
                        <ul class="flat-carousel" data-item="1" data-nav="false" data-dots="false" data-auto="true">
                            <li class="item">
                                <h3 class="title">Visi</h3>
                                <figure>
                                    <blockquote>
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae rerum voluptates, non impedit praesentium ipsa.
                                        <figcaption>
                                            Ketua Negeri Hila
                                        </figcaption>
                                    </blockquote>
                                </figure>
                            </li> <!-- /item -->
                            <li class="item">
                                <h3 class="title">Misi</h3>
                                <figure>
                                    <blockquote>
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae rerum voluptates, non impedit praesentium ipsa.
                                        <figcaption>
                                            Ketua Negeri Hila
                                        </figcaption>
                                    </blockquote>
                                </figure>
                            </li> <!-- /item -->
                            <li class="item">
                                <h3 class="title">Motto</h3>
                                <figure>
                                    <blockquote>
                                        Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quae rerum voluptates, non impedit praesentium ipsa.
                                        <figcaption>
                                            Ketua Negeri Hila
                                        </figcaption>
                                    </blockquote>
                                </figure>
                            </li> <!-- /item -->
                        </ul><!-- /.slides -->
                    </div>
                </div>
            </div>
            <!-- End -->
			<div class="footer-widgets">
				<div class="container">
					<div class="row widget-box">
						<div class="col-md-8">
							<div class="widget widget-text">
								<h6>
                                    Tentang Hila
								</h6>
								<p>
									Hila adalah sebuah negeri di kecamatan Leihitu, Kabupaten Maluku Tengah, Provinsi Maluku, Indonesia. Terletak di pantai utara Pulau Ambon danberjarak sekitar 37 km dari pusat kota Ambon.
                                    Desa Wisata Hila terletak di dataran rendah dan sedikit berbukit ke arah selatan menuju Negeri Hative Besar di Kota Madya Ambon.
								</p>
							</div><!-- /.widget-text -->
                            <div class="widget-infomation">
								<ul class="infomation-footer">
									<li><i class="fa fa-envelope" aria-hidden="true"></i><a href="#" title="">support@desahila.com</a></li>
									<li><i class="fa fa-phone" aria-hidden="true"></i><a href="#" title="">+61 3 8376 6284</a></li>
									<li>
                                        <span><i class="fa fa-map-marker" aria-hidden="true"></i></span>
                                        <a href="#" title="">Desa Hila 97440 Kode POS kecamatan Leihitu, Kabupaten Maluku Tengah, Provinsi Maluku, Indonesia</a>
                                    </li>
								</ul>
							</div>
						</div>

					</div><!-- /.row .widget-box -->
				</div><!-- /.container -->
			</div><!-- /.footer-widgets -->
			<div class="footer-bottom">
				<div class="container">
					<div class="row">
						<div class="col-md-12">
							<div class="copyright">
								<p>&copy; 2017 Theme by <a href="#" title="">Themesflat</a> - Desa.id Negeri Hila</p>
							</div>
						</div>
					</div>
				</div>
			</div><!-- /.footer-bottom -->
		</footer><!-- /#footer -->
		<div class="button-go-top">
			<a href="#" title="" class="go-top">
				<i class="fa fa-chevron-up"></i>
			</a>
		</div>

        </div> <!-- /.boxed -->
    <!-- Javascript -->
    <script type="text/javascript" src="{{ asset('vendor/finance-accounting/js/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/finance-accounting/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/finance-accounting/js/owl.carousel.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/finance-accounting/js/jquery.easing.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/finance-accounting/js/jquery.flexslider-min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/finance-accounting/js/waypoints.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('vendor/finance-accounting/js/jquery.cookie.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/finance-accounting/js/jquery-validate.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/finance-accounting/js/main.js') }}"></script>


    <!-- Revolution Slider -->
    <script type="text/javascript" src="revolution/js/jquery.themepunch.tools.min.js"></script>
    <script type="text/javascript" src="revolution/js/jquery.themepunch.revolution.min.js"></script>
    <script type="text/javascript" src="revolution/js/slider_v1.js"></script>

    <!-- SLIDER REVOLUTION 5.0 EXTENSIONS  (Load Extensions only on Local File Systems !  The following part can be removed on Server for On Demand Loading) -->
    <script type="text/javascript" src="{{ asset('vendor/finance-accounting/revolution/js/extensions/revolution.extension.actions.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/finance-accounting/revolution/js/extensions/revolution.extension.carousel.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/finance-accounting/revolution/js/extensions/revolution.extension.kenburn.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/finance-accounting/revolution/js/extensions/revolution.extension.layeranimation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/finance-accounting/revolution/js/extensions/revolution.extension.migration.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/finance-accounting/revolution/js/extensions/revolution.extension.navigation.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/finance-accounting/revolution/js/extensions/revolution.extension.parallax.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/finance-accounting/revolution/js/extensions/revolution.extension.slideanims.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('vendor/finance-accounting/revolution/js/extensions/revolution.extension.video.min.js') }}"></script>

    @yield('script')
	</body>
</html>
