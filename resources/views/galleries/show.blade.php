@extends('layouts.app')


@section('head')
<style>
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
    <section class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="post-wrap">
                        <article class="main-post">
                            <div class="entry-post-title">
                                <h2 class="post-title">
                                    <a title="" href="#">
                                        Judul posingan
                                    </a>
                                </h2>
                                <ul class="entry-meta">
                                    <li class="date">
                                        <a title="" href="#">
                                            Jan 12 2021
                                        </a>
                                    </li>
                                    <li class="author">
                                        <a title="" href="#">Diterbitkan oleh admin</a>
                                    </li>
                                </ul>
                                <div class="sharethis-inline-share-buttons"></div>
                            </div>
                            <div class="featured-post">
                                <a href="#">
                                    <img src="{{ asset('storage/hello.jpg') }}" alt="financial">
                                    <br>
                                    <iframe style="width: 100%; height: 400px;" src="{{ asset('Beranda.pdf') }}">
                                    </iframe>
                                </a>
                            </div>
                            <div class="entry-content">
                                <p>Halo dunia</p>
                                <br>
                                <div class="widget widget-tags">
                                    <div class="tags-container">
                                        <h5>Kategori</h5>
                                        <div class="tag-cloud">

                                            <a title="#" class="tag-link" href="">
                                             Halodunia
                                            </a>

                                        </div>

                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-md-4">

                </div>
            </div>
        </div>
    </section>
@endsection
@section('script')
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=61d0f79d5d828a00190e4122&product=sop' async='async'></script>
@endsection
