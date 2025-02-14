<!doctype html>
<html lang="en" class="remember-theme">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <title>
        {{ env('APP_NAME') }} - {{ __("user.login") }}
    </title>

    <!-- Icons -->
    <link rel="shortcut icon" href="{{ asset('assets/back/media/favicons/favicon.png') }}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('assets/back/media/favicons/favicon-192x192.png') }}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('assets/back/media/favicons/apple-touch-icon-180x180.png') }}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <link rel="stylesheet" id="css-main" href="{{ asset('assets/back/css/dashmix.min.css') }}">
    <!-- Load and set color theme + dark mode preference (blocking script to prevent flashing) -->
    <script src="{{ asset('assets/back/js/setTheme.js') }}"></script>
</head>

<body>
    <!-- Page Container -->
    <div id="page-container">

        <!-- Main Container -->
        <main id="main-container">
            <!-- Page Content -->
            <div class="bg-image" style="background-image: url('assets/back/media/photos/photo26@2x.jpg');">
                <div class="row g-0 bg-primary-dark-op">
                    <!-- Main Section -->
                    <div class="hero-static col-md-6 d-flex align-items-center bg-body-extra-light">
                        <div class="p-3 w-100">
                            <!-- Header -->
                            <div class="mb-3 text-center">
                                <a class="link-fx fw-bold fs-1" href="index.html">
                                    <span class="text-dark">Dash</span><span class="text-primary">mix</span>
                                </a>
                                <p class="text-uppercase fw-bold fs-sm text-muted">{{ __('user.login') }}</p>
                            </div>
                            <!-- END Header -->

                            <!-- Sign In Form -->
                            <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                            <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                            <div class="row g-0 justify-content-center">
                                <div class="col-sm-8 col-xl-7">
                                    <!-- Session Status -->
                                    <x-auth-session-status class="mb-4" :status="session('status')" />

                                    <form class="js-validation-signin" action="{{ route('login') }}" method="POST">
                                        @csrf

                                        <div class="py-3">
                                            <div class="mb-4">
                                                <input type="text" class="form-control form-control-lg form-control-alt" id="email" value="{{ old('email') }}" name="email" placeholder="{{ __('user.email') }}">
                                                @if ($errors->has('email'))
                                                <small class="d-inline-block text-danger mt-1">{{ $errors->first('email') }}</small>
                                                @endif
                                            </div>
                                            <div class="mb-4">
                                                <input type="password" class="form-control form-control-lg form-control-alt" id="password" name="password" placeholder="{{ __('user.password') }}">
                                                @if ($errors->has('password'))
                                                <small class="d-inline-block text-danger mt-1">{{ $errors->first('password') }}</small>
                                                @endif
                                            </div>

                                            <div class="space-y-2">
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input" type="checkbox" value="" id="remember" name="remember">
                                                    <label class="form-check-label" for="remember">
                                                        {{ __('user.remember_me') }}
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="mb-4">
                                            <button type="submit" class="btn w-100 btn-lg btn-hero btn-primary">
                                                <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i>
                                                {{ __('user.login') }}
                                            </button>
                                            <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                                @if (Route::has('password.request'))
                                                <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="{{ route('password.request') }}">
                                                    <i class="fa fa-exclamation-triangle opacity-50 me-1"></i> {{ __('user.forgot_password') }}
                                                </a>
                                                @endif

                                                <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="{{ route('register') }}">
                                                    <i class="fa fa-plus opacity-50 me-1"></i>
                                                    {{ __("user.register") }}
                                                </a>
                                            </p>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <!-- END Sign In Form -->
                        </div>
                    </div>
                    <!-- END Main Section -->

                    <!-- Meta Info Section -->
                    <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
                        <div class="p-3">
                            <p class="display-4 fw-bold text-white mb-3">
                                {{env("APP_NAME") }}
                            </p>
                            <p class="fs-lg fw-semibold text-white-75 mb-0">
                              &copy; <span data-toggle="year-copy"></span>
                            </p>
                        </div>
                    </div>
                    <!-- END Meta Info Section -->
                </div>
            </div>
            <!-- END Page Content -->
        </main>
        <!-- END Main Container -->
    </div>
    <!-- END Page Container -->

    <script src="{{ asset('assets/back/js/dashmix.app.min.js') }}"></script>

    <!-- jQuery (required for jQuery Validation plugin) -->
    <script src="{{ asset('assets/back/js/lib/jquery.min.js') }}"></script>

    <!-- Page JS Plugins -->
    <script src="{{ asset('assets/back/js/plugins/jquery-validation/jquery.validate.min.js') }}"></script>

    <!-- Page JS Code -->
    <script src="{{ asset('assets/back/js/pages/op_auth_signin.min.js') }}"></script>
</body>

</html>
