@extends('layouts.admin')


@section('head')
<link href="{{ asset('vendor/lexa-admin/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />
@endsection


@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4>Tambahkan Informasi Berita</h4>
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

                <h4 class="card-title">Informasi Berita</h4>
                <p class="card-title-desc">
                    Tambahkan dan terbitkan informasi berita
                </p>
                <form method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="form-group mb-4">
                                <label for="input-title">
                                    Judul
                                </label>
                                <div>
                                    <input value="{{ old('title') }}" class="form-control" placeholder="Masukan judul berita.." type="text" name="title" id="input-title">
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
                                    <textarea id="editor" name="content">{{ old('content') }}</textarea>
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
                                    @foreach ( $categories as $category)
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
                                @error('cover')
                                <span class="text-danger d-inline-block mt-2">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary">Tambahkan</button>
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
            width: '100%'
        });

        $('.select2').select2({
            placeholder: 'Pilih kategori yang cocok!'
        });
    });
</script>
@endsection
