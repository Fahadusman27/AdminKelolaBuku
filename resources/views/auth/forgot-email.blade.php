<!DOCTYPE html>
<html lang="en">
<head>
    @include('layouts.stylepage')
    @include('layouts.styleglobal')
</head>
<body>
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <h4>Forgot Password?</h4>
                            <h6 class="font-weight-light">Masukkan email Anda untuk mengganti password.</h6>
                            
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    @foreach ($errors->all() as $error)
                                        {{ $error }}
                                    @endforeach
                                </div>
                            @endif

                            <form class="pt-3" action="{{ route('password.email') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-lg" placeholder="Email Address" required>
                                </div>
                                <div class="mt-3 d-grid gap-2">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">LANJUT</button>
                                </div>
                                <div class="text-center mt-4 font-weight-light">
                                    <a href="{{ route('login') }}" class="text-primary">Kembali ke Login</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>