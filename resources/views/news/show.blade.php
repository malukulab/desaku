@extends('layouts.app')


@section('head')
<style>
    .page-title .page-title-heading, .page-title .breadcrumbs {
        float: none !important;
    }
    .page-title .breadcrumbs {
        margin-top: .2rem;
    }

    .page-title {
        margin-bottom: -1rem;
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

    @media print {
        .sharethis-inline-share-buttons, .reaction-buttons-container, .header, .top, .sidebar, .tags-container, footer {
            display: none !important;
        }

        .featured-post img {
            margin: .8rem 0 !important;
            border-radius: 6px;
        }
    }
    .featured-post img {
        width: 100%;
    }
</style>
@endsection

@section('content')
    <div class="page-title">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="page-title-heading">
                        <h1 class="h1-title">{{ $news->title }}</h1>
                    </div><!-- /.page-title-heading -->
                    <ul class="breadcrumbs">
                        <li><a href="#" title="Beranda">Beranda<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                        <li><a href="#" title="Seni">Berita<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                        <li><a href="#" title="{{ $news->title }}">{{ $news->title  }}</a></li>
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
                                <ul class="entry-meta">
                                    <li class="date">
                                        <a title="" href="#">
                                            {{ $news->created_at->locale('id_ID')->isoFormat('LLLL') }}
                                        </a>
                                    </li>
                                    <li class="author">
                                        <a title="" href="#">Diterbitkan oleh admin</a>
                                    </li>
                                </ul>
                                <div class="sharethis-inline-share-buttons"></div>
                            </div>
                            <div class="featured-post">
                                <a href="#">
                                    @if ($news->attachments()->count() > 0)
                                        <img src="{{ asset('storage/'.$news->attachments[0]->path) }}" alt="img">
                                    @else
                                    <img src="https://mapandan.gov.ph/wp-content/uploads/2018/03/no_image.jpg" alt="">
                                    @endif
                                </a>
                            </div>
                            <div class="entry-content">
                                <p>{!! $news->content !!}</p>
                                <br>
                                <div class="widget widget-tags">
                                    <div class="reaction-buttons-container">
                                        <h5>Bagaimana reaksimu?</h5>
                                        <!-- ShareThis BEGIN --><div class="sharethis-inline-reaction-buttons"></div><!-- ShareThis END -->
                                    </div>
                                    <div class="tags-container">
                                        <h5>Kategori</h5>
                                        <div class="tag-cloud">
                                            @foreach($news->categories as $category)
                                            <a title="{{ $category->name }}" class="tag-link" href="">
                                                {{ $category->name }}
                                            </a>
                                            @endforeach
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-md-4">
                    <x-sidebar-news :news="$news"/>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('script')
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=61d0f79d5d828a00190e4122&product=sop' async='async'></script>
@endsection
