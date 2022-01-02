@extends('layouts.app')


@section('head')
<style>
    .flexslider .slides img {
        width: 100% !important;
        object-fit: cover;
        height: 500px !important;
    }

    .flat-slides .slides {
        width: 100%;
    }
    .flex-viewport li.clone {
        width: 781px !important;
    }

    .flexslider.s2 {
        margin-bottom: 2rem;
    }
    .widget.widget_nav_menu {
        margin-bottom: .8rem !important;
    }

    .price__container {
        background-color: #1BB95F;
        color: white;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: .8rem;
        margin: 1.8rem 0;
    }
    .price__container .price-title {
        font-size: 1rem;

    }
    .price__container .price-amount {
        font-size: 1.1rem;
        font-weight: 600;
    }

    .map-container {
        margin-top: 1.3rem;
    }
    .map-container iframe {
        width: 100%;
        height: 18.75rem;
        border-radius: 8px;
    }
    .box-content p {
        line-height: 1.9rem;
        font-size: 1rem;
    }
</style>
@endsection

@section('content')
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="h1-title">Overview</h1>
                </div><!-- /.page-title-heading -->
                <div class="clearfix"></div><!-- /.clearfix -->
            </div>
        </div>
    </div>
</div><!-- /.page-title -->

<section class="flat-row pd-aboutv3 " >
    <div class="container">
        <div class="row flat-tabs" data-effect ="fadeIn">
            <div class="col-md-3">
                <div class="sidebar left">
                    <aside class="widget widget_nav_menu" aria-labelledby="sidebar">
                        <div class="menu-services-container" >
                            <ul class="menu menu-tab">
                                <li class="active"><a href="#">Informasi produk</a></li>
                                <li><a href="#">Harga produk</a></li>
                                <li><a href="#">Informasi pengguna</a></li>
                            </ul>
                        </div>
                    </aside> <!-- /.widget_nav_menu -->

                    <aside class="widget widget-brochure services" aria-labelledby="sidebar">
                        <div class="brochure-box-title">
                            <h5 class="brochure-title">Butuh informasi ini?</h5>
                            <p>View our 2016 financial prospectus brochure
                                for an easy to read guide on all of the
                                services offered.
                            </p>
                        </div><!-- /.brochure-box-title -->
                        <p class="btn-download">
                            <a href="#" title="" class="pdf">Download PDF</a>
                        </p>
                    </aside><!-- /.widget-brochure -->
                </div><!-- /.sidebar -->
            </div> <!-- /.col-md-3 -->
            <div class="col-md-9 content-tab">
                <div class="content-inner">
                    <div class="wrap-main-post about-v3">
                        <div class="flexslider s2">
                            <div class="flat-slides">
                                <ul class="slides">
                                    <li>
                                        <img src="{{ asset('storage/hello.jpg') }}" alt="img">
                                    </li>
                                </ul>
                            </div> <!-- /.flat-slides -->
                        </div> <!-- /.wrar-slides -->

                        <div class="box-content">
                            <div class="title">Mau tau informasi produk?</div>
                            <p>In your life, you may have many times facing financial issues. It’s good if you know how to handle it by yourself and have enough time to take care of it. In other cases, it’s time you get a financial consulting service. And the article below will show you those cases.quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                        </div>

                        <div class="box-content">
                            <div class="price__container">
                                <h3 class="price-title">Harga produk</h3>
                                <h3 class="price-amount">
                                    Rp30.000
                                </h3>
                            </div>
                        </div>

                        <div class="box-content">
                            <div class="title">Yuk, hubungi pelapak untuk mendapatkan produknya</div>
                            <p>In your life, you may have many times facing financial issues. It’s good if you know how to handle it by yourself and have enough time to take care of it. In other cases, it’s time you get a financial consulting service. And the article below will show you those cases.quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem.</p>
                            <div class="map-container">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.5787314251243!2d128.18832411451777!3d-3.682888843973487!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2d6ce8fdf19aca6d%3A0xbe0c10fee9afbd73!2sJl.%20Galunggung%2C%20Batu%20Merah%2C%20Sirimau%2C%20Kota%20Ambon%2C%20Maluku!5e0!3m2!1sid!2sid!4v1641106392149!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            </div>
                            <div class="dividers dividers-bc-v4"></div>
                        </div>

                    </div> <!-- /.wrap-main-post -->
                </div>
            </div> <!-- /.col-md-9 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-row-iconbox -->
@endsection
