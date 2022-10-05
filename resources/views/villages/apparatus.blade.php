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
                        Informasi Aparatur Desa
                    </h1>
                </div><!-- /.page-title-heading -->
                <ul class="breadcrumbs">
                    <li><a href="#" title="">Beranda<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="">Tentang Desa<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="">Aparatur Desa</a></li>
                </ul><!-- /.breadcrumbs -->
                <div class="clearfix"></div><!-- /.clearfix -->
            </div>
        </div>
    </div>
</div><!-- /.page-title -->

<section class="flat-row pd-about-team">
    <div class="container">
        <div class="row">
            @forelse ($apparatus as $item)
            <div class="col-md-3">
                <div class="flat-team team-grid has-image">
                    <div class="team-image">
                        @if (is_null($item->picture))
                        <img src="{{ asset('img/placeholder.png') }}" alt="img">
                        @else
                        <img src="{{ asset('storage/'. $item->picture) }}" class="profile" alt="img">
                        @endif

                    </div>
                    <div class="team-info">
                        <div class="team-subtitle">{{ $item->job_position }}</div>
                        <div class="team-name">{{ strtoupper($item->name) }}</div>
                        <div class="team-desc"></div>
                        <div class="social-links">
                            <a target="__blank" href="{{ $item->fb_link }}" data-title="Facebook" class="facebook"><i class="fa fa-facebook"></i></a>
                            <a href="mailto:{{ $item->email }}" data-title="LinkedIn" class="linkedin"><i class="fa fa-envelope"></i></a>
                        </div>
                    </div>
                </div> <!-- /.flat-team -->
            </div> <!-- /.col-md-3 -->
            @empty
            <div class="col-12">
                <h3 class="text-center">Tidak ada data apatatur desa</h3>
            </div>
            @endforelse
        </div>
    </div><!-- /.container -->
</section><!-- /.flat-row-iconbox -->
@endsection
