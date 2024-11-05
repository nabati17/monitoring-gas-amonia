<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.jpg">
    <title>
        Halaman Register
    </title>
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />

    <link rel="stylesheet" href="../assets/css/material-dashboard.min.css">
    <link id="pagestyle" href="../assets/css/material-dashboard.min.css?v=3.1.0" rel="stylesheet" />
</head>

<body class="bg-gray-200">
    <main class="main-content  mt-0">
        <div class="page-header align-items-start min-vh-100 shadow mb-n4" style="background-color: #eeeeee">
            <div class="container my-auto">
                <div class="row justify-content-center align-items-center min-vh-100">
                    <div class="col-lg-4 col-md-8 col-10 mx-auto">
                        <div class="card z-index-0 fadeIn3 fadeInBottom">
                            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                                <div style="background-color: #ffdd00d8"
                                    class="shadow-primary border-radius-lg py-3 pe-1">
                                    <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Register</h4>
                                </div>
                            </div>


                            <div class="card-body">

                                @if (session('message'))
                                    <div class="alert alert-info text-white">
                                        {{ session('message') }}
                                    </div>
                                @endif


                                <form role="form" method="POST" action="{{ route('postregister') }}"
                                    class="text-start">
                                    @csrf
                                    <div class="input-group input-group-outline my-3">
                                        {{-- <label class="form-label">Name</label> --}}
                                        <input type="text" id="name" name="name" placeholder="name"
                                            class="form-control">
                                        @if ($errors->has('name'))
                                            <span class="text-danger">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
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
                                    <div class="text-center">
                                        <button type="submit" style="background-color: #ffdd00d8"
                                            class="btn text-white w-100 my-4 mb-2">Register</button>
                                    </div>
                                    <p class="mt-4 text-sm text-center">
                                        Already have an account?
                                        <a href="/" class="text-dark text-gradient font-weight-bold">Login</a>
                                    </p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>

</html>
