div@extends('layouts.admin')


@section('head')
<style>
    .image-cover {
        height: 300px;
        width: 400px;
        border-radius: 4px;
        margin: 1rem 0;
        display: block;
    }
</style>
@endsection
@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4>Ubah Banner Gambar Aplikasi </h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Pengaturan</a></li>
                <li class="breadcrumb-item active">Banner Gambar</li>
            </ol>
        </div>
    </div>
</div>
<!-- end page title -->


<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-sm-12 col-md-5">
                <h4 class="card-title">Ubah banner</h4>
                <p class="card-title-desc">Ubah dan sesuaikan banner aplikasi</p>
                <form action="{{ route('admin.settings.carousels.update', $carousel->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="">Judul</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="title" value="{{ $carousel->data['title'] }}">
                        </div>
                        @error('title')
                            <p class="d-block text-danger my-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Konten</label>
                        <div class="input-group mb-3">
                            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ $carousel->data['description'] }}</textarea>
                        </div>
                        @error('description')
                            <p class="d-block text-danger my-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Upload gambar</label>
                        <div class="input-group mb-3">
                            <input type="file" accept="image/png,image/jpg,image/jpeg" name="image" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                        </div>
                        @error('image')
                            <p class="d-block text-danger my-2">
                                {{ $message }}
                            </p>
                        @enderror
                        <img class="image-cover" src="{{ asset('storage/'. $carousel->data['image']) }}" alt="">
                    </div>
                    <div class="form-group">
                        <a href="{{ route('admin.settings.carousels.index') }}" class="btn btn-warning">
                            Kembali
                        </a>
                        <button class="btn btn-primary">
                            Simpan perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection



