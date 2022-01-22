@extends('layouts.admin')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4>Tambahakn Banner Gambar Aplikasi </h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Pengaturan</a></li>
                <li class="breadcrumb-item active">Banner Gambar</li>
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
                    <h4 class="card-title">Tambahkan banner</h4>
                    <p class="card-title-desc">Tambahkan dan sesuaikan banner aplikasi</p>
                    <form action="{{ route('admin.settings.carousell.store') }}" method="POST" enctype="multipart/form-data">
                        @method('POST')
                        @csrf
                        <div class="form-group">
                            <label for="">Upload gambar</label>
                            <div class="input-group mb-3">
                                <input type="file" name="image" class="form-control" id="inputGroupFile03" aria-describedby="inputGroupFileAddon03" aria-label="Upload">
                            </div>
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
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-12">
                    <h4 class="card-title">Semua Banner Gambar</h4>
                    <div class="table-rep-plugin mt-4">
                        <div class="table-responsive mb-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table  table-striped">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Alamat gambar</th>
                                        <th>Waktu pubilsh gambar</th>
                                        <th>Tindakan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($carousell as $carousel)
                                    <tr>
                                        <td>{{ $loop->iteration }}.</td>
                                        <td>
                                            <a href="{{ '/storage/'.$carousel->data['image'] }}" target="__blank">Lihar gambar</a>
                                        </td>
                                        <td>{{ $carousel->created_at->locale('id_ID')->isoFormat('LLL') }}</td>
                                        <td>
                                            <form action="{{ route('admin.settings.carousell.destroy', $carousel->id) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger">
                                                    Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="4" class="text-center">
                                            Banner tidak tersedia
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



