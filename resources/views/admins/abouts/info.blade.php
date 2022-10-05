@extends('layouts.admin')



@section('script')
<script src="{{ asset('vendor/lexa-admin/libs/tinymce/tinymce.min.js') }}"></script>
<script>
    $(document).ready(function () {
        tinymce.init({
            selector: 'textarea',
            plugins: 'image,media',
            height: 200,
            width: '100%',
        });
    });
</script>
@endsection


@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4>Informasi Desa</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                <li class="breadcrumb-item">Tentang Desa</li>
                <li class="breadcrumb-item active">Informasi Desa</li>
            </ol>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-10 offset-md-1">
                        <form action="{{ route('admin.about.info.update') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group mb-4">
                                <label for="editor">Motto</label>
                                <textarea id="editor" name="motto" class="form-control">{{ $info->data['motto'] }}</textarea>
                            </div>

                            <div class="form-group mb-4">
                                <label for="editor">Visi</label>
                                <textarea id="editor" name="visi" class="form-control">{{ $info->data['visi'] }}</textarea>
                            </div>

                            <div class="form-group mb-4">
                                <label for="editor">Misi</label>
                                <textarea id="editor" name="misi" class="form-control">{{ $info->data['misi'] }}</textarea>
                            </div>


                            <div class="form-group mt-4">
                                <button class="btn btn-primary">Simpan perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->

</div> <!-- end row -->
@endsection
