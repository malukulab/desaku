@extends('layouts.admin')

@section('head')
<link href="{{ asset('vendor/lexa-admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<style>
    .picture {
        height: 100px;
        width: 150px;
        object-fit: cover;
        border-radius: 3px;
    }
</style>
@endsection

@section('script')
<script src="{{ asset('vendor/lexa-admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/lexa-admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
@endsection


@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4>Informasi Aparatur Desa</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                <li class="breadcrumb-item">Tentang Desa</li>
                <li class="breadcrumb-item active">Aparatur Desa</li>
            </ol>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-start">
                    <div>
                        <h4 class="card-title">Semua Data Aparatur</h4>
                        <p class="card-title-desc">
                            Semua informasi Aparatur yang pernah diterbitkan, dan memiliki {{ $apparatus->count() }} aparatur.
                        </p>
                    </div>
                    <a class="btn btn-primary" href="{{ route('admin.apparatus.create') }}">Tambahkan aparatur desa</a>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Pendidikan</th>
                                <th>Jenis kelamin</th>
                                <th>Jabatan</th>
                                <th>Ditambahkan pada</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($apparatus as $item)
                            <tr data-id="1">
                                <td data-field="id" style="width: 80px">
                                    {{ $loop->iteration }}.
                                </td>
                                <td data-field="image">
                                    @if (is_null($item->picture))
                                    <img class="picture" src="{{ asset('img/placeholder.png') }}" alt="">
                                    @else
                                    <img class="picture" src="{{ asset('storage/'. $item->picture) }}" alt="">
                                    @endif
                                </td>
                                <td data-field="name">
                                    <strong>{{ $item->name }}</strong>
                                    <span class="d-block text-secondary mt-1">
                                        {{ $item->nip }}
                                    </span>
                                </td>
                                <td data-field="education">
                                    <strong></strong>
                                    <span class="d-block text-secondary mt-1">
                                        {{ $item->education }}
                                    </span>
                                </td>
                                <td data-field="gender">
                                    <strong></strong>
                                    <span class="d-block text-secondary mt-1">
                                        {{ $item->gender }}
                                    </span>
                                </td>
                                <td data-field="jabatan">
                                    <strong></strong>
                                    <span class="d-block text-secondary mt-1">
                                        {{ $item->job_position }}
                                    </span>
                                </td>
                                <td data-field="date">
                                    <span class="d-block text-secondary mt-1">
                                        {{ $item->created_at->locale('id_ID')->isoFormat('LLL') }}
                                    </span>
                                </td>

                                <td style="width: 100px">
                                    <a href="{{ route('admin.apparatus.edit', $item->id) }}" class="btn btn-outline-secondary edit" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('admin.apparatus.destroy', $item->id) }}" method="POST" class="d-inline-block">
                                        @method('DELETE')
                                        @csrf
                                        <button onclick="return confirm('Yakin ingin menghapus ini?')" class="btn btn-outline-danger edit" title="Hapus">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td>
                                    Data aparatur tidak ditemukan.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>


            </div>
        </div>
    </div> <!-- end col -->

</div> <!-- end row -->
@endsection
