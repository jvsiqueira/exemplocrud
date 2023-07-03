<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap-utilities.css">
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>

<body>
    <section class="vh-100 gradient-custom">
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-dark text-white" style="border-radius: 1rem;">
                        <div class="card-body p-5 text-center">

                            <div class="mb-md-5 mt-md-4 pb-5">

                                <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
                                <p class="text-white-50 mb-5">Digite seu LOGIN e SENHA</p>

                                <div class="form-outline form-white mb-4">
                                    <input type="email" id="emailUsu" class="form-control form-control-lg" />
                                    <label class="form-label" for="emailUsu">LOGIN</label>
                                </div>

                                <div class="form-outline form-white mb-4">
                                    <input type="password" id="senhaUsu" class="form-control form-control-lg" />
                                    <label class="form-label" for="senhaUsu">SENHA</label>
                                </div>

                                <button class="btn btn-outline-light btn-lg px-5" type="submit" onclick="login()">Login</button>

                                <div class="d-flex justify-content-center text-center mt-4 pt-1">


                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <script src="node_modules/sweetalert2/dist/sweetalert2.all.min.js"></script>
    <script src="js/utili.js"></script>
    <script src="js/login.js"></script>
</body>

</html>