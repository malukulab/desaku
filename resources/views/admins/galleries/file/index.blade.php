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
            <h4>Kumpulan Berkas</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                <li class="breadcrumb-item">Galeri</li>
                <li class="breadcrumb-item active">Kumpulan Berkas</li>
            </ol>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center justify-content-between my-2">
                    <h4 class="card-title">Semua Berkas</h4>
                    <a href="{{ route('admin.file.create') }}" class="btn btn-primary">Tambahkan</a>
                </div>
                <div class="table-responsive">
                    <table id="datatable" class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Berkas</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($files as $file)
                            <tr data-id="1">
                                <td data-field="id" style="width: 80px">
                                    {{ $loop->iteration }}.
                                </td>
                                <td data-field="name">
                                    <p class="m-0 mb-2">
                                        {{ str($file->data['name'])->title()->limit(100) }}
                                    </p>
                                    <a href="{{ asset('storage/'. $file->data['path']) }}" target="__blank"><i class="fas fa-eye"></i><span style="display: inline-block; margin-left: .4rem;">Lihat berkas</span></a> | <a href="{{ asset('storage/'. $file->data['path']) }}" download><i class="fas fa-download"></i> <span style="display: inline-block; margin-left: .4rem;"> Download</a>
                                    <span class="d-block text-secondary mt-1">
                                        {{ $file->created_at->locale('id_ID')->isoFormat('LLL') }}
                                    </span>
                                </td>

                                <td style="width: 100px">
                                    <form action="{{ route('admin.file.destroy', $file->id) }}" method="POST" class="d-inline-block">
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
                                    Data berkas tidak tersedia.
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
