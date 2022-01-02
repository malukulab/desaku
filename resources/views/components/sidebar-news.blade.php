@props([
    'news',
])

<div class="sidebar right">
    <aside id="recent-post" class=" widget widget-recent">
        <h3 class="widget-title">Berita Terbaru</h3>
            <ul>
                @foreach ($listOfNews as $item)
                <li>
                    <a title="{{ $item->title }}" href="{{ route('news.show',  $item->slug) }}">{{  $item->title }} </a><span>{{ $item->created_at->locale('id_ID')->isoFormat('LL')}}</span>
                </li>
                @endforeach
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


@push('scripts')
<script>
    $(document).ready(main);

    function main() {
        $('#btn-download').on('click', (e) => {
            e.preventDefault();
            window.print();
        });
    }
</script>
@endpush
