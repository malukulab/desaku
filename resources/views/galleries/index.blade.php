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
</style>

@endsection


@section('content')
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="h1-title">Portfolio Load More</h1>
                </div><!-- /.page-title-heading -->
                <ul class="breadcrumbs">
                    <li><a href="#" title="">Beranda<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="">Galeri</a></li>
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
                            <li><a data-filter=".business" href="#">Gambar</a></li>
                            <li><a data-filter=".finance" href="#">Video</a></li>
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
                        <div class="item business savings trading">
                            <div class="wrap-iconbox">
                                <div class="featured-post">
                                    <img src="{{ asset('storage/hello.jpg') }}" alt="img">
                                </div>
                                <div class="title-post">
                                    <a href="#">Business Solutions</a>
                                </div>
                                <div class="category-post">
                                    <a href="#" title="">Services </a>/
                                    <a href="#" title=""> Trading</a>
                                </div>
                            </div> <!-- /.wrap-iconbox -->
                        </div><!-- /.portfolio-item -->
                    </div><!-- /.portfolio-wrap -->
                </div><!-- /.flat-portfolio -->
            </div>
        </div>
    </div>
</section>
@endsection
