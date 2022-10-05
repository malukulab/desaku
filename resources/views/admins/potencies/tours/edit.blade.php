@extends('layouts.admin')


@section('head')
<link rel="stylesheet" href="https://unpkg.com/filepond/dist/filepond.min.css">
<script defer src="https://unpkg.com/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>
<script defer src="https://unpkg.com/@yaireo/tagify"></script>
<link href="https://unpkg.com/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
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
            <h4>Ubah Informasi Wisata</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                <li class="breadcrumb-item"><a href="javascript: void(0);">Potensi</a></li>
                <li class="breadcrumb-item active">Wisata</li>
            </ol>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Wisata Negeri Hila</h4>
                <p class="card-title-desc">
                    Ubah dan terbitkan informasi wisata negeri Hila Anda
                </p>
                <form method="POST" action="{{ route('admin.tours.update', $tour->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="form-group mb-4">
                                <label for="input-title">
                                    Nama wisata
                                </label>
                                <div>
                                    <input value="{{ $tour->title }}" class="form-control" placeholder="Masukan nama produk.." type="text" name="title" id="input-title">
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
                                    <textarea id="editor" name="content">{{ $tour->content }}</textarea>
                                    @error('content')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="editor">
                                    Nomor telepon pengelolah wisata
                                </label>
                                <div>
                                    <input value="{{ $tour->owner_contact }}" type="number" class="form-control" name="owner_contact">
                                    @error('owner_contact')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="editor">
                                    Nomor WA pengelolah wisata (Opsional)
                                </label>
                                <div>
                                    <input value="{{ $tour->owner_wacontact }}" type="number" class="form-control" name="owner_wacontact">
                                    @error('owner_wacontact')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <hr/>
                            <div class="form-group mb-4">
                                <label for="input-owner_contact">
                                    Pilih lokasi wisata
                                </label>
                                <div>
                                    <input type="hidden" value="{{ $tour->lat }}" name="lat" id="input-lat" readonly required>
                                    <input type="hidden" value="{{ $tour->long }}" name="long" id="input-long" readonly required>
                                    <div id="map"></div>
                                    @if ($errors->has('lat') && $errors->has('long'))
                                    <span class="text-danger d-inline-block mt-2">
                                        Lokasi pelapak wajib dimasukan
                                    </span>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="input-owner_contact">
                                    Lampirkan link embedded youtube (Opsional)
                                 </label>
                                <div>
                                    <input type="text" value="{{ $tour->embedded_youtube }}" id="tagify" name="embedded_youtube" />
                                    @error('embedded_youtube')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="input-owner_contact">
                                    Upload berkas
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
                            <div>

                            </div>

                            <div class="form-group mb-5">
                                <button class="btn btn-primary">Simpan perubahan</button>
                                <button type="reset" class="btn btn-warning">Batal</button>
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


<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARYEz8TNM57EYfk70vT_iuhmhkHIMVgZ4&callback=initMap"></script>
<script>
    $(document).ready(function () {
        tinymce.init({
            selector: 'textarea#editor',
            height: 400,
            width: '100%',

        });

        new Tagify(
            document.getElementById('tagify')
        );
    });

    const initialFiles = {!! json_encode($tour?->attachments) !!}
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

    function initMap() {
        const intialLatLng = {
            lat: -3.588795426969286,
            lng: 128.09867511056757
        };
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 17,
            center: intialLatLng,
        });
        const marker = new google.maps.Marker({
            position: intialLatLng,
            map: map,
        });

        const infowindow = new google.maps.InfoWindow({
            content: 'Beneran lokasi wisatanya disekitar sini?',
        });

        infowindow.open({ map, anchor: marker });

        map.addListener('click', (event) => {
            const {lat, lng} = event.latLng
            $('input#input-lat').val(lat);
            $('input#input-long').val(lng);

            infowindow.open({ map, anchor: marker });
            marker.setPosition(event.latLng);
        });
    }

</script>
@endsection
