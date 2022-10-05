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
            <h4>Ubah Dokumentasi Negri Hila</h4>
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

                <h4 class="card-title">Dokumentasi Negeri Hila</h4>
                <p class="card-title-desc">
                    Ubah dan terbitkan dokumentasi negeri Hila Anda
                </p>
                <form method="POST" action="{{ route('admin.documentations.update', $documentation->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="form-group mb-4">
                                <label for="input-title">
                                    Nama dokumentasi
                                </label>
                                <div>
                                    <input value="{{ $documentation->title }}" class="form-control" placeholder="Masukan nama dokumentasi.." type="text" name="title" id="input-title">
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
                                    <textarea id="editor" name="content">{{ $documentation->content }}</textarea>
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
                                <button class="btn btn-primary">Simpan</button>
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

    const initialFiles = {!! json_encode($documentation?->attachments) !!}
    const files = initialFiles.map(file => {
        return {
            source: file.id,
            options: {
                type: 'local',
                file: {
                    name: file.original_filename,
                    type: file.content_type,
                    size: file.size
                }
            }
        }
    });

    // First register any plugins
    $.fn.filepond.registerPlugin(
        FilePondPluginFileValidateSize,
        FilePondPluginFileValidateType
    );

    $('.attachments').filepond({
        files,
        allowMultiple: true,
        instantUpload: true,
        maxFileSize: '1MB',
        maxFiles: 3,
        acceptedFileTypes: ['image/png', 'image/jpg', 'image/jpeg'],
        labelIdle: 'Jatuhkan file atau <strong>klik</strong> untuk memilih.',
        acceptedFileTypes: ['image/jpg', 'image/png', 'image/jpeg'],
        fileValidateTypeLabelExpectedTypes: 'File memiliki format yang tidak diperbolehkan',
        server: {
            url: window.location.origin + '/admin/uploaders',
            revert: (source, load, error) => {
                const url = window.location.origin + '/admin/uploaders/' + source;
                const token = $('meta[name="csrf-token"]').attr('content');
                $.ajax({
                    url,
                    method: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN' : token
                    },
                    success: () => {
                        console.log('hello world');
                    },
                    error: () => {
                        console.warn('Error: revert file not successfully.');
                    }
                })

                load();
            },
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        }
    });

</script>
@endsection
