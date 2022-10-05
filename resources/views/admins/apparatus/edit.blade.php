@extends('layouts.admin')


@section('head')
<link href="{{ asset('vendor/lexa-admin/libs/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

<style>
    .picture {
        height: 230px;
        border-radius: 4px;
        width: 200px;
        margin: 1rem 0;
        object-fit: cover;
    }
</style>
@endsection


@section('content')
<!-- start page title -->
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4>Ubah Aparatur Desa</h4>
            <ol class="breadcrumb m-0">
                <li class="breadcrumb-item"><a href="javascript: void(0);">Beranda</a></li>
                <li class="breadcrumb-item">Tentang Desa</li>
                <li class="breadcrumb-item active">Aparatur Desa</li>
            </ol>
        </div>
    </div>
</div>
<!-- end page title -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Aparatur Desa</h4>
                <p class="card-title-desc">
                    Ubah dan terbitkan aparatur desa
                </p>
                <form method="POST" action="{{ route('admin.apparatus.update', $apparatus->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="form-group mb-4">
                                <label for="input-title">
                                    Nama
                                </label>
                                <div>
                                    <input value="{{ $apparatus->name }}" class="form-control" placeholder="Masukan nama.." type="text" name="name" id="input-title">
                                    @error('name')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="input-title">
                                    NIP
                                </label>
                                <div>
                                    <input value="{{ $apparatus->nip }}" class="form-control" placeholder="Masukan NIP.." type="text" name="nip" id="input-title">
                                    @error('nip')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="input-email">
                                    Alamat email
                                </label>
                                <div>
                                    <input value="{{ $apparatus->email }}" class="form-control" placeholder="Masukan Alamat email.." type="email" name="email" id="input-email">
                                    @error('email')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="input-title">
                                    Jenis kelamin
                                </label>
                                <div>
                                    <select name="gender" class="form-control select2">
                                        @foreach ($gender as $key => $value)

                                        <option {{ $apparatus->gender === $key ? 'selected' : '' }} value="{{ $key }}">{{ $value }}</option>

                                        @endforeach
                                    </select>
                                    @error('gender')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group mb-4">
                                <label for="input-title">
                                    Pendidikan Terakhir
                                </label>
                                <div>
                                    <select name="education" class="form-control select2">
                                        @foreach ($educations as $education)
                                        <option {{ $apparatus->education === $education ? 'selected'  : ''}} value="{{ $education }}">{{ $education }}</option>
                                        @endforeach
                                    </select>
                                    @error('education')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="input-title">
                                    Jabatan
                                </label>
                                <div>
                                    <input value="{{ $apparatus->job_position }}" class="form-control" placeholder="Masukan jabatan.." type="text" name="job_position" id="input-title">
                                    @error('job_position')
                                    <span class="text-danger d-inline-block mt-2">
                                        {{ $message }}
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group mb-4">
                                <label for="input-file">
                                    Upload Foto
                                </label>
                                <input class="form-control" type="file" id="input-file" name="picture">
                                <img src="{{ asset('storage/'. $apparatus->picture) }}" alt="" class="picture">
                                @error('picture')
                                <span class="text-danger d-inline-block mt-2">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <hr/>
                            <div class="form-group mb-4">
                                <label for="input-fb">
                                    Link Facebook
                                </label>
                                <input class="form-control" value="{{ $apparatus->fb_link }}" type="url" id="input-fb" name="fb_link">
                                @error('fb_link')
                                <span class="text-danger d-inline-block mt-2">
                                    {{ $message }}
                                </span>
                                @enderror
                            </div>

                            <div class="form-group">
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
<script src="{{ asset('vendor/lexa-admin/libs/select2/js/select2.min.js') }}"></script>
<script src="{{ asset('vendor/lexa-admin/libs/tinymce/tinymce.min.js') }}"></script>
<script>
    $(document).ready(function () {


        $('.select2').select2({
            placeholder: 'Pilih kategori yang cocok!'
        });
    });
</script>
@endsection
