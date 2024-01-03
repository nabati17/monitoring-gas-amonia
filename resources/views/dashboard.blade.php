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
    <link id="pagestyle" href="../assets/css/material-dashboard.css?v=3.1.0" rel="stylesheet" />

    <link rel="stylesheet" href="/assets/css/material-dashboard.css">
    <style>
        .green-indicator {
            background-color: #00ff00;
            /* Warna hijau */
        }

        .yellow-indicator {
            background-color: #ffff00;
            /* Warna kuning */
        }

        .red-indicator {
            background-color: #ff0000;
            /* Warna merah */
        }
    </style>

</head>

<body class="g-sidenav-show bg-gray-200">
    <!-- Sidebar -->
    <aside
        class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark"
        id="sidenav-main">
        <div class="sidenav-header">
            <i class="fas fa-times p-3 cursor-pointer text-white opacity-5 position-absolute end-0 top-0 d-none d-xl-none"
                aria-hidden="true" id="iconSidenav"></i>
            <div class="navbar-brand m-0" target="_blank">
                <img src="../assets/img/logo-ct.jpg" class="navbar-brand-img h-100" alt="main_logo" />
                <span class="ms-1 font-weight-bold text-white">Monitoring Gas Amonia</span>
            </div>
        </div>
        <hr class="horizontal light mt-0 mb-2" />
        <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link text-white active" style="background-color: #ffdd00d8"
                        href="../pages/dashboard.html">
                        <i class="bi bi-grid"></i>
                        <span class="nav-link-text ms-1">Dashboard</span>
                    </a>
                </li>
                <li class="nav-item mt-3">
                    <h6 class="ps-4 ms-2 text-uppercase text-xs text-white font-weight-bolder opacity-8">
                        Account
                    </h6>
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
                        <li class="breadcrumb-item text-sm text-dark active" aria-current="page">
                            <h3>Hello {{ Auth::user()->name }}</h3>
                        </li>
                    </ol>
                </nav>
                <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
                    <ul class="navbar-nav justify-content-end">
                        <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                            <a class="nav-link text-body p-0" id="iconNavbarSidenav">
                                <div class="sidenav-toggler-inner">
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                    <i class="sidenav-toggler-line"></i>
                                </div>
                            </a>
                        </li>
                    </ul>
                </div>
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
                                class="d-flex mx-auto text-center border border-dark border-3 rounded-circle"
                                style="width:40px; height:40px;">
                            </div>
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container py-3">
            <div class="container mt-5">
                <div class="card text-center">
                    <div class="card-body">
                        <h5 class="card-title mb-4">Progress Indicator</h5>
                        <div id="semi-container" class="mx-auto" style="max-width: 400px;"></div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- JavaScript -->
    <script>
        fetch('/api/getGasLevels')
            .then(response => response.json())
            .then(data => {
                const gasLevel = data.gasLevels[0].gas_level / 100;

                // Update the progress bar value
                var semiBar = new ProgressBar.SemiCircle("#semi-container", {
                    color: gasLevel <= 0.3 ? "green" : (gasLevel <= 0.7 ? "yellow" : "red"),
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
                            fontSize: '50px'
                        }
                    },
                    step: (state, shape) => {
                        shape.path.setAttribute("stroke", state.color);
                        shape.path.setAttribute("stroke-width", state.width);
                        shape.setText(Math.round(shape.value() * 100) + ' %');
                    }
                });

                semiBar.animate(gasLevel, {
                    duration: 2000
                });

                // Update the color indicators based on gas level
                var redIndicator = document.getElementById('red-indicator');
                var yellowIndicator = document.getElementById('yellow-indicator');
                var greenIndicator = document.getElementById('green-indicator');

                // Remove existing classes
                redIndicator.classList.remove('red-indicator');
                yellowIndicator.classList.remove('yellow-indicator');
                greenIndicator.classList.remove('green-indicator');

                // Add new classes based on gas level
                if (gasLevel <= 0.3) {
                    greenIndicator.classList.add('green-indicator');
                } else if (gasLevel <= 0.7) {
                    yellowIndicator.classList.add('yellow-indicator');
                } else {
                    redIndicator.classList.add('red-indicator');
                }
            })
            .catch(error => console.error('Error fetching gas level data:', error));
    </script>

    <!-- Additional Scripts -->
    <script src="../assets/js/plugins/perfect-scrollbar.min.js"></script>
    <script src="../assets/js/material-dashboard.min.js?v=3.1.0"></script>
</body>

</html>
