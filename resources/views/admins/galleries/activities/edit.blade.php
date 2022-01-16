@extends('layouts.admin')


@section('head')
<link rel="stylesheet" href="https://unpkg.com/filepond/dist/filepond.min.css">
<style>
#map {
    width: 100%;
    border-radius: 5px;
    height: 400px;
}
</style>
@endsection


@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4>Ubah Informasi Kegiatan</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Galeri</a></li>
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

                <h4 class="card-title">Budaya Negeri Hila</h4>
                <p class="card-title-desc">
                    Ubah dan terbitkan informasi kegiatan negeri Hila Anda
                </p>
                <form method="POST" action="{{ route('admin.activities.update', $activity->id)) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="form-group mb-4">
                                <label for="input-title">
                                    Nama kegiatan
                                </label>
                                <div>
                                    <input value="{{ $activity->title }}" class="form-control" placeholder="Masukan nama produk.." type="text" name="title" id="input-title">
                                    @error('title')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="editor">
                                    Konten
                                </label>
                                <div>
                                    <textarea id="editor" name="content">{{ $activity->content }}</textarea>
                                    @error('content')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <hr/>

                            <div class="form-group mb-4">
                                <label for="input-owner_contact">
                                    Upload gambar dan video
                                </label>
                                <div>
                                    <input type="file" class="attachments" name="attachments[]"/>
                                    @error('attachments')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>


                            <div class="form-group mb-5">
                                <button class="btn btn-primary">Simpan perubahan</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div> <!-- end col -->

</div> <!-- end row -->
@endsection


@section('script')
<script src="{{ asset('vendor/lexa-admin/libs/tinymce/tinymce.min.js') }}"></script>
<script src="https://unpkg.com/filepond/dist/filepond.min.js"></script>
<script src="https://unpkg.com/jquery-filepond/filepond.jquery.js"></script>
<!-- include FilePond plugins -->
<script src="https://unpkg.com/filepond-plugin-file-validate-type/dist/filepond-plugin-file-validate-type.min.js"></script>
<script src="https://unpkg.com/filepond-plugin-file-validate-size/dist/filepond-plugin-file-validate-size.min.js"></script>

<script>
    $(document).ready(function () {
        tinymce.init({
            selector: 'textarea#editor',
            height: 400,
            width: '100%',

        });


    });

    // First register any plugins
    $.fn.filepond.registerPlugin(
        FilePondPluginFileValidateSize,
        FilePondPluginFileValidateType
    );

    $('.attachments').filepond({
        allowMultiple: true,
        instantUpload: true,
        maxFileSize: '2MB',
        acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg', 'video/mp4'],
        labelIdle: 'Jatuhkan file atau <strong>klik</strong> untuk memilih.',
        acceptedFileTypes: ['image/jpg', 'image/png', 'video/mp4'],
        fileValidateTypeLabelExpectedTypes: 'File memiliki format yang tidak diperbolehkan',
        server: {
            url: window.location.origin + '/admin/uploaders',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }
    });

</script>
@endsection
