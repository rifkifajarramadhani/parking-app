<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Parking App</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Vehicle In</h1>
                                    </div>
                                    <form class="user" action="#">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="police_number_in" aria-describedby="police_number"
                                                placeholder="Enter Police Number">
                                        </div>
                                        <button id="input-btn-in" class="btn btn-primary btn-user btn-block">
                                            Input Vehicle
                                        </button>
                                        <p id="success-msg-in" class="mt-4" style="">
                                            AAA
                                        </p>
                                        <p id="alert-msg-in" class="mt-4" style="color: red;">
                                            AAA
                                        </p>
                                    </form>
                                </div>
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Vehicle Out</h1>
                                    </div>
                                    <form class="user" action="#">
                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="police_number_out" aria-describedby="police_number"
                                                placeholder="Enter Police Number">
                                        </div>
                                        <button id="input-btn-out" class="btn btn-primary btn-user btn-block">
                                            Input Vehicle
                                        </button>
                                        <p id="success-msg-out" class="mt-4">
                                            AAA
                                        </p>
                                        <p id="alert-msg-out" class="mt-4" style="color: red;">
                                            AAA
                                        </p>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

    <!-- Custom scripts for this pages-->
    <script src="js/core.js"></script>

</body>

</html>
