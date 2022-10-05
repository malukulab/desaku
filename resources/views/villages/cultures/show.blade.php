@extends('layouts.app')


@section('head')
<style>
    .page-title .page-title-heading, .page-title .breadcrumbs {
        float: none !important;
    }
    .page-title .breadcrumbs {
        margin-top: .2rem;
    }
    .entry-meta {
        margin-bottom: 0 !important;
    }
    .sharethis-inline-share-buttons {
        margin: 1rem 0;
        text-align: left;
    }
    .reaction-buttons-container, .tags-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .reaction-buttons-container h5, .tags-container h5 {
        font-size: 1.1rem;
        font-weight: 500;
    }
    .tags-container {
        padding-top: 1.8rem;
        margin-top: .8rem;
        border-top: 1px solid #eff0f4;
    }
    .main-post {
        margin-bottom: 0 !important;
        border-bottom-width: 0 !important;
    }

    .main-post .entry-content p {
        font-size: 1.1rem !important;
        line-height: 2rem;
    }
    .flexslider .slides img {
        width: 100% !important;
        object-fit: cover;
        height: 500px !important;
    }

    .flat-slides .slides {
        width: 100%;
    }
    .flex-viewport li.clone, .flex-viewport li {
        width: 742px !important;
    }

    .flexslider.s2 {
        margin-bottom: 2rem;
    }
    .widget.widget_nav_menu {
        margin-bottom: .8rem !important;
    }
    .featured-post img {
        width: 100%;
    }
    @media print {
        .sharethis-inline-share-buttons, .reaction-buttons-container, .header, .top, .sidebar, .tags-container, footer {
            display: none !important;
        }

        .featured-post img {
            margin: .8rem 0 !important;
            border-radius: 6px;
        }
    }
</style>
@endsection

@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="page-title-heading">
                        <h1 class="h1-title">Seni dan Kebudayaan</h1>
                    </div><!-- /.page-title-heading -->
                    <ul class="breadcrumbs">
                        <li><a href="#" title="Beranda">Beranda<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                        <li><a href="#" title="Seni">Seni dan Kebudayaan<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                        <li><a href="#" title="{{ $culture->title }}">{{ $culture->title  }}</a></li>
                    </ul><!-- /.breadcrumbs -->
                    <div class="clearfix"></div><!-- /.clearfix -->
                </div>
            </div>
        </div>
    </div>
    <section class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="post-wrap">
                        <article class="main-post">
                            <div class="entry-post-title">
                                <h2 class="post-title">
                                    <a title="" href="#">
                                        {{ $culture->title }}
                                    </a>
                                </h2>
                                <ul class="entry-meta">
                                    <li class="date">
                                        <a title="" href="#">
                                            {{ $culture->created_at->locale('id_ID')->isoFormat('LLLL') }}
                                        </a>
                                    </li>
                                    <li class="author">
                                        <a title="" href="#">Diterbitkan oleh admin</a>
                                    </li>
                                </ul>
                                <div class="sharethis-inline-share-buttons"></div>
                            </div>
                            <div class="featured-post">

                                <div class="flexslider s2">
                                    <div class="flat-slides">
                                        <ul class="slides">
                                            @forelse($culture->attachments as $attachment)
                                            <li>
                                                <img src="{{ asset('storage/'. $attachment->path) }}" alt="img">
                                            </li>
                                            @empty
                                            <li>
                                                <img src="https://mapandan.gov.ph/wp-content/uploads/2018/03/no_image.jpg" alt="">
                                            </li>
                                            @endforelse
                                        </ul>
                                    </div> <!-- /.flat-slides -->
                                </div> <!-- /.wrar-slides -->
                            </div>
                            <div class="entry-content">
                                <p>{!! $culture->content !!}</p>
                                <br>
                                <div class="widget widget-tags">
                                    <div class="reaction-buttons-container">
                                        <h5>Bagaimana reaksimu?</h5>
                                        <!-- ShareThis BEGIN --><div class="sharethis-inline-reaction-buttons"></div><!-- ShareThis END -->
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar right">
                        <aside id="recent-post" class=" widget widget-recent">
                            <h3 class="widget-title">Seni dan Budaya Lainnya</h3>
                                <ul>
                                    @foreach ($cultures as $item)
                                    <li>
                                        <a title="{{ $item->title }}" href="{{ route('cultures.show',  $item->slug) }}">{{  $item->title }} </a><span>{{ $item->created_at->locale('id_ID')->isoFormat('LL')}}</span>
                                    </li>
                                    @endforeach
                                </ul>
                        </aside>
                        <aside class="widget widget-brochure">
                            <div class="brochure-box-title">
                                <h5 class="brochure-title">Butuh informasi ini?</h5>
                                <p>
                                    Informasi <strong>{{ $culture->title }}</strong> dapat tersedia secara offline untuk kamu baca, kamu hanya perlu mengunduhnya dibawah ini.
                                </p>
                            </div>
                            <p class="btn-download"><a title="Download PDF" class="pdf" id="btn-download" href="#">Download PDF</a></p>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('script')
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=61d0f79d5d828a00190e4122&product=sop' async='async'></script>
@endsection
