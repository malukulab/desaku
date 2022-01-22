@extends('layouts.admin')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4>Ubah Logo Aplikasi </h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Pengaturan</a></li>
                <li class="breadcrumb-item active">Ubah Logo</li>
            </ol>
        </div>
    </div>
</div>
<!-- end page title -->

<div>
    <div class="card">
        <div class="card-body">

            <div class="row">
                <div class="col-sm-12 col-md-5">
                    <h4 class="card-title">Ubah Logo Aplikasi</h4>
                    <p class="card-title-desc">Ubah dan sesuaikan logo aplikasi</p>
                    <form action="{{ route('admin.settings.logo.update') }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="">Ubah logo</label>
                            <div class="input-group mb-3">
                                <input type="file" name="logo" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">
                                Simpan perubahan
                            </button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-12 col-md-5 offset-md-1">
                    <img src="{{ asset('storage/'.$logo->data['path']) }}" class="img-fluid rounded mx-auto d-block" alt="...">
                </div>
            </div>
        </div>

    </div>
</div>
@endsection



