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
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4>Informasi Kegiatan Negri Hila</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                <li class="breadcrumb-item">Galeri</li>
                <li class="breadcrumb-item active">Kegiatan</li>
            </ol>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Semua Kegiatan Negeri Hila</h4>
                <p class="card-title-desc">
                    Semua informasi kegiatan negeri Hila yang pernah diterbitkan, dan memiliki {{ $activities->count() }} budaya.
                </p>

                <div class="table-responsive">
                    <table id="datatable" class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama kegiatan</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($activities as $activity)
                            <tr data-id="1">
                                <td data-field="id" style="width: 80px">
                                    {{ $loop->iteration }}.
                                </td>
                                <td data-field="name">
                                    <strong>{{ str($activity->title)->limit(200) }}</strong>
                                    <span class="d-block text-secondary mt-1">
                                        {{ $activity->created_at->locale('id_ID')->isoFormat('LLL') }}
                                    </span>
                                </td>

                                <td style="width: 100px">
                                    <a href="{{ route('admin.activities.edit', $activity->id) }}" class="btn btn-outline-secondary edit" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('admin.activities.destroy', $activity->id) }}" method="POST" class="d-inline-block">
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
                                    Data kegiatan yang di inginkan tidak ditemukan.
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
