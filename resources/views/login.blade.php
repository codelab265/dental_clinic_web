<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/favicon.ico') }}" />

    <!-- TITLE -->
    <title>Login</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/dark-style.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/transparent-style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/skin-modes.css') }}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all"
        href="{{ asset('assets/colors/color1.css') }}" />

</head>

<body class="app sidebar-mini ltr">

    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="{{ asset('assets/images/loader.svg') }}" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">

                <!-- CONTAINER OPEN -->
                <div class="col col-login mx-auto mt-7">
                    <div class="" style="display: flex; justify-content:center; align-items:center">
                        <img src="{{ asset('assets/images/brand/logo-2.png') }}"
                            class="header-brand-img p-2 bg-light rounded-circle" alt="" height="50">
                        <span
                            style="margin-left:10px; text-transform:uppercase; font-size: 30px; font-weight: bold; color: white;">Dental
                            Clinic</span>
                    </div>

                    <div class="container-login100">
                        <div class="wrap-login100 p-6">
                            <form class="login100-form validate-form" action="{{ route('login') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <span class="login100-form-title pb-5 text-uppercase">
                                    SIGN IN
                                </span>
                                <div class="panel panel-primary">

                                    <div class="panel-body tabs-menu-body p-0 pt-5">
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="tab5">
                                                @if (session('error'))
                                                    <div class="alert alert-danger text-center">
                                                        {{ session('error') }}
                                                    </div>
                                                @endif

                                                @if (session('success'))
                                                    <div class="alert alert-success text-center">
                                                        {{ session('success') }}
                                                    </div>
                                                @endif

                                                <div class="wrap-input100 validate-input input-group"
                                                    data-bs-validate="Valid email is required: ex@abc.xyz">
                                                    <a href="javascript:void(0)"
                                                        class="input-group-text bg-white text-muted">
                                                        <i class="zmdi zmdi-email text-muted" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="input100 border-start-0 form-control ms-0"
                                                        type="email" placeholder="Email" name="email" required>
                                                </div>
                                                <div class="wrap-input100 validate-input input-group"
                                                    id="Password-toggle">
                                                    <a href="javascript:void(0)"
                                                        class="input-group-text bg-white text-muted">
                                                        <i class="zmdi zmdi-eye text-muted" aria-hidden="true"></i>
                                                    </a>
                                                    <input class="input100 border-start-0 form-control ms-0"
                                                        type="password" placeholder="Password" name="password" required>
                                                </div>

                                                <div class="container-login100-form-btn">
                                                    <button type="submit" class="login100-form-btn btn-primary"
                                                        name="btn_login">
                                                        SIGN IN
                                                    </button>
                                                </div>
                                                <label class="login-social-icon"><span>OR</span></label>
                                                <div class="text-center pt-3">
                                                    <p class="text-dark mb-0">Not a member?
                                                        <a href="{{ route('register') }}"
                                                            class="text-primary ms-1">Sign up</a>
                                                    </p>
                                                </div>

                                                <div class="text-center pt-3">
                                                    <p class="text-dark mb-0">Want to download mobile app?
                                                        <a href="#" class="text-primary ms-1"
                                                            onclick="alert('File not uploaded yet')">Click here</a>
                                                    </p>
                                                </div>

                                            </div>

                                        </div>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <!-- CONTAINER CLOSED -->
                </div>
            </div>
            <!-- End PAGE -->

        </div>
        <!-- BACKGROUND-IMAGE CLOSED -->

        <!-- JQUERY JS -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>

        <!-- BOOTSTRAP JS -->
        <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.min.js') }}"></script>

        <!-- SHOW PASSWORD JS -->
        <script src="{{ asset('assets/js/show-password.min.js') }}"></script>

        <!-- GENERATE OTP JS -->
        <script src="{{ asset('assets/js/generate-otp.js') }}"></script>

        <!-- Perfect SCROLLBAR JS-->
        <script src="{{ asset('assets/plugins/p-scroll/perfect-scrollbar.js') }}"></script>

        <!-- Color Theme js -->
        <script src="{{ asset('assets/js/themeColors.js') }}"></script>

        <!-- CUSTOM JS -->
        <script src="{{ asset('assets/js/custom.js') }}"></script>

</body>

</html>
