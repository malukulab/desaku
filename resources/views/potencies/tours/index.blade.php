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
        align-items: center;
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
                    <h1 class="h1-title">Informasi Wisata Negeri Hila</h1>
                </div><!-- /.page-title-heading -->
                <ul class="breadcrumbs">
                    <li><a href="#" title="Beranda">Beranda<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="Beria">Wisata</a></li>
                </ul><!-- /.breadcrumbs -->
                <div class="clearfix"></div><!-- /.clearfix -->
            </div>
        </div>
    </div>
</div>
<section class="flat-row pd-services-post">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section center s1">
                    <h2>Wisata? Ngak Usah Jauh-Jauh #DiNegeriHilaAja</h2>
                    <p class="sub-title-section">
                        Menyediakan Informasi mengenai Destinasi Wisata di Negeri Hila Kota Ambon
                    </p>
                </div><!-- /.title-section -->
                <div class="dividers dividers-imagebox"></div>
            </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="wrap-imagebox-grid">
                    @forelse ( $tours as $tour )
                    <div class="flat-imagebox services-grid item">
                        <div class="flat-imagebox-inner">
                            <div class="flat-imagebox-image">
                                <img src="{{ asset('storage/hello.jpg') }}" alt="img">
                            </div>
                            <div class="flat-imagebox-header">
                                <h3 class="flat-imagebox-title">
                                    <a href="{{ route('potencies.tours.show', $tour->slug) }}">
                                        {{ $tour->title }}
                                    </a>
                                </h3>
                            </div>
                            <div class="flat-imagebox-content">
                                <div class="flat-imagebox-desc">{{ str($tour->content)->limit(200) }}</div>
                                <div class="flat-imagebox-button">
                                    <a href="{{ route('potencies.tours.show', $tour->slug) }}">Selengkapnya</a>
                                </div>
                            </div>
                        </div>
                    </div> <!-- /.item .flat-imagebox -->
                    @empty
                    <div class="not-found-container">
                        <img src="{{ asset('img/not-found-1.webp') }}" alt="not found"/>
                        <p>Wisata belum tersedia</p>
                    </div>
                    @endforelse
                </div> <!-- /.wrap-imagebox-grid -->
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="dividers dividers-pagination"></div>
                <div class="blog-single-pagination">
                    {{ $tours->links('pagination::bootstrap-4-finance') }}
                </div><!-- /.blog-pagination -->
            </div>
        </div>
    </div><!-- /.container -->
</section><!-- /.flat-row-iconbox -->

@endsection
