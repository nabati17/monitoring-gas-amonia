{{-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Progress Bars</title>
    <!-- Include Bootstrap CSS for card styling (optional) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Include ProgressBar.js library -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/1.0.0/dist/progressbar.min.css">
</head>

<body>

    <!-- Centered and larger card container -->
    <div class="card text-center"
        style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); width: 400px; height: 300px;">
        <div class="card-body">
            <!-- Container for SemiCircle ProgressBar -->
            <div id="semi-container"></div>
        </div>
    </div>

    <!-- Include ProgressBar.js library -->
    <script src="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/1.0.0/dist/progressbar.min.js"></script>

    <!-- Your custom script -->
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

</body>

</html> --}}

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.png" />
    <title>Monitoring Gas Amonia</title>

    <!-- Include Bootstrap CSS for card styling (optional) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <!-- Include ProgressBar.js library -->
    <link rel="stylesheet" href="https://cdn.rawgit.com/kimmobrunfeldt/progressbar.js/1.0.0/dist/progressbar.min.css">

    <!-- Fonts and icons -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />

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
        <!-- ... (kode lainnya tetap sama) ... -->
    </aside>

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg">
        <!-- Navbar -->
        <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur"
            data-scroll="true">
            <!-- ... (kode lainnya tetap sama) ... -->
        </nav>
        <!-- End Navbar -->

        <div class="container-fluid py-4">
            <div class="row mt-4">
                <!-- ... (kode lainnya tetap sama) ... -->

                <div class="col-lg-4 mt-4 mb-3">
                    <div class="card z-index-2">
                        <div class="card-body">
                            <h6 class="mb-5 text-center">Hijau</h6>
                            <div id="semi-container" style="width: 100px; height: 100px;"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="card text-center">
                <div class="card-body">
                    <h5 class="card-title mb-4">Progres Indikator</h5>
                </div>
            </div>
        </div>
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
</body>

</html>
