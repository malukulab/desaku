@extends('layouts.app')


@section('head')
<style>
    .page-title .page-title-heading, .page-title .breadcrumbs {
        float: none !important;
    }
    .page-title .breadcrumbs {
        margin-top: .3rem;
    }
    .entry-meta {
        margin-bottom: 0 !important;
    }
    .sharethis-inline-share-buttons {
        margin: 1rem 0;
        text-align: left;
    }
    .tags-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .tags-container h5 {
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
    .flex-viewport li.clone {
        width: 742px !important;
    }

    .entry-content {
        margin-top: -5.5rem;
    }

    @media print {
        .sharethis-inline-share-buttons, .header, .top, .sidebar, .tags-container, footer {
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
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="h1-title">{{ $activity->title }}</h1>
                </div><!-- /.page-title-heading -->
                <ul class="breadcrumbs">
                    <li><a href="#" title="">Beranda<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="">Galeri<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="">Kegiatan<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="">{{ $activity->title }}</a></li>
                </ul><!-- /.breadcrumbs -->
                <div class="clearfix"></div><!-- /.clearfix -->
            </div>
        </div>
    </div>
</div><!-- /.page-title -->

<section class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="post-wrap">
                    <article class="main-post">
                        <div class="entry-post-title">
                            <ul class="entry-meta">
                                <li class="date">
                                    {{ $activity->created_at->locale('id-ID')->isoFormat('LLL') }}
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
                                        @foreach($activity->attachments as $attachment)
                                        <li>
                                            <img src="{{ asset('storage/'.$attachment->path) }}" alt="img">
                                        </li>
                                        @endforeach

                                        @foreach($embedded as $item)
                                        <li>
                                            <iframe src="https://www.youtube.com/embed/{{ $item }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                        </li>
                                        @endforeach

                                        @if ($activity->attachments->count() < 1 && count($embedded) < 1)
                                        <li>
                                            <img src="https://mapandan.gov.ph/wp-content/uploads/2018/03/no_image.jpg" alt="">
                                        </li>
                                        @endif
                                    </ul>
                                </div> <!-- /.flat-slides -->
                            </div> <!-- /.wrar-slides -->
                        </div>
                        <div class="entry-content">
                            <p>
                                {!! $activity->content !!}
                            </p>
                            <br>

                        </div>
                    </article>
                </div>
            </div>
            <div class="col-md-4">
                <div class="sidebar right">
                    <aside id="recent-post" class=" widget widget-recent">
                        <h3 class="widget-title">Kegiatan Lainnya</h3>
                            <ul>
                                @foreach ($activities as $item)
                                <li>
                                    <a title="{{ $item->title }}" href="{{ route('gelleries.activities.show',  $item->slug) }}">{{  $item->title }} </a><span>{{ $item->created_at->locale('id_ID')->isoFormat('LL')}}</span>
                                </li>
                                @endforeach
                            </ul>
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
