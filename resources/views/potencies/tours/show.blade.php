@extends('layouts.app')


@section('head')
<style>
    .page-title .page-title-heading, .page-title .breadcrumbs {
        float: none !important;
    }
    .page-title .breadcrumbs {
        margin-top: .2rem;
    }

    .flexslider .slides img, .flexslider .slides iframe {
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

    .box-content {
        margin-bottom: 2rem;
    }

    .box-content:last-child {
        margin-bottom: 0;
    }

    .box-horizontal {
        margin: 1rem 0;
        margin-bottom: 2rem;
    }
    .box-horizontal div {
        flex: .8;
        line-height: 32px;
    }

    .box-horizontal ul {
        display: flex;
    }
    .box-horizontal ul li {
        display: inline-block;
        margin-left: .4rem;
        font-size: 1rem;
        flex: 1;
    }
        .btn-social {
        width: 100%;
        padding-top: .9rem;
        padding-bottom: .9rem;
        font-size: .9rem;
        }
        .btn-social i {
        font-size: 1.2rem;
        }
        .btn-wa {
        background-color: #128c7e;
        color: white;
        }
        .btn-phone {
        background-color: tomato;
        color: white;
        }
</style>
@endsection

@section('content')
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="h1-title">{{ $tour->title }}</h1>
                </div><!-- /.page-title-heading -->
                <ul class="breadcrumbs">
                    <li><a href="#" title="Beranda">Beranda<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="Wisata">Wisata<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="{{ $tour->title }}">{{ $tour->title }}</a></li>
                </ul><!-- /.breadcrumbs -->
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
                                <li><a href="#content">Informasi wisata</a></li>
                                <li><a href="#destination">Lokasi wisata</a></li>
                                <li><a href="#destination">Pengelolah wisata</a></li>
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
                                    @foreach($tour->attachments as $attachment)
                                    <li>
                                        <img src="{{ asset('storage/'.$attachment->path) }}" alt="img">
                                    </li>
                                    @endforeach

                                    @foreach($embedded as $item)
                                    <li>
                                        <iframe src="https://www.youtube.com/embed/{{ $item }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </li>
                                    @endforeach

                                    @if ($tour->attachments->count() < 1 && count($embedded) < 1)
                                    <li>
                                        <img src="https://mapandan.gov.ph/wp-content/uploads/2018/03/no_image.jpg" alt="">
                                    </li>
                                    @endif
                                </ul>
                            </div> <!-- /.flat-slides -->
                        </div> <!-- /.wrar-slides -->

                        <div class="box-content" id="content">
                            <div class="title">Mau tau informasi produk?</div>
                            <p>{!! $tour->content !!}</p>
                        </div>

                        <div class="box-content" id="destination">
                            <div class="title">Yuk, kunjugi lokasi wisatanya</div>
                            <div class="map-container">
                                <iframe
                                    src="https://maps.google.com/maps?q={{ $tour->lat }},{{ $tour->long }}&hl=es&z=14&amp;output=embed"
                                    style="border:0;"
                                    allowfullscreen=""
                                    loading="lazy">
                                </iframe>
                            </div>
                            <div class="box-content">
                                <div class="box-horizontal">
                                    <div class="title">Yuk, hubungi pengelolah wisata</div>
                                    <ul>
                                        <li>
                                            <a class="btn btn-social btn-phone" href="Tel:{{ $tour->owner_contact }}">
                                                <i class="fa fa-phone"></i> Telepon
                                            </a>
                                        </li>
                                        <li>
                                            <a class="btn btn-social btn-wa" target="__blank" href="https://wa.me/{{ $tour->owner_wacontact }}">
                                                <i class="fa fa-whatsapp"></i> WhatsApp
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="dividers dividers-bc-v4"></div>
                        </div>

                    </div> <!-- /.wrap-main-post -->
                </div>
            </div> <!-- /.col-md-9 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-row-iconbox -->

<section class="flat-row flat-owl-stage bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section left">
                    <h2>Wisata Lainnya</h2>
                </div><!-- /.title-section -->
            </div>
        </div><!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="iconbox-slider">
                    <ul class="slides" data-item="3" data-nav="false" data-dots="false" data-auto="true">
                        @foreach ($tours as $item)
                            <li class="item">
                                <div class="featured-post">
                                    @if ($item->attachments()->count() > 0)
                                        <img src="{{ asset('storage/'.$item->attachments[0]->path) }}" alt="img">
                                    @else
                                        <img src="https://mapandan.gov.ph/wp-content/uploads/2018/03/no_image.jpg" alt="">
                                    @endif
                                    <a href="images/stage/image-01.png"><i class="fa fa-arrows-alt"></i></a>
                                </div>
                                <div class="title-post">
                                    <a href="{{ route('potencies.tours.show', $item->slug) }}" title="">
                                        {{ str($item->title)->limit(70) }}
                                    </a>
                                </div>
                            </li><!-- /item -->
                        @endforeach
                    </ul><!-- /.slides -->
                </div>
                <div class="clearfix">

                </div><!-- /.clearfix -->
            </div><!-- /.col-md-12 -->
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-owl-stage -->
@endsection
