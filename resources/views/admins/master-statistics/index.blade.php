@extends('layouts.admin')

@section('head')
<link href="{{ asset('vendor/lexa-admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
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
@php
$grafis = [];
@endphp

<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4>Master Statistik</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                <li class="breadcrumb-item active">Master Statistik</li>
            </ol>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Semua Informasi Grafis</h4>
                <div class="table-responsive">
                    <table id="datatable" class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Jenis data statistik</th>
                                <th>Judul menu</th>
                                <th>Tindahkan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($statistics as $item)
                            <tr data-id="1">
                                <td data-field="id" style="width: 80px">
                                    {{ $loop->iteration }}.
                                </td>
                                <td data-field="name">
                                    <p>{{ str($item->type)->title() }}</p>
                                    <span class="d-block text-secondary mt-1">
                                        {{ $item->created_at?->locale('id_ID')->isoFormat('LLL') }}
                                    </span>
                                </td>
                                <td id="data-id2">
                                    {{ strtoupper($item->title) }}
                                </td>

                                <td style="width: 100px">
                                    <a href="{{ route('admin.master-statistics.show', $item->id) }}" class="btn btn-primary">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="{{ route('admin.master-statistics.edit', $item->id) }}" class="btn btn-secondary">
                                        <i class="fas fa-pen"></i>
                                    </a>
                                    <form action="{{ route('admin.master-statistics.destroy', $item->id) }}" method="POST" class="d-inline-block">
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
                                    Master data statistik yang di inginkan tidak ditemukan.
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
