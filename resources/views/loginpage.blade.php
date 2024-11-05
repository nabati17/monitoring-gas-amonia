<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.jpg">
    <title>
        Halaman Login
    </title>
    <link rel="stylesheet" href="../assets/css/material-dashboard.min.css">

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <link id="pagestyle" href="../assets/css/material-dashboard.min.css?v=3.1.0" rel="stylesheet" />

    <style>
        .async-hide {
            opacity: 0 !important
        }

        @media (max-width: 576px) {

            /* Custom styles for smaller screens */
            .card-body {
                padding: 1rem;
                /* Adjust padding for smaller screens */
            }
        }
    </style>
    <script defer data-site="demos.creative-tim.com" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="bg-gray-200">

    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100" style="background-color: #eeeeee">
            <span class="mask opacity-6"></span>
            <div class="container my-auto">
                <div class="row justify-content-center align-items-center min-vh-100">
                    <div class="col-lg-4 col-md-8 col-10 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div style="background-color: #ffdd00d8"
                                    class="shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Login</h4>
                                </div>
                            </div>
                            <div class="card-body">
                                @if (\Session::has('message'))
                                    <div class="alert alert-info bg-red-50 text-white">
                                        {{ \Session::get('message') }}
                                    </div>
                                @endif
                                <form role="form" method="POST" action="{{ route('postlogin') }}"
                                    class="text-start">
                                    @csrf
                                    <div class="input-group input-group-outline my-3">
                                        {{-- <label class="form-label">Email</label> --}}
                                        <input type="email" id="email" name="email" placeholder="email"
                                            class="form-control">
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                    <div class="input-group input-group-outline mb-3">
                                        {{-- <label class="form-label">Password</label> --}}
                                        <input type="password" id="password" name="password" placeholder="password"
                                            class="form-control">
                                        @if ($errors->has('password'))
                                            <span class="text-danger">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-check" style="padding-left: 0;">
                                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                                        <label class="form-check-label" for="remember">
                                            Ingat Saya
                                        </label>
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" style="background-color: #ffdd00d8"
                                            class="btn text-white w-100 my-4 mb-2">Login</button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">
                                        Don't have an account?
                                        <a href="/register"
                                            class="text-dark text-gradient font-weight-bold">Register</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
    <script defer src="https://static.cloudflareinsights.com/beacon.min.js/v8b253dfea2ab4077af8c6f58422dfbfd1689876627854"
        integrity="sha512-bjgnUKX4azu3dLTVtie9u6TKqgx29RBwfj3QXYt5EKfWM/9hPSAI/4qcV5NACjwAo8UtTeWefx6Zq5PHcMm7Tg=="
        data-cf-beacon='{"rayId":"8132ca2c6e5d880d","token":"1b7cbb72744b40c580f8633c6b62637e","version":"2023.8.0","si":100}'
        crossorigin="anonymous"></script>
</body>

</html>
