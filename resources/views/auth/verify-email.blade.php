<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Verify Email | Devland</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Premium Multipurpose Admin & Dashboard Template" name="description" />
    <meta content="Themesdesign" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}">
    {{-- Toastr css cdn --}}
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <!-- Bootstrap Css -->
    <link href="{{ asset('backend/assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('backend/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('backend/assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

</head>

<body class="auth-body-bg">
    <div class="bg-overlay"></div>
    <div class="wrapper-page">
        <div class="container-fluid p-0">
            <div class="card">
                <div class="card-body">
                    <div class="text-center mt-4">
                        <div class="mb-3">
                            <a href="{{ url('/') }}" class="auth-logo">
                                <img src="{{ asset('backend/assets/images/logo_black.svg') }}" height="30"
                                    class="logo-dark mx-auto" alt="Logo">
                            </a>
                        </div>
                    </div>

                    <h4 class="text-muted text-center font-size-18"><b>Verify Email</b></h4>
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        A new verification link has been sent to the <strong>email</strong> address you provided during
                        registration.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <div class="p-3">
                        <form class="form-horizontal mt-3" method="POST" action="{{ route('verification.send') }}">
                            @csrf
                            <button class="btn btn-dark w-100 waves-effect waves-light" type="submit">Resend
                                Verification Email</button>
                        </form>
                        <form class="form-horizontal mt-3" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="btn btn-danger w-100 waves-effect waves-light" type="submit">Log
                                Out</button>
                        </form>
                    </div>
                    <!-- end -->
                </div>
                <!-- end cardbody -->
            </div>
            <!-- end card -->
        </div>
        <!-- end container -->
    </div>
    <!-- end -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('backend/assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('backend/assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('backend/assets/js/app.js') }}"></script>

</body>

</html>
