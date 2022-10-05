@extends('layouts.app')


@section('script')
<script src="{{ asset('vendor/lexa-admin/libs/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('vendor/lexa-admin/libs/datatables.net-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });
</script>
@endsection

@section('head')
<link href="{{ asset('vendor/lexa-admin/libs/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />

<style>
    .page-title .page-title-heading, .page-title .breadcrumbs {
        float: none !important;
    }
    .page-title .breadcrumbs {
        margin-top: .3rem;
    }
</style>

@endsection


@section('content')
<div class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="page-title-heading">
                    <h1 class="h1-title">Kumpulan Berkas</h1>
                </div><!-- /.page-title-heading -->
                <ul class="breadcrumbs">
                    <li><a href="#" title="">Beranda<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="">Galeri<i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
                    <li><a href="#" title="">Kumpulan Berkas</a></li>
                </ul><!-- /.breadcrumbs -->
                <div class="clearfix"></div><!-- /.clearfix -->
            </div>
        </div>
    </div>
</div><!-- /.page-title -->

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive" style="margin: 1.5rem 0;">
                <table class="table" id="datatable">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Berkas</td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($files as $file)
                        <tr>
                            <td width="100">{{ $loop->iteration }}.</td>
                            <td>
                                <div style="margin: .5rem 0;">
                                    <p style="margin-bottom: .5rem;">{{ str($file->data['name'])->title()->limit(120) }}</p>
                                    <a target="popup" onclick="window.open('{{ asset('storage/'. $file->data['path']) }}',' popup','width=600,height=600,scrollbars=no,resizable=no'); return false;"><i class="fa fa-eye" style="display: inline-block; margin-right: .5rem;"></i>Lihat berkas</a> | <a download href="{{ asset('storage/'. $file->data['path']) }}"><i class="fa fa-download" style="display: inline-block; margin-right: .5rem;"></i>Download</a>
                                </div>
                                <div>
                                    {{ $file->created_at->locale('id-ID')->isoFormat('LLL') }}
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                {{ $files->links('pagination::bootstrap-4-finance') }}
            </div>
        </div>
    </div>
</div>
@endsection
