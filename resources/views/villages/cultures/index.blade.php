@extends('layouts.app')

@section('head')
<style>
    .page-title .page-title-heading, .page-title .breadcrumbs {
        float: none !important;
    }
    .page-title .breadcrumbs {
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
    .not-found-container {
        display: flex;
        flex-direction: column;
        align-cultures: center;
    }
    .not-found-container img {
        width: 400px;
    }
    .not-found-container p {
        font-size: 1.5rem;
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
                    <li><a href="#" title="Beranda">Tentang Desa<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="Beria">Seni dan Kebudayaan</a></li>
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
                @forelse ( $cultures as $culture )
                    <div class="col-md-4">
                        <article class="post">
                            <div class="featured-post">
                                <a href="{{ route('cultures.show', $culture->slug) }}" title="{{ $culture->title }}" class="post-image">
                                    @if ($culture->attachments->count() > 0)
                                        <img src="{{ asset('storage/'. $culture->attachments[0]->path) }}" alt="img">
                                    @else
                                        <img src="https://mapandan.gov.ph/wp-content/uploads/2018/03/no_image.jpg" alt="">
                                    @endif
                                </a>
                                <ul class="post-date">
                                    <li class="month">
                                        {{ $culture->created_at->locale('id_ID')->isoFormat('LL') }}
                                    </li>
                                </ul>
                            </div><!-- /.featured-post -->
                            <div class="content-post">
                                <h4 class="title-post">
                                    <a href="#" title="">
                                        {{ $culture->title }}
                                    </a>
                                </h4>
                                <div class="entry-post">
                                    <p>
                                        {!! str($culture->content)->limit(150) !!}
                                    </p>
                                    <div class="more-link">
                                        <a href="{{ route('cultures.show', $culture->slug) }}" title="">Baca selengkapnya</a>
                                    </div>
                                </div><!-- /.entry-post -->
                            </div><!-- /.content-post -->
                        </article><!-- /.post -->
                    </div>
                @empty
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="not-found-container">
                                    <img src="{{ asset('img/not-found-1.webp') }}" alt="not found"/>
                                    <p>Data Seni dan Kudayaan tidak tersedia</p>
                                </div>
                            </div>
                        </div>
                    </div>

                @endforelse
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="dividers dividers-pagination"></div>
                <div class="blog-single-pagination">
                    {{ $cultures->links('pagination::bootstrap-4-finance') }}
                </div><!-- /.blog-pagination -->
            </div>
        </div>
    </div>
</section>
@endsection
