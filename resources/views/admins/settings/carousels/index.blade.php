@extends('layouts.admin')

@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4>Semua Banner Gambar Aplikasi </h4>
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
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 class="card-title">Semua Banner Gambar</h4>
                    <a href="{{ route('admin.settings.carousels.create') }}" class="btn btn-primary">
                        Tambahkan
                    </a>
                </div>
                <div class="table-rep-plugin mt-4">
                    <div class="table-responsive mb-0" data-pattern="priority-columns">
                        <table id="tech-companies-1" class="table  table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Heading</th>
                                    <th>Alamat gambar</th>
                                    <th>Waktu pubilsh gambar</th>
                                    <th>Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($carousell as $carousel)
                                <tr>
                                    <td>{{ $loop->iteration }}.</td>
                                    <td width="500">
                                        <h5>{{ str($carousel->data['title'])->limit(100) }}</h5>
                                        <p>{{ $carousel->data['description'] }}</p>
                                    </td>
                                    <td>
                                        <a href="{{ '/storage/'.$carousel->data['image'] }}" target="__blank">Lihar gambar</a>
                                    </td>
                                    <td>{{ $carousel->created_at->locale('id_ID')->isoFormat('LLL') }}</td>
                                    <td class="d-flex justify-content-end">
                                        <a href="{{ route('admin.settings.carousels.edit', $carousel->id) }}" class="btn btn-secondary" style="margin-right: .4rem;">
                                            Ubah
                                        </a>
                                        <form action="{{ route('admin.settings.carousels.destroy', $carousel->id) }}" method="POST">
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

@endsection



