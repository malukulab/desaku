@extends('layouts.app')

@section('head')
<style>
    .page-title .page-title-heading, .page-title .breadcrumbs {
        float: none !important;
    }
    .page-title .breadcrumbs {
        margin-top: .3rem;
    }
    .title-section h2 {
        font-size: 1.4rem;
    }
    .h1-title {
        line-height: 2.7rem;
    }

    .pd-services-post {
        padding-top: 2.5rem;
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
                    <h1 class="h1-title">UKM (Usaha Kecil dan Menengah) di Negeri Hila</h1>
                </div><!-- /.page-title-heading -->
                <ul class="breadcrumbs">
                    <li><a href="#" title="">Beranda<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="">Potensi<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="">Usaha Kecil dan Menengah</a></li>
                </ul><!-- /.breadcrumbs -->
                <div class="clearfix"></div><!-- /.clearfix -->
            </div>
        </div>
    </div>
</div><!-- /.page-title -->

<section class="flat-row pd-services-post">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="title-section center s1">
                    <h2>Saatnya UKM Naik Kelas</h2>
                    <p class="sub-title-section">
                        Untuk mempermudah UKM mengakses pengetahuan bisnis, kami menyediakan kamus bisnis, ratusan artikel ulasan kasus-kasus bisnis, dan berita-berita penting untuk memperkaya sudut pandang dan wawasan pelaku usaha yang ingin naik kelas.
                    </p>
                </div><!-- /.title-section -->
                <div class="dividers dividers-imagebox"></div>
            </div>
        </div><!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="wrap-imagebox-grid">
                    @forelse ($businessProducts as $product)
                        <div class="flat-imagebox services-grid item">
                            <div class="flat-imagebox-inner">
                                <div class="flat-imagebox-image">
                                    <img src="{{ asset('storage/hello.jpg') }}" alt="img">
                                </div>
                                <div class="flat-imagebox-header">
                                    <h3 class="flat-imagebox-title">
                                        <a href="#">
                                            {{ $product->title }}
                                        </a>
                                    </h3>
                                </div>
                                <div class="flat-imagebox-content">
                                    <div class="flat-imagebox-desc">
                                        {{ str($product->content)->limit(100) }}
                                    </div>
                                    <div class="flat-imagebox-button">
                                        <a href="{{ route('potencies.ukm.show', $product->slug) }}">Selengkapnya</a>
                                    </div>
                                </div>
                            </div>
                        </div> <!-- /.item .flat-imagebox -->
                    @empty
                        <div class="not-found-container">
                            <img src="{{ asset('img/not-found-1.webp') }}" alt="not found"/>
                            <p>Produk UKM belum tersedia</p>
                        </div>
                    @endforelse
                </div> <!-- /.wrap-imagebox-grid -->
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                {{ $businessProducts->links('pagination::bootstrap-4-finance') }}
            </div>
        </div>
    </div><!-- /.container -->
</section><!-- /.flat-row-iconbox -->
@endsection
