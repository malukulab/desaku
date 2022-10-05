@extends('layouts.app')


@section('head')
<style>
    .page-title .page-title-heading, .page-title .breadcrumbs {
        float: none !important;
    }
    .page-title .breadcrumbs {
        margin-top: .2rem;
    }
    .content {
        margin: 2rem 0;
        margin-bottom: 4rem;
    }
    .content__description {
        line-height: 34px;
        font-size: 1.1rem;
        text-align: justify;
    }

    .content__description p, .content__description img, .content__description iframe  {
        margin-bottom: 1.5rem;
    }
    .content__description img, .content__description iframe {
        width: 100%;
        border-radius: 5px;
    }
    .flexslider.apparatus .slides li {
        margin: 0;
        height: 100% !important;
    }
    .flex-viewport li.clone {
        width: 316px !important;
    }
    .slides {
        height: 100%;
    }
    .flexslider {
        height: 100% !important;
        box-shadow: none;
        border: none;
    }



    .flex-viewport {
        height: 100%;
    }

    .flat-accordion .toggle-content {
        /* padding: 0; */
        height: 360px;

    }
    .flexslider.apparatus .slides li {
        display: flex !important;
        flex-direction: column;
        justify-content: center;
        align-items: center;
    }
    .flexslider.apparatus .slides img {
        width: 220px !important;
        object-fit: contain;
        height: 300px !important;
    }
    .flexslider.apparatus .slides .title {
        font-size: 1rem;
        margin-top: .7rem;
        font-weight: 600;
    }

    .toggle-content {
        height: auto !important;
    }


</style>
@endsection

@section('content')
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="page-title-heading">
                    <h1 class="h1-title">Sejarah Negeri Hila</h1>
                </div><!-- /.page-title-heading -->
                <ul class="breadcrumbs">
                    <li><a href="#" title="">Beranda<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="">Sejarah</a></li>
                </ul><!-- /.breadcrumbs -->
                <div class="clearfix"></div><!-- /.clearfix -->
            </div>
        </div>
    </div>
</div><!-- /.page-title -->

<section class="content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="content__description">
                    {!! $history->data['content'] !!}
                </div>
            </div>
            <div class="col-md-4">
                <div class="flat-accordion style">
                    <div class="flat-toggle">
                        <h6 class="toggle-title active">Aparatur Desa</h6>
                        <div class="toggle-content">
                            <div class="flexslider apparatus">
                                <div class="flat-slides">
                                    <ul class="slides">
                                        @forelse ( $apparatus as $item)
                                            <li>
                                                <img src="{{ asset('storage/'. $item->picture) }}" alt="img">
                                                <p class="title">{{ str($item->name)->upper()->limit(70) }}</p>
                                                <p class="subtitle">
                                                    {{ strtoupper( $item->job_position) }}
                                                </p>
                                            </li>
                                        @empty
                                            <li>
                                                <img src="https://mapandan.gov.ph/wp-content/uploads/2018/03/no_image.jpg" alt="">
                                            </li>
                                        @endforelse
                                    </ul>
                                </div> <!-- /.flat-slides -->
                            </div> <!-- /.wrar-slides -->
                        </div>
                    </div><!-- /toggle -->

                    <div class="flat-toggle">
                        <h6 class="toggle-title active">Info Grafis</h6>
                        <div class="toggle-content">
                            <div class="flexslider info">
                                <div class="flat-slides">
                                    <ul class="slides">
                                        @forelse ( $grafis as $item)
                                        <li>
                                            <img src="{{ asset('storage/'. $item->data['content'] ) }}" alt="img">
                                        </li>
                                        @empty
                                            <li>
                                                <img src="https://mapandan.gov.ph/wp-content/uploads/2018/03/no_image.jpg" alt="">
                                            </li>
                                        @endforelse
                                    </ul>
                                </div> <!-- /.flat-slides -->
                            </div> <!-- /.wrar-slides -->
                        </div>
                    </div><!-- /toggle -->
                </div> <!-- /.flat-accordion -->
            </div>
        </div>
    </div>
</section>
@endsection
