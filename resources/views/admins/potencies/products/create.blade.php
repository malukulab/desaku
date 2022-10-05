@extends('layouts.admin')


@section('head')
<link rel="stylesheet" href="https://unpkg.com/filepond/dist/filepond.min.css">
<style>
#map {
    width: 100%;
    border-radius: 5px;
    height: 400px;
    margin-bottom: .7rem;
}
.lat-lng-text {
    display: none;
}
</style>
@endsection


@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4>Tambahkan Informasi Produk Unggulan</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                <li class="breadcrumb-item active">Produk Unggulan</li>
            </ol>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Produk Unggulan</h4>
                <p class="card-title-desc">
                    Tambahkan dan terbitkan informasi produk unggulan baru Anda
                </p>
                <form method="POST" action="{{ route('admin.products.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="form-group mb-4">
                                <label for="input-title">
                                    Judul
                                </label>
                                <div>
                                    <input value="{{ old('title') }}" class="form-control" placeholder="Masukan nama produk.." type="text" name="title" id="input-title">
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
                                    <input value="{{ old('price') }}" class="form-control" placeholder="Masukan jumlah harga produk" type="number" name="price" id="input-price">
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
                                    <textarea id="editor" name="content">{{ old('content') }}</textarea>
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
                                    <input value="{{ old('owner') }}" class="form-control" placeholder="Masukan nama pelapak" type="text" name="owner" id="input-owner">
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
                                    <div class="input-group">
                                        <div class="input-group-text">+62</div>

                                        <input value="{{ old('owner_contact') }}" class="form-control" placeholder="Masukan nomor pelapak" type="number" name="owner_contact" id="input-owner_contact">
                                      </div>
                                    @error('owner_contact')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="input-owner_wacontact">
                                    Kontak WA pelapak
                                </label>
                                <div>
                                    <div class="input-group">
                                        <div class="input-group-text">+62</div>

                                        <input value="{{ old('owner_wacontact') }}" class="form-control" placeholder="Masukan nomor pelapak" type="number" name="owner_wacontact" id="input-owner_wacontact">
                                      </div>
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

                                    <div id="map"></div>
                                    @if ($errors->has('lat') && $errors->has('long'))
                                    <span class="text-danger d-inline-block mt-2">
                                        Lokasi pelapak wajib dimasukan
                                    </span>
                                    <br/>
                                    @endif

                                    <input type="hidden" class="form-control" name="lat" id="input-lat" readonly required>
                                    <input type="hidden" class="form-control" name="long" id="input-long" readonly required>
                                    <p class="lat-lng-text">Keterangan: Lattitude <span id="lat-text"></span>, Longotude <span id="lng-text"></span> </p>
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
                                <button class="btn btn-primary">Simpan</button>
                                <a href="{{ route('admin.products.index') }}" class="btn btn-warning">Kembali</a>
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
            content: 'Beneran lokasi pelapaknya disekitar sini?',
        });

        infowindow.open({ map, anchor: marker });

        map.addListener('click', (event) => {
            const {lat, lng} = event.latLng
            $('input#input-lat').val(lat);
            $('input#input-long').val(lng);

            $('span#lat-text').text(lat);
            $('span#lng-text').text(lng);
            $('.lat-lng-text').show();


            infowindow.open({ map, anchor: marker });
            marker.setPosition(event.latLng);
        });
    }

</script>
@endsection
