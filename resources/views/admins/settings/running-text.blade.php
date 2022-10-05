@extends('layouts.admin')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4>Atur Pesan Running Text</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Pengaturan</a></li>
                <li class="breadcrumb-item active">Running Text</li>
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
                    <h4 class="card-title">Atur Pesan</h4>
                    <p class="card-title-desc">Ubah dan sesuaikan pesan running text aplikasi</p>
                    <form action="{{ route('admin.settings.running-text.update') }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="">Pesan running text</label>
                            <div class="input-group mb-3">
                                <textarea name="content" class="form-control" id="" cols="30" rows="10">{{ $text?->data['content'] }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary">
                                Simpan perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection



