<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="../../Assets/css/login.css">
</head>

<body>
    <form action="/app/controllers/validar_login.php" method="post">
        <section class="vh-500 gradient-custom">
            <div class="container py-5 h-50">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                        <div class="card bg-dark text-white" style="border-radius: 1rem;">
                            <div class="card-body p-5 text-center">

                                <div class="mb-md-5 mt-md-4 pb-5">

                                    <h2 class="fw-bold mb-2 text-uppercase">¡Bienvenido!</h2>
                                    <p class="text-white-50 mb-5">Bunglebuild S.L.</p>

                                    <div class="form-outline form-white mb-4">
                                        <input type="text" name="email" class="form-control form-control-lg" />
                                        <label class="form-label" for="typeEmailX">Email</label>
                                    </div>

                                    <div class="form-outline form-white mb-4">
                                        <input type="password" name="pass" class="form-control form-control-lg" />
                                        <label class="form-label" for="typePasswordX">Contraseña</label>
                                    </div>
                                    <!-- <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Forgot password?</a></p>-->

                                    <button class="btn btn-outline-light btn-lg px-5" type="submit">Login</button>

                                </div>

                                <div>
                                    <p class="mb-0">No tienes cuenta?<a href="#!" class="text-white-50 fw-bold"></a>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </form>

</body>

</html><?php /**PATH C:\xampp\htdocs\PHP\Proyecto 1º Trimestre\app\views/login.blade.php ENDPATH**/ ?>