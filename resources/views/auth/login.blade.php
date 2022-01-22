<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
    <link href="{{ asset('vendor/lexa-admin/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="card-body pt-0">

                            <h3 class="text-center mt-5 mb-4">
                                <a href="index.html" class="d-block auth-logo">
                                    <img src="{{ asset('vendor/lexa-admin/images/logo-dark.png') }}" alt="" height="30" class="auth-logo-dark">
                                </a>
                            </h3>

                            <div class="p-3">
                                <h4 class="text-muted font-size-18 mb-1 text-center">Selamat datang kembali</h4>
                                <p class="text-muted text-center">Masuk untuk menlanjutkan ke Admin</p>
                                <form class="form-horizontal mt-4" action="{{ route('admin.login.store') }}">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="username">Alamat email</label>
                                        <input type="email" autocomplete="off" name="email" class="form-control" id="username" placeholder="Alamat email">
                                    </div>
                                    <div class="mb-3">
                                        <label for="userpassword">Kata sandi</label>
                                        <input type="password" name="password" class="form-control" id="userpassword" placeholder="Kata sandi">
                                    </div>
                                    <div class="mb-3 row mt-4">
                                        <div class="col-6">
                                            <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Log In</button>
                                        </div>
                                    </div>
                                    <div class="form-group mb-0 row">
                                        <div class="col-12 mt-4">
                                            <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> Lupa kata sandi?</a>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        © <script>document.write(new Date().getFullYear())</script> Lexa <span class="d-none d-sm-inline-block"> - Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand.</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
