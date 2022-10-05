@extends('layouts.app')


@section('head')
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/finance-accounting/revolution/css/layers.css') }}">
<link rel="stylesheet" type="text/css" href="{{ asset('vendor/finance-accounting/revolution/css/settings.css') }}">

<style>
    .imagebox-item {
        margin-bottom: 1rem;
    }

    .imagebox-item .imagebox-content {
        width: 100%;
    }

    .slides .item .featured-post img {
        height: 300px;
        object-fit: cover;
    }
    .entry-post * {
        font-size: .9rem;
    }
    .slidebar-news .thumb {
        margin-bottom: .8rem !important;
    }
    .title-post a {
        line-height: 30px;
    }
    .tp-parallax-wrap:nth-child(even) {
        top: 250px !important;
    }
    .fullwidthbanner-container img {
        height: 400px !important;
    }
    .imagebox-item {
        height: 15rem;
    }

</style>
@endsection

@section('script')
<script type="text/javascript" src="{{ asset('vendor/finance-accounting/revolution/js/jquery.themepunch.tools.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/finance-accounting/revolution/js/jquery.themepunch.revolution.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/finance-accounting/revolution/js/slider_v1.js') }}"></script>
@endsection

@section('content')
<!-- START REVOLUTION SLIDER 5.4.2 auto mode -->
<div id="banner-container" class="rev_slider_wrapper fullwidthbanner-container" data-alias="classic4export" data-source="gallery">
    <!-- START REVOLUTION SLIDER 5.3.0.2 auto mode -->
    <div id="banner-slide" class="rev_slider fullwidthabanner" style="display:none;" data-version="5.3.0.2">
        <div class="slotholder"></div>


        <ul><!-- SLIDE  -->
            @foreach ($carousels as $key => $carousel)
            <!-- SLIDE 3 -->
            <li data-index="{{ $key }}" data-transition="slideremovedown" data-slotamount="7" data-hideafterloop="0" data-hideslideonmobile="off"  data-easein="Power4.easeInOut" data-easeout="Power4.easeInOut" data-masterspeed="2000"    data-rotate="0"  data-saveperformance="off"  data-title="Ken Burns" data-param1="" data-param2="" data-param3="" data-param4="" data-param5="" data-param6="" data-param7="" data-param8="" data-param9="" data-param10="" data-description="">

                <!-- MAIN IMAGE -->
                <img src="{{ asset('storage/'. $carousel->data['image']) }}"  alt=""  data-bgposition="center center" data-kenburns="off" data-duration="30000" data-ease="Linear.easeNone" data-scalestart="100" data-scaleend="120" data-rotatestart="0" data-rotateend="0" data-offsetstart="0 0" data-offsetend="0 0" data-bgparallax="10" class="rev-slidebg" data-no-retina>
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

                    style="z-index: 16; white-space: nowrap;text-transform:left;">
                    {{ $carousel?->data['title'] }}
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

                    style="z-index: 17; white-space: nowrap;text-transform:left;">
                    {{ $carousel?->data['description'] }}
                </div>
            </li>
            @endforeach

        </ul>
    </div>
</div>
<!-- END REVOLUTION SLIDER -->

<section class="flat-row pd-imagebox">

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section left">
                    <h2>
                        Tempat Wisata
                    </h2>
                </div><!-- /.title-section -->
            </div>
        </div><!-- /.row -->

        <div class="row">
            @forelse ( $tours as $tour)
                <div class="col-md-4">
                    <div class="imagebox-item">
                        <div class="imagebox style1">
                            <div class="imagebox-image">
                                @if ($tour->attachments()->count() > 0)
                                <img src="{{ asset('storage/'. $tour->attachments[0]->path) }}" alt="img">
                                @else
                                    <img src="https://howfix.net/wp-content/uploads/2018/02/sIaRmaFSMfrw8QJIBAa8mA-article.png" alt="">
                                @endif
                            </div><!-- /.imagebox-image -->

                            <div class="imagebox-title">
                                <h3><a href="#" title="">
                                    {{ str($tour->title)->limit(80) }}
                                </a></h3>
                            </div><!-- /.iamgebox-title -->
                            <div class="imagebox-content">
                                <div class="imagebox-desc">
                                    <p>
                                        {!! str($tour->content)->limit(100) !!}
                                    </p>
                                </div>
                                <div class="imagebox-button">
                                    <a href="{{ route('potencies.tours.show', $tour->slug) }}" title="">
                                        Lihat Selengkapnya
                                    </a>
                                </div>
                            </div><!-- /.imagebox-content -->
                        </div><!-- /.imagebox -->
                    </div><!-- /.imagebox-item -->
                </div><!-- /.col-md-4 -->
            @empty
                <p>Tidak ada data wisata</p>
            @endforelse
        </div><!-- /.row -->
    </div><!-- /.container -->
</section><!-- /.flat-row-imagebox -->



<section class="flat-row flat-news">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="title-section left">
                    <h2>
                        Informasi Berita Terbaru
                    </h2>
                </div><!-- /.title-section -->
            </div>
        </div><!-- /.row -->

        <div class="row">
            @foreach ($news->take(2) as $item)
            <div class="col-md-4">
                <article class="post style2">
                    <div class="featured-post">
                        <a href="{{ route('news.show', $item->slug) }}" title="" class="post-image">
                            @if ($item->attachments->count() < 1)
                                <img src="https://howfix.net/wp-content/uploads/2018/02/sIaRmaFSMfrw8QJIBAa8mA-article.png" alt="">
                            @else
                                <img src="{{ asset('storage/'. $item->attachments[0]->path) }}" alt="">
                            @endif
                        </a>
                        <ul class="post-date">
                            <li class="day" style='font-size: .9rem;'>
                                {{ $item->created_at->locale('id-ID')->isoFormat('LLL') }}
                            </li>
                        </ul>
                    </div><!-- /.featured-post -->
                    <div class="content-post">
                        <h4 class="title-post">
                            <a href="{{ route('news.show', $item->slug) }}" title="">
                                {{ str($item->title)->limit(50) }}
                            </a>
                        </h4>
                        <div class="entry-post">
                            <p>{!! str($item->content)->limit(70) !!}</p>
                        </div>
                    </div><!-- /.content-post -->
                </article><!-- /.post -->
            </div><!-- /.col-md-4 -->
            @endforeach

            <div class="col-md-4">
                <div class="slidebar-news">
                <aside class="widget widget-recent-news">
                    <ul class="recent-news">
                        @foreach ($news->skip(2) as $item)
                        <li>

                            <div class="text">
                                <h4>
                                    <a href="{{ route('news.show', $item->slug) }}" title="">
                                        {{ str($item->title)->limit(40) }}
                                    </a>
                                </h4>
                                <div class="entry-post">
                                    <p>{{ $item->created_at->locale('id-ID')->isoFormat('LLL') }}</p>
                                </div>
                            </div><!-- /.content-post -->
                        </li>
                        @endforeach
                    </ul>
                </aside><!-- /.widget-recent-news -->
                </div><!-- /.slidebar-news -->
            </div><!-- /.col-md-4 -->

        </div><!-- /.row -->

    </div><!-- /.container -->
</section><!-- /.flat-news -->

<section class="flat-row flat-owl-stage">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section left">
                    <h2>Produk Unggulan</h2>
                </div><!-- /.title-section -->
            </div>
        </div><!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="iconbox-slider">
                    <ul class="slides" data-item="3" data-nav="false" data-dots="false" data-auto="true">
                        @foreach ($products as $product)
                        <li class="item">
                            <div class="featured-post">
                                @if ($product->attachments()->count() > 0)
                                <img src="{{ asset('storage/'. $product->attachments[0]->path) }}" alt="img">
                                @else
                                <img src="https://howfix.net/wp-content/uploads/2018/02/sIaRmaFSMfrw8QJIBAa8mA-article.png" alt="">
                                @endif
                                <a href="{{ route('potencies.products.show', $product->slug) }}"><i class="fa fa-arrows-alt"></i></a>
                            </div>
                            <div class="title-post">
                                <a href="{{ route('potencies.products.show', $product->slug) }}" title="">
                                    {{ str($product->content)->limit(30) }}
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
