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
    <title>Patient Registration</title>

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
                            <form class="login100-form validate-form" action="{{ route('register') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <span class="login100-form-title pb-5 text-uppercase">
                                    PATIENT REGISTRATION
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

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="name">Name</label>
                                                            <input type="text" name="name" id="name"
                                                                class="form-control" placeholder=""
                                                                aria-describedby="helpId" required>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="dob">Date of birth</label>
                                                            <input type="date" name="dob" id="dob"
                                                                class="form-control" placeholder=""
                                                                aria-describedby="helpId" required>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="gender">gender</label>
                                                            <input type="text" name="gender" id="gender"
                                                                class="form-control" placeholder=""
                                                                aria-describedby="helpId" required>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="email" name="email" id="email"
                                                                class="form-control" placeholder=""
                                                                aria-describedby="helpId" required>

                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="contact_number">Contact Number</label>
                                                            <input type="number" name="contact_number"
                                                                id="contact_number" class="form-control"
                                                                placeholder="" aria-describedby="helpId" required>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="city">City</label>
                                                            <input type="text" name="city" id="city"
                                                                class="form-control" placeholder=""
                                                                aria-describedby="helpId" required>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="province">Province</label>
                                                            <input type="text" name="province" id="province"
                                                                class="form-control" placeholder=""
                                                                aria-describedby="helpId" required>

                                                        </div>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <div class="form-group">
                                                            <label for="address">Address</label>
                                                            <input type="text" name="address" id="address"
                                                                class="form-control" placeholder=""
                                                                aria-describedby="helpId" required>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <div class="form-group">
                                                            <label for="password">Password</label>
                                                            <input type="password" name="password" id="password"
                                                                class="form-control" placeholder=""
                                                                aria-describedby="helpId" required>

                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="container-login100-form-btn">
                                                    <button type="submit" class="login100-form-btn btn-primary"
                                                        name="btn_login">
                                                        SIGN UP
                                                    </button>
                                                </div>
                                                <label class="login-social-icon"><span>OR</span></label>
                                                <div class="text-center pt-3">
                                                    <p class="text-dark mb-0">have an account already?<a
                                                            href="{{ route('login') }}"
                                                            class="text-primary ms-1">Sign in</a>
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
