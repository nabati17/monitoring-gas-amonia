<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>Monitoring Gas Amonia</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />

    {{-- jajal --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" /> <!--end::Fonts-->

    <!--begin::Vendor Stylesheets(used for this page only)-->
    <link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <!--end::Vendor Stylesheets-->


    <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />

    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="../assets/css/custom.min.css" rel="stylesheet">
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet" />
    <!-- CSS Files -->
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />

    <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

</head>

<body class="g-sidenav-show bg-gray-200">
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <a class="navbar-brand m-0" href=" https://demos.creative-tim.com/material-dashboard/pages/dashboard "
                target="_blank">
                <img src="../assets/img/logo-ct.png" class="navbar-brand-img h-100" alt="main_logo" />
                <span class="ms-1 font-weight-bold text-white">Monitoring Gas Amonia</span>
            </a>
        </div>
        <hr class="horizontal light mt-0 mb-2" />
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active bg-gradient-primary" href="../pages/dashboard.html">
                        {{-- <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <i class="material-icons opacity-10">dashboard</i>
                        </div> --}}
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                        Account pages
                    </h6>
                </li>

                <li class="nav-item">
                    <a class="nav-link text-white" href="{{ 'signout' }}">
                        <div class="text-white text-center me-2 d-flex align-items-center justify-content-center">
                            <span class="nav-link-text ms-1">Logoutt</span>

                        </div>

                    </a>
                </li>

            </ul>
        </div>
    </aside>
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <div class="container-fluid py-3 px-3">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                            Dashboard
                        </li>
                    </ol>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                </div>
            </div>
            <li class="nav-item d-flex align-items-center">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none">{{ Auth::user()->name }}</span>
                </a>
            </li>
        </nav>
        <!-- End Navbar -->
        <div class="container-fluid py-4">

            <div class="row mt-4">
                <div class="col-lg-4 col-md-6 mt-4 mb-4">
                    <div class="card z-index-2">
                        <div class="card-body">
                            <h6 class="mb-5 text-center">Merah</h6>
                            <div class="d-flex mx-auto text-center border border-d border-3 rounded-circle"
                                style="width:40px; height:40px;">
                                <!-- Isi buletan di sini, jika diperlukan -->
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-4 col-md-6 mt-4 mb-4">
                    <div class="card z-index-2">

                        <div class="card-body">
                            <h6 class="mb-5 text-center">Kuning</h6>
                            <div class="d-flex mx-auto text-center border border-d border-3 rounded-circle"
                                style="width:40px; height:40px;">
                                <!-- Isi buletan di sini, jika diperlukan -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 mt-4 mb-3">
                    <div class="card z-index-2">

                        <div class="card-body">
                            <h6 class="mb-5 text-center">Hijau</h6>
                            <div class="d-flex mx-auto text-center border border-d border-3 rounded-circle"
                                style="width:40px; height:40px;">
                                <!-- Isi buletan di sini, jika diperlukan -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title mb-4">Progress Indicator</h5>
                    <div id="semi-container" class="mx-auto" style="max-width: 400px;"></div>
                </div>
            </div>
        </div>

        {{-- <div class="container mt-5">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title mb-4">Progres Indikator</h5>
                    <div id="semi-container" style="width: 400px; " class="mx-auto"></div>
                </div>
            </div>
        </div> --}}
    </main>


    <script src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/1.0.0/dist/progressbar.min.js"></script>
    <script>
        var semiBar = new ProgressBar.SemiCircle("#semi-container", {
            color: "violet",
            strokeWidth: 2,
            trailWidth: 8,
            trailColor: "black",
            easing: "bounce",
            from: {
                color: "#FF0099",
                width: 1
            },
            to: {
                color: "#FF9900",
                width: 2
            },
            text: {
                value: '0',
                className: 'progress-text',
                style: {
                    color: 'black',
                    position: 'absolute',
                    top: '50%', // Adjusted top position for centering
                    left: '50%',
                    padding: 0,
                    margin: 0,
                    transform: 'translate(-50%, -50%)', // Center the text
                    fontSize: '24px'
                }
            },
            step: (state, shape) => {
                shape.path.setAttribute("stroke", state.color);
                shape.path.setAttribute("stroke-width", state.width);
                shape.setText(Math.round(shape.value() * 100) + ' %');
            }
        });
        semiBar.animate(0.8, {
            duration: 2000
        });
    </script>
    <!--   Core JS Files   -->
    <script src="../assets/js/core/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/smooth-scrollbar.min.js"></script>
    <script src="../assets/js/plugins/chartjs.min.js"></script>

    <script async defer src="https://buttons.github.io/buttons.js"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>
