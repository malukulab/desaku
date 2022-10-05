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
            <h4>Dokumentasi Negri Hila</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                <li class="breadcrumb-item">Galeri</li>
                <li class="breadcrumb-item active">Dokumentasi</li>
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
                        <h4 class="card-title">Semua Dokumentasi Negeri Hila</h4>
                        <p class="card-title-desc">
                            Semua dokumentasi negeri Hila yang pernah diterbitkan, dan memiliki {{ $documentations->count() }} dokumentasi
                        </p>
                    </div>
                    <a class="btn btn-primary" href="{{ route('admin.documentation.create') }}">Tambahkan dokumentasi</a>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama dokumentasi</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($documentations as $documentation)
                            <tr data-id="1">
                                <td data-field="id" style="width: 80px">
                                    {{ $loop->iteration }}.
                                </td>
                                <td data-field="name">
                                    <strong>{{ str($documentation->title)->limit(200) }}</strong>
                                    <span class="d-block text-secondary mt-1">
                                        {{ $documentation->created_at->locale('id_ID')->isoFormat('LLL') }}
                                    </span>
                                </td>

                                <td style="width: 100px">
                                    <a href="{{ route('admin.documentation.edit', $documentation->id) }}" class="btn btn-outline-secondary edit" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('admin.documentation.destroy', $documentation->id) }}" method="POST" class="d-inline-block">
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
                                    Data Dokumentasi yang di inginkan tidak ditemukan.
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
