<!DOCTYPE html>
<html lang="en" dir="ltr" data-nav-layout="vertical" data-theme-mode="light" data-header-styles="light"
    data-menu-styles="light" data-toggled="close">

<head>
    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=no'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="Description" content="PHP Bootstrap Responsive Admin Web Dashboard Template">
    <meta name="keywords"
        content="dashboard, template dashboard, Bootstrap dashboard, admin panel template, sales dashboard, Bootstrap admin panel, stocks dashboard, crm admin dashboard, ecommerce admin panel, admin template, admin panel dashboard, course dashboard, template ecommerce website, dashboard hrm, admin dashboard">

    <!-- TITLE -->
    <title>Xác Thực Người Dùng</title>

    <!-- FAVICON -->
    <link rel="icon" href="https://php.spruko.com/ynex/ynex/assets/images/brand-logos/favicon.ico"
        type="image/x-icon">

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('admin/assets/libs/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- ICONS CSS -->
    <link href="{{ asset('admin/assets/css/icons.css') }}" rel="stylesheet">

    <!-- STYLES CSS -->
    <link href="{{ asset('admin/assets/css/styles.css') }}" rel="stylesheet">

    <!-- MAIN JS -->
    <script src="{{ asset('admin/assets/js/authentication-main.js') }}"></script>
</head>

<body>
    <div class="container">
        <div class="row justify-content-center align-items-center authentication authentication-basic h-100">
            <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-6 col-sm-8 col-12">
                <div class="my-5 d-flex justify-content-center">
                    <a href="index.html">
                        <img src="{{ asset('admin/assets/images/brand-logos/desktop-logo.png') }}" alt="logo"
                            class="desktop-logo">
                        <img src="{{ asset('admin/assets/images/brand-logos/desktop-dark.png') }}" alt="logo"
                            class="desktop-dark">
                    </a>
                </div>
                <div class="card custom-card">
                    <div class="card-body p-5">
                        <form method="POST" action="{{ route('auth.login') }}">
                            @csrf
                            <p class="h5 fw-semibold mb-2 text-center">Đăng Nhập</p>
                            <p class="mb-4 text-muted op-7 fw-normal text-center">Chào Mừng Bạn Đến Với Trang Quản Trị Admin !</p>
                            <div class="row gy-3">
                                <div class="col-xl-12">
                                    <label for="email" class="form-label text-default">Email</label>
                                    <input type="email" name="email" class="form-control form-control-lg" id="email"
                                        placeholder="Email">
                                </div>
                                <div class="col-xl-12 mb-2">
                                    <label for="password" class="form-label text-default d-block">Mật Khẩu<a
                                            href="a.html" class="float-end text-danger">Quên Mật Khẩu?</a></label>
                                    <div class="input-group">
                                        <input type="password" name="password" class="form-control form-control-lg"
                                            id="password" placeholder="Password">
                                        <button class="btn btn-light" type="button"
                                            onclick="createpassword('password',this)" id="button-addon2"><i
                                                class="ri-eye-off-line align-middle"></i></button>
                                    </div>
                                    <div class="mt-2">
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" 
                                                id="remember">
                                            <label class="form-check-label text-muted fw-normal" for="remember">
                                                Nhớ Mật Khẩu ?
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-12 d-grid mt-2">
                                    <button type="submit" class="btn btn-lg btn-primary">Đăng Nhập</button>
                                </div>
                            </div>
                        </form>
                        <div class="text-center my-3 authentication-barrier">
                            <span>OR</span>
                        </div>
                        <div class="btn-list text-center">
                            <button class="btn btn-icon btn-light">
                                <i class="ri-facebook-line fw-bold text-dark op-7"></i>
                            </button>
                            <button class="btn btn-icon btn-light">
                                <i class="ri-google-line fw-bold text-dark op-7"></i>
                            </button>
                            <button class="btn btn-icon btn-light">
                                <i class="ri-twitter-line fw-bold text-dark op-7"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- SCRIPTS -->

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('admin/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- SHOW PASSWORD JS -->
    <script src="{{ asset('admin/assets/js/show-password.js') }}"></script>

    <!-- END SCRIPTS -->
</body>

</html>
