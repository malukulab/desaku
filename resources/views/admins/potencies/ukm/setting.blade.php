@extends('layouts.admin')




@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4>Ubah Pesan Halaman</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                <li class="breadcrumb-item">Tentang Desa</li>
                <li class="breadcrumb-item">Potensi</li>
                <li class="breadcrumb-item">UKM</li>
                <li class="breadcrumb-item">Pengaturan</li>
                <li class="breadcrumb-item active">Ubah Pesan</li>
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
                        <h4 class="card-title">Ubah pesan</h4>
                        <p class="card-title-desc">Tambahkan dan sesuaikan pesan dan kesan pada halaman UKM</p>
                        <form action="{{ route('admin.settings.ukm.update') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group mb-3">
                                <label for="">Judul</label>
                                <input type="text" class="form-control" name="title" value="{{ $product->data['title'] ?? '' }}">
                                @error('title')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Deskripsi</label>
                                <textarea name="content" class="form-control mb-4" rows="8">{{ $product->data['content'] ?? '' }}</textarea>
                                @error('content')
                                <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">
                                    Simpan perubahan
                                </button>
                                <a href="{{ route('admin.ukm.index') }}" class="btn btn-secondary">
                                    Kembali
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection
