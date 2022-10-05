@extends('layouts.admin')


@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4>Tambahkan Informasi nilai {{ str($master->type)->title()  }}</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Master Statistik</a></li>
                <li class="breadcrumb-item active">{{ str($master->type)->title() }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Informasi Statistik</h4>
                <p class="card-title-desc">
                    Tambahkan dan terbitkan informasi nilai statistik
                </p>
                <form method="POST" action="{{ route('admin.statistics.store', $master->id) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="form-group mb-4">
                                <label for="input-item">
                                    Nama item
                                </label>
                                <div>
                                    <input value="{{ old('item') }}" class="form-control" placeholder="Masukan nama item.." type="text" name="item" id="input-item">
                                    @error('item')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="input-amount">
                                    Jumlah / Nilai
                                </label>
                                <div>
                                    <input value="{{ old('amount') }}" class="form-control" placeholder="Masukan jumlah / nilai" type="number" name="amount" id="input-amount">
                                    @error('amount')
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
                                    <textarea id="editor" class="form-control" rows="8" name="desc">{{ old('desc') }}</textarea>
                                    @error('desc')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary">Simpan</button>
                                <a href="{{ route('admin.master-statistics.show', $master->id) }}" class="btn btn-warning">Kembali</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->

</div> <!-- end row -->
@endsection
