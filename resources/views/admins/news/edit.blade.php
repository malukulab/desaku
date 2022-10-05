@extends('layouts.admin')


@section('head')
<link href="{{ asset('vendor/lexa-admin/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
<style>
    .preview img {
        width: 270px;
        height: 180px;
        object-fit: cover;
        margin: 1rem 0;
    }
</style>
@endsection


@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4>Ubah Informasi Berita</h4>
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

                <h4 class="card-title">Ubah Informasi Berita</h4>
                <p class="card-title-desc">
                    Perlu memperbaiki informasi berita?
                </p>
                <form method="POST" action="{{ route('admin.news.update', $news->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="form-group mb-4">
                                <label for="input-title">
                                    Judul
                                </label>
                                <div>
                                    <input value="{{ $news->title }}" class="form-control" placeholder="Masukan judul berita.." type="text" name="title" id="input-title">
                                    @error('title')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="editor">
                                    Konten
                                </label>
                                <div>
                                    <textarea id="editor" name="content">{{ $news->content }}</textarea>
                                    @error('content')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="file">
                                    Kategori
                                </label>
                                <select name="categories[]"  multiple="multiple" class="form-control select2 select2-multiple">
                                    @foreach ( $news->categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                    @endforeach

                                </select>
                                @error('categories')
                                <span class="text-danger d-inline-block mt-2">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-4">
                                <label for="input-file">
                                    Upload cover
                                </label>
                                <input class="form-control" type="file" id="input-file" name="cover">

                                @if ($news->attachments->count() > 0)
                                <div class="preview">
                                    <img src="{{ asset('storage/'. $news->attachments[0]->path) }}" alt="Gambar" />
                                </div>
                                @endif
                                @error('cover')
                                <span class="text-danger d-inline-block mt-2">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary">Simpan perubahan</button>
                                <button type="reset" class="btn btn-warning">Batal</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->

</div> <!-- end row -->
@endsection


@section('script')
<script src="{{ asset('vendor/lexa-admin/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('vendor/lexa-admin/libs/tinymce/tinymce.min.js') }}"></script>
<script>
    $(document).ready(function () {
        tinymce.init({
            selector: 'textarea#editor',
            height: 400,
            plugins: 'image,media',
            width: '100%'
        });

        $('.select2').select2({
            placeholder: 'Pilih kategori yang cocok!'
        });
    });
</script>
@endsection
