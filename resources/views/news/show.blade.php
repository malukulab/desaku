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
    .reaction-buttons-container, .tags-container {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .reaction-buttons-container h5, .tags-container h5 {
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
        .sharethis-inline-share-buttons, .reaction-buttons-container, .header, .top, .sidebar, .tags-container, footer {
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
                                        {{ $news->title }}
                                    </a>
                                </h2>
                                <ul class="entry-meta">
                                    <li class="date">
                                        <a title="" href="#">
                                            {{ $news->created_at->locale('id_ID')->isoFormat('LLLL') }}
                                        </a>
                                    </li>
                                    <li class="author">
                                        <a title="" href="#">Diterbitkan oleh admin</a>
                                    </li>
                                </ul>
                                <div class="sharethis-inline-share-buttons"></div>
                            </div>
                            <div class="featured-post">
                                <a title="" href="/blog-single">
                                    <img src="{{ asset('storage/hello.jpg') }}" alt="financial">
                                </a>
                            </div>
                            <div class="entry-content">
                                <p> Sed facilisis lorem in orci bibendum ullamcorper. Mauris vitae augue elementum, sodales nulla a, semper ligula. Nullam vel enim risus. Integer rhoncus hendrerit sem egestas porttitor. Integer et mi sed dolor eleifend pretium quis ut velit. Nam sit amet arcu feugiat, consequat orci at, ultrices magna </p> <br><p> But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure.</p> <br><p> At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere possimus, omnis voluptas assumenda est, omnis dolor repellendus.</p> <br>
                                <div class="widget widget-tags">
                                    <div class="reaction-buttons-container">
                                        <h5>Bagaimana reaksimu?</h5>
                                        <!-- ShareThis BEGIN --><div class="sharethis-inline-reaction-buttons"></div><!-- ShareThis END -->
                                    </div>
                                    <div class="tags-container">
                                        <h5>Kategori</h5>
                                        <div class="tag-cloud">
                                            <a title="" class="tag-link" href="/blog-single">Creative</a>
                                            <a title="" class="tag-link" href="/blog-single">Portfolio</a>
                                            <a title="" class="tag-link" href="/blog-single">ThemeForest</a>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sidebar right">
                        <aside id="recent-post" class=" widget widget-recent">
                            <h3 class="widget-title">Berita Terbaru</h3>
                                <ul>
                                    <li>
                                        <a title="" href="/blog-single">Why Do I Need To Use Financial ?</a><span>January 11, 2021</span></li>
                                    <li>
                                        <a title="" href="/blog-single">Why your sales forecast is off</a><span>January 11, 2021</span></li>
                                    <li>
                                        <a title="" href="/blog-single">6 tips to retain your top sales talent</a><span>January 11, 2021</span></li>
                                    <li>
                                        <a title="" href="/blog-single">What the martian can teach sales</a><span>January 11, 2021</span></li>
                                </ul>
                        </aside>
                        <aside class="widget widget-brochure">
                            <div class="brochure-box-title">
                                <h5 class="brochure-title">Butuh informasi ini?</h5>
                                <p>
                                    Informasi <strong>{{ $news->title }}</strong> dapat tersedia secara offline untuk kamu baca, kamu hanya perlu mengunduhnya dibawah ini.
                                </p>
                            </div>
                            <p class="btn-download"><a title="Download PDF" class="pdf" id="btn-download" href="#">Download PDF</a></p>
                        </aside>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection


@section('script')
<script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=61d0f79d5d828a00190e4122&product=sop' async='async'></script>
<script>
    $(document).ready(main);

    function main() {
        $('#btn-download').on('click', (e) => {
            e.preventDefault();
            window.print();
        });
    }
</script>
@endsection
