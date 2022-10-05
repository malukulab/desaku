@extends('layouts.admin')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4>Tambahkan Banner Gambar Aplikasi </h4>
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
                <h4 class="card-title">Tambahkan banner</h4>
                <p class="card-title-desc">Tambahkan dan sesuaikan banner aplikasi</p>
                <form action="{{ route('admin.settings.carousels.store') }}" method="POST" enctype="multipart/form-data">
                    @method('POST')
                    @csrf
                    <div class="form-group">
                        <label for="">Judul</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="title" value="{{ old('title') }}">
                        </div>
                        @error('title')
                            <span class="d-block text-danger">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Konten</label>
                        <div class="input-group mb-3">
                            <textarea name="description" id="" cols="30" rows="10" class="form-control">{{ old('description') }}</textarea>
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
                            <input type="file" name="image" accept="image/png,image/jpg,image/jpeg" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                        </div>
                        @error('image')
                            <p class="d-block text-danger my-2">
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <a href="{{ route('admin.settings.carousels.index') }}" class="btn btn-warning">
                            Kembali
                        </a>
                        <button class="btn btn-primary">
                            Tambahkan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection



