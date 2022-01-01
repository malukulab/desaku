@extends('layouts.app')

@section('head')
<style>
    .page-title .page-title-heading, .page-title .breadcrumbs {
        float: none !important;
    }
    .page-title .breadcrumbs  {
        margin-top: .2rem;
    }

    .content-post .title-post {
        line-height: 1.6rem;
    }

    .post .post-date .month {
        font-size: .9rem !important;
        padding: .2rem .5rem;
    }

    .post .content-post {
        height: 16.25rem;
        max-height: 16.25rem;
    }

    .post {
        margin-bottom: 1rem !important;
    }
    .post:last-child {
        margin-bottom: 0;
    }
</style>
@endsection
@section('content')
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="h1-title">Informasi Berita</h1>
                </div><!-- /.page-title-heading -->
                <ul class="breadcrumbs">
                    <li><a href="#" title="Beranda">Beranda<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="Beria">Berita</a></li>
                </ul><!-- /.breadcrumbs -->
                <div class="clearfix"></div><!-- /.clearfix -->
            </div>
        </div>
    </div>
</div>

<section class="main-content blog-single-post">
    <div class="container">
        <div class="row">
            <div class="post-wrap">
                @forelse ( $news as $item )
                    <div class="col-md-4">
                        <article class="post">
                            <div class="featured-post">
                                <a href="#" title="" class="post-image">
                                    <img src="{{ asset('storage/hello.jpg') }}" alt="img">
                                </a>
                                <ul class="post-date">
                                    <li class="month">
                                        {{ $item->created_at->locale('id_ID')->isoFormat('LL') }}
                                    </li>
                                </ul>
                            </div><!-- /.featured-post -->
                            <div class="content-post">
                                <h4 class="title-post">
                                    <a href="#" title="">
                                        {{ $item->title }}
                                    </a>
                                </h4>
                                <div class="entry-post">
                                    <p>
                                        {{ str($item->content)->limit(80) }}
                                    </p>
                                    <div class="more-link">
                                        <a href="{{ route('news.show', $item->slug) }}" title="">Baca selengkapnya</a>
                                    </div>
                                </div><!-- /.entry-post -->
                            </div><!-- /.content-post -->
                        </article><!-- /.post -->
                    </div>
                @empty


                @endforelse
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="dividers dividers-pagination"></div>
                <div class="blog-single-pagination">
                    {{ $news->links('pagination::bootstrap-4-finance') }}
                </div><!-- /.blog-pagination -->
            </div>
        </div>
    </div>
</section>
@endsection
