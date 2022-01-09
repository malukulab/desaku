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
            <h4>Informasi Produk UKM</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                <li class="breadcrumb-item active">Produk UKM</li>
            </ol>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Semua Produk UKM</h4>
                <p class="card-title-desc">
                    Semua informasi produk UKM yang pernah diterbitkan, dan memiliki {{ $products->count() }} produk.
                </p>

                <div class="table-responsive">
                    <table id="datatable" class="table table-editable table-nowrap align-middle table-edits">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Harga</th>
                                <th>Pelapak</th>
                                <th>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($products as $product)
                            <tr data-id="1">
                                <td data-field="id" style="width: 80px">
                                    {{ $loop->iteration }}.
                                </td>
                                <td data-field="name">
                                    <strong>{{ str($product->title)->limit(200) }}</strong>
                                    <span class="d-block text-secondary mt-1">
                                        {{ $product->created_at->locale('id_ID')->isoFormat('LLL') }}
                                    </span>
                                </td>
                                <td data-field="price">
                                    Rp {{ number_format($product->price, 2, ',', '.') }}
                                </td>
                                <td data-field="owner">
                                    {{ $product->owner }}
                                </td>

                                <td style="width: 100px">
                                    <a href="{{ route('admin.ukm.edit', $product->id) }}" class="btn btn-outline-secondary edit" title="Edit">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('admin.ukm.destroy', $product->id) }}" method="POST" class="d-inline-block">
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
                                    Produk yang di inginkan tidak ditemukan.
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
