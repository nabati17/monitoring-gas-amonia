<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/logo-ct.jpg" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.jpg" />
    <title>Monitoring Gas Amonia</title>
    <link rel="stylesheet" href="../path/to/perfect-scrollbar.min.css" />
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/1.0.0/dist/progressbar.min.js"></script>
    <link id="pagestyle" href="../assets/css/material-dashboard.css" rel="stylesheet" />
    <style>
        .chart-container {
            position: relative;
            width: 100%;
            height: auto;
        }

        canvas {
            display: block;
            width: 100%;
            height: auto;
        }
    </style>
</head>

<body class="g-sidenav-show bg-gray-200">
    {{-- <x-notify::notify /> --}}
    <!-- Sidebar -->
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <div class="navbar-brand m-0 d-flex align-items-center" target="_blank">
                <img src="../assets/img/logo-ct.jpg" class="navbar-brand-img h-100" alt="main_logo" />
                <span class="ms-1 font-weight-bold text-white">Monitoring Gas Amonia</span>
            </div>
        </div>
        <hr class="horizontal light mt-0 mb-2" />
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav mb-10">
                <li class="nav-item mb-2">
                    <a class="nav-link" href="/dashboard">
                        <i class="bi bi-grid"></i>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white active" style="background-color: #ffdd00d8" href="/analisis">
                        <i class="bi bi-graph-up"></i>
                        <span class="nav-link-text ms-1">Analisis</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                        Account
                    </h6>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="/profile">
                        <i class="bi bi-person-fill"></i>
                        <span class="nav-link-text ms-1">Profile</span>
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ 'signout' }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="bi bi-box-arrow-right"></i>
                            <span class="nav-link-text ms-1">Logout</span>
                        </div>
                    </a>
                </li>
            </ul>
        </div>
    </aside>
    <!-- Main Content -->
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-3 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Analisis</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Analisis</h6>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <div class="ms-md-auto pe-md-3 d-flex align-items-center">
                    </div>
                </div>
                <ul class="navbar-nav  justify-content-end">
                    <li class="nav-item d-flex align-items-center">
                        <!-- <a class="btn btn-outline-primary btn-sm mb-0 me-3" target="_blank" href="https://www.creative-tim.com/builder?ref=navbar-material-dashboard">Online Builder</a> -->
                    </li>
                    <li class="mt-2">
                        <!-- <a class="github-button" href="https://github.com/creativetimofficial/material-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star creativetimofficial/material-dashboard on GitHub">Star</a> -->
                    </li>
                    <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                        <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                            <div class="sidenav-toggler-inner">
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                                <i class="sidenav-toggler-line"></i>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4 mb-3">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h5 class="card-title">Rata-rata Harian</h5>
                        </div>
                        <div class="card-container">
                            <canvas id="chart-line-daily"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h5 class="card-title">Rata-rata Bulanan</h5>
                        </div>
                        <div class="card-container">
                            <canvas id="chart-line-monthly"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 mb-3">
                    <div class="card card-chart">
                        <div class="card-header">
                            <h5 class="card-title">Data Tahunan</h5>
                        </div>
                        <div class="card-container">
                            <canvas id="chart-line-yearly"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Data Embedding -->
    <script>
        window.dailyAverages = @json($dailyAverages);
        window.monthlyAverages = @json($monthlyAverages);
        window.yearlyData = @json($yearlyData);
    </script>


    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>
    <script src="../assets/js/analisis.js"></script>
</body>

</html>
