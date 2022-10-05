@extends('layouts.admin')




@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4>Kumpulan Berkas</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                <li class="breadcrumb-item">Galeri</li>
                <li class="breadcrumb-item active">Kumpulan Berkas</li>
            </ol>
        </div>
    </div>
</div>
<!-- end page title -->
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <h4 class="card-title">Tambahkan Berkas</h4>
                        <p class="card-title-desc">Tambahkan dan sesuaikan berkas</p>
                        <form action="{{ route('admin.file.store') }}" method="POST" enctype="multipart/form-data">
                            @method('POST')
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Masukan nama berkas</label>
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">
                                @error('name')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Upload</label>
                                <div class="input-group mb-3">
                                    <input type="file" name="file" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                                </div>
                                @error('file')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">
                                    Tambahkan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
