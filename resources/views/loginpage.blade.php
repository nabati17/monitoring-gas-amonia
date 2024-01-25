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


    {{-- <link rel="canonical" href="https://www.creative-tim.com/product/material-dashboard" /> --}}

    {{-- <meta name="keywords"
        content="creative tim, html dashboard, html css dashboard, web dashboard, bootstrap 5 dashboard, bootstrap 5, css3 dashboard, bootstrap 5 admin, Material Dashboard bootstrap 5 dashboard, frontend, responsive bootstrap 5 dashboard, free dashboard, free admin dashboard, free bootstrap 5 admin dashboard">
    <meta name="description"
        content="Material Dashboard 2 is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you.">

    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@creativetim">
    <meta name="twitter:title" content="Material Dashboard 2 by Creative Tim">
    <meta name="twitter:description"
        content="Material Dashboard 2 is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you.">
    <meta name="twitter:creator" content="@creativetim">
    <meta name="twitter:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/450/original/material-dashboard.jpg">

    <meta property="fb:app_id" content="655968634437471">
    <meta property="og:title" content="Material Dashboard 2 by Creative Tim" />
    <meta property="og:type" content="article" />
    <meta property="og:url" content="http://demos.creative-tim.com/material-dashboard/pages/dashboard.html" />
    <meta property="og:image"
        content="https://s3.amazonaws.com/creativetim_bucket/products/450/original/material-dashboard.jpg" />
    <meta property="og:description"
        content="Material Dashboard 2 is a beautiful Bootstrap 5 admin dashboard with a large number of components, designed to look beautiful and organized. If you are looking for a tool to manage and visualize data about your business, this dashboard is the thing for you." />
    <meta property="og:site_name" content="Creative Tim" /> --}}

    <link rel="stylesheet" href="../assets/css/material-dashboard.min.css">

    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    {{-- <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" /> --}}

    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

    <link id="pagestyle" href="../assets/css/material-dashboard.min.css?v=3.1.0" rel="stylesheet" />

    <style>
        .async-hide {
            opacity: 0 !important
        }
    </style>

    <script defer data-site="demos.creative-tim.com" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>
</head>

<body class="bg-gray-200">
    {{-- <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
            style="display:none;visibility:hidden"></iframe></noscript> --}}

    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100" style="background-color: #eeeeee">
            <span class="mask opacity-6"></span>
            <div class="container my-auto">
                <div class="row justify-content-center align-items-center min-vh-100">
                    <div class="col-lg-4 col-md-8 col-12 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div style="background-color: #ffdd00d8"
                                    class="shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Login</h4>

                                    {{-- <div class="row mt-3">
                                        <div class="col-2 text-center ms-auto">
                                            <a class="btn btn-link px-3" href="javascript:;">
                                                <i class="fa fa-facebook text-white text-lg"></i>
                                            </a>
                                        </div>
                                        <div class="col-2 text-center px-1">
                                            <a class="btn btn-link px-3" href="javascript:;">
                                                <i class="fa fa-github text-white text-lg"></i>
                                            </a>
                                        </div>
                                        <div class="col-2 text-center me-auto">
                                            <a class="btn btn-link px-3" href="javascript:;">
                                                <i class="fa fa-google text-white text-lg"></i>
                                            </a>
                                        </div>
                                    </div> --}}
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
                                    {{-- <div class="form-check form-switch d-flex align-items-center mb-3">
                                        <input class="form-check-input" type="checkbox" id="rememberMe" checked>
                                        <label class="form-check-label mb-0 ms-3" for="rememberMe">Remember me</label>
                                    </div> --}}
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
