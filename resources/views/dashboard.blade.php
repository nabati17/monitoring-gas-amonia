<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/logo-ct.jpg" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.jpg" />
    <title>Monitoring Gas Amonia</title>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/1.0.0/dist/progressbar.min.js"></script>
    <link id="pagestyle" href="../assets/css/material-dashboard.css" rel="stylesheet" />

</head>

<body class="g-sidenav-show bg-gray-200">
    <!-- Sidebar -->
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header ">
            <div class="navbar-brand m-0 d-flex align-items-center" target="_blank">
                <img src="../assets/img/logo-ct.jpg" class="navbar-brand-img h-100" alt="main_logo" />
                <span class="ms-1 font-weight-bold text-white">Monitoring Gas Amonia</span>
            </div>
        </div>
        <hr class="horizontal light mt-0 mb-2" />
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item mb-2">
                    <a class="nav-link text-white active" style="background-color: #ffdd00d8" href="#">
                        <i class="bi bi-grid"></i>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/analisis">
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
    <main class="main-content position-relative = border-radius-lg">
        {{-- <div class="card-body py-3" style="position: relative;"> --}}
        <!-- Alert for Red Indicator -->
        <div class="alert alert-danger alert-dismissible my-4 text-white" id="redAlert" role="alert"
            style="position: absolute; top: 4; right: 0; margin-right: 15px; margin-left: 170px; display: none;">
            <i class="bi bi-exclamation-triangle"></i>
            <span class="text-sm text-bold">Tingkat Gas Amonia tinggi! segera bersihkan kandang!</span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" onclick="closeRedAlert()"
                data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <!-- Alert for Yellow Indicator -->
        <div class="alert alert-warning alert-dismissible my-4 text-white" id="yellowAlert" role="alert"
            style="position: absolute; top:4; right: 0; margin-right: 16px; margin-left: 170px; display: none;">
            <i class="bi bi-exclamation-triangle"></i>
            <span class="text-sm text-bold">Tingkat Gas Amonia hampir tinggi! segera bersihkan kandang!</span>
            <button type="button" class="btn-close text-lg py-3 opacity-10" onclick="closeYellowAlert()"
                data-bs-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-3 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a>
                        </li>
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
                    </ol>
                    <h6 class="font-weight-bolder mb-0">Dashboard</h6>
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

        <!-- Content -->
        <div class="container-fluid py-2 px-3">
            <div class="row mt-4">
                <div class="col-lg-4 mt-4 mb-3">
                    <div class="card z-index-2">
                        <div class="card-body">
                            <h6 class="mb-5 text-center">Hijau</h6>
                            <div id="green-indicator"
                                class="d-flex mx-auto
                                text-center border border-dark border-3 rounded-circle"
                                style="width:40px; height:40px;">
                            </div>
                            <h6 class="mt-3 text-center">Aman</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-4 mb-4">
                    <div class="card z-index-2">
                        <div class="card-body">
                            <h6 class="mb-5 text-center">Kuning</h6>
                            <div id="yellow-indicator"
                                class="d-flex mx-auto text-center border border-dark border-3 rounded-circle"
                                style="width:40px; height:40px;">
                            </div>
                            <h6 class="mt-3 text-center">Waspada</h6>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-4 mb-3">
                    <div class="card z-index-2">
                        <div class="card-body">
                            <h6 class="mb-5 text-center">Merah</h6>
                            <div id="red-indicator"
                                class="d-flex mx-auto text-center border border-dark border-3 rounded-circle"
                                style="width:40px; height:40px;">
                            </div>
                            <h6 class="mt-3 text-center">Bahaya</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container py-2">
            <div class="container mt-5">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title mb-4 ">Progress Indicator Gas Amonia</h5>
                        <div id="semi-container" class="mx-auto" style="max-width: 400px;">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </main>



    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
    <script src="../assets/js/notifikasi.js"></script>
    <script src="sw.js"></script>
    <script src="../assets/js/push-notification.js"></script>

</body>

</html>
