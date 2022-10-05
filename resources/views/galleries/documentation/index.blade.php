@extends('layouts.app')

@section('head')
<style>
    .page-title .page-title-heading, .page-title .breadcrumbs {
        float: none !important;
    }
    .page-title .breadcrumbs {
        margin-top: .3rem;
    }

    .flat-row {
        margin-bottom: 2rem;
    }

    .flat-imagebox-button a {
        color: #1BB95F !important;
        font-weight: 600 !important;
        margin-top: .7rem;
        display: block;
    }

    .flat-imagebox-button a i {
        font-weight: 600;
        margin-left: .3rem;
    }
    .title-post {
        margin-bottom: .3rem !important;
    }
    .not-found-container {
        display: flex;
        flex-direction: column;
        align-items: center;
        margin-bottom: 2rem;
    }
    .not-found-container img {
        width: 400px;
    }
    .not-found-container p {
        font-size: 1.5rem;
        margin-top: -2rem !important;
    }
    .more-link i {
        display: inline-block;
        margin-left: .5rem;
    }
    .more-link a {
        background-color: #2e363a;
        border-radius: 3px;
        font-weight: 600;
        display: inline-block;
        line-height: 40px;
        padding: 0 38px 3px;
        letter-spacing: 0;
        color: #ffffff;
        margin-top: .5rem;
    }

</style>

@endsection


@section('content')
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="h1-title">Informasi Dokumentasi</h1>
                </div><!-- /.page-title-heading -->
                <ul class="breadcrumbs">
                    <li><a href="#" title="">Beranda<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="">Galeri<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="">Dokumentasi</a></li>
                </ul><!-- /.breadcrumbs -->
                <div class="clearfix"></div><!-- /.clearfix -->
            </div>
        </div>
    </div>
</div><!-- /.page-title -->

<!-- Portfolio -->
<section class="flat-row" id="work">
    <div class="bg-portfolio-filter">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul class="portfolio-filter">
                            <li class="active"><a data-filter="*" href="#">Semua</a></li>
                            <li><a data-filter=".business" href="?content-type=image">Gambar</a></li>
                            <li><a data-filter=".finance" href="?content-type=video">Video</a></li>
                    </ul><!-- /.project-filter -->
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="dividers portfolio"></div>
                <div class="flat-portfolio">
                    <div class="portfolio-wrap grid one-three clearfix">
                        @forelse ($documentations as $item)
                        <div class="item business savings trading">
                            <div class="wrap-iconbox">
                                <div class="featured-post">
                                    @if ($item->attachments->count() > 0)
                                        <img src="{{ asset('storage/'. $item->attachments[0]->path) }}" alt="img">
                                    @else
                                        <img src="https://mapandan.gov.ph/wp-content/uploads/2018/03/no_image.jpg" alt="">
                                    @endif
                                </div>
                                <div class="title-post">
                                    <a href="#">{{ str($item->title)->limit(80) }}</a>
                                </div>
                                <div class="category-post">
                                    <a href="#" title="">
                                        {{ $item->created_at->locale('id_ID')->isoFormat('LLL') }}
                                    </a>
                                </div>
                                <div class="flat-imagebox-content">
                                    <div class="flat-imagebox-desc">
                                        {!! str($item->content)->limit(120) !!}
                                    </div>
                                    <div class="more-link">
                                        <a href="{{ route('gelleries.documentation.show', $item->slug) }}">Selengkapnya <i class="fa fa-angle-right" aria-hidden="true"></i></a>
                                    </div>
                                </div>
                            </div> <!-- /.wrap-iconbox -->
                        </div><!-- /.portfolio-item -->
                        @empty
                        <div class="not-found-container">
                            <img src="{{ asset('img/not-found-1.webp') }}" alt="not found"/>
                            <p>Dokumentasi belum tersedia</p>
                        </div>
                        @endforelse
                    </div><!-- /.portfolio-wrap -->
                </div><!-- /.flat-portfolio -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="dividers dividers-pagination"></div>
                <div class="blog-single-pagination">
                    {{ $documentations->links('pagination::bootstrap-4-finance') }}
                </div><!-- /.blog-pagination -->
            </div>
        </div>
    </div>
</section>
@endsection
