@extends('layouts.app')


@section('head')
<style>
    .page-title .page-title-heading, .page-title .breadcrumbs {
        float: none !important;
    }
    .page-title .breadcrumbs {
        margin-top: .2rem;
    }
    .profile {
        height: 400px;
        width: 290px;
        object-fit: cover;
        border-radius: 5px;
    }

    .flat-team {
        margin-bottom: 1rem;
    }

</style>
@endsection
@section('content')
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="h1-title">
                        Struktur Organisasi
                    </h1>
                </div><!-- /.page-title-heading -->
                <ul class="breadcrumbs">
                    <li><a href="#" title="">Beranda<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="">Tentang Desa<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="">Struktur Organisasi</a></li>
                </ul><!-- /.breadcrumbs -->
                <div class="clearfix"></div><!-- /.clearfix -->
            </div>
        </div>
    </div>
</div><!-- /.page-title -->

<section class="flat-row pd-about-team">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <img src="{{ asset('storage/'.$organization->data['path']) }}" alt="">
            </div>
        </div>
    </div><!-- /.container -->
</section><!-- /.flat-row-iconbox -->
@endsection
