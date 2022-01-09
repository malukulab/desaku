@extends('layouts.admin')


@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4>Informasi Berita</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                <li class="breadcrumb-item active">Informasi Berita</li>
            </ol>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Semua Informasi Berita</h4>
                <p class="card-title-desc">
                    Semua informasi berita yang pernah diterbitkan, dan memiliki 78 berita.
                </p>

                <div class="table-responsive">
                    <table class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($news as $item)
                            <tr data-id="1">
                                <td data-field="id" style="width: 80px">
                                    {{ $loop->iteration }}.
                                </td>
                                <td data-field="name">
                                    <strong>{{ str($item->title)->limit(200) }}</strong>
                                    <span class="d-block text-secondary mt-1">
                                        {{ $item->created_at->locale('id_ID')->isoFormat('LLL') }}
                                    </span>
                                </td>
                                <td style="width: 100px">
                                    <a href="{{ route('admin.news.edit', $item->id) }}" class="btn btn-outline-secondary edit" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('admin.news.destroy', $item->id) }}" method="POST" class="d-inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Yakin ingin menghapus ini?')" class="btn btn-outline-danger edit" title="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>
                                    Informasi berita yang di inginkan tidak ditemukan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                {{ $news->links('pagination::bootstrap-4') }}

            </div>
        </div>
    </div> <!-- end col -->

</div> <!-- end row -->
@endsection
