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
                            <h4>Set New Password</h4>
                            <h6 class="font-weight-light">Changing password for: <strong>{{ $email }}</strong></h6>
                            
                            <form class="pt-3" action="{{ route('password.update.direct') }}" method="POST">
                                @csrf
                                <input type="hidden" name="email" value="{{ $email }}">
                                
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control form-control-lg" id="passwordInput" placeholder="New Password" required>
                                                <span class="input-group-text bg-white" id="togglePassword" style="cursor: pointer;">
                                                    <i class="ti-eye"></i>
                                                </span>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <input type="password" name="password_confirmation" class="form-control form-control-lg" id="passwordConfirm" placeholder="Confirm New Password" required>
                                            <span class="input-group-text bg-white" id="PasswordConfirm" style="cursor: pointer;">
                                                <i class="ti-eye"></i>
                                            </span>
                                    </div>
                                </div>
                                
                                <div class="mt-3 d-grid gap-2">
                                    <button type="submit" class="btn btn-block btn-success btn-lg font-weight-medium auth-form-btn">UPDATE PASSWORD</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @include('layouts.jspage')
    @include('layouts.jsglobal')

</body>
</html>