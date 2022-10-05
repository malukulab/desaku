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
            <h4>Ubah Informasi Produk UKM</h4>
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

                <h4 class="card-title">Produk UKM</h4>
                <p class="card-title-desc">
                    Ubah dan terbitkan informasi produk UKM Anda
                </p>
                <form method="POST" action="{{ route('admin.ukm.update', $product->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="form-group mb-4">
                                <label for="input-title">
                                    Judul
                                </label>
                                <div>
                                    <input value="{{ $product->title }}" class="form-control" placeholder="Masukan judul berita.." type="text" name="title" id="input-title">
                                    @error('title')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="input-price">
                                    Harga
                                </label>
                                <div>
                                    <input value="{{ $product->price }}" class="form-control" placeholder="Masukan jumlah harga produk" type="number" name="price" id="input-price">
                                    @error('price')
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
                                    <textarea id="editor" name="content">{{ $product->content }}</textarea>
                                    @error('content')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <hr/>

                            <div class="form-group mb-4">
                                <label for="input-owner">
                                    Nama pelapak
                                </label>
                                <div>
                                    <input value="{{ $product->owner }}" class="form-control" placeholder="Masukan nama pelapak" type="text" name="owner" id="input-owner">
                                    @error('owner')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="input-owner_contact">
                                    Kontak telepon pelapak
                                </label>
                                <div>
                                    <input value="{{ $product->owner_contact }}" class="form-control" placeholder="Masukan nomor pelapak" type="number" name="owner_contact" id="input-owner_contact">
                                    @error('owner_contact')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="input-owner_wacontact">
                                    Kontak WA pelapak <i>(Opsional)</i>
                                </label>
                                <div>
                                    <input value="{{ $product->owner_wacontact }}" class="form-control" placeholder="Masukan nomor WA pelapak" type="number" name="owner_wacontact" id="input-owner_wacontact">
                                    @error('owner_wacontact')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="input-owner_contact">
                                    Pilih lokasi pelapak
                                </label>
                                <div>
                                    <input type="hidden" value="{{ $product->lat }}" name="lat" id="input-lat" readonly required>
                                    <input type="hidden" value="{{ $product->long }}" name="long" id="input-long" readonly required>
                                    <div id="map"></div>
                                    @error('lat', 'long')
                                    <span class="text-danger d-inline-block mt-2">
                                        Lokasi pelapak wajib dimasukan
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <hr/>
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

                            <div class="form-group mb-5">
                                <button class="btn btn-primary">Simpan perubahan</button>
                                <a href="{{ route('admin.tours.index') }}" class="btn btn-warning">Kembali</a>
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
    });

    const initialFiles = {!! json_encode($product?->attachments) !!}
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
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
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
        }
    });

    function initMap() {
        const initialLatLng = {
            lat: -3.588795426969286,
            lng: 128.09867511056757
        };
        const [inputLat, inputLng] = $('input#input-lat, input#input-long');
        if (
            inputLat.value.trim().length > 0
            && inputLng.value.trim().length > 0
        ) {
            initialLatLng.lat = inputLat.value;
            initialLatLng.lng = inputLng.value;
        }


        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 17,
            center: initialLatLng,
        });
        const marker = new google.maps.Marker({
            position: initialLatLng,
            map: map,
        });

        const infowindow = new google.maps.InfoWindow({
            content: 'Beneran lokasi pelapaknya disekitar sini?',
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
