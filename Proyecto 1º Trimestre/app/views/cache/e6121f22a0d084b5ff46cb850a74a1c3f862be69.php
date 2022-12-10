<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="/Assets/css/template.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-0 border-bottom">
        <h1 class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">Bunglebuild S.L.</h1>

        <div>
            <b><?= $_SESSION['nombre'], " - ", $_SESSION['rol'], " - ", $_SESSION['fecha'] ?></b> <a href="/app/controllers/validar_login.php" class="btn btn-warning">LOGOUT</a>
        </div>

    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <?php echo $__env->make('menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    </nav>
    <main id="cuerpo">
        <?php echo $__env->yieldContent('cuerpo'); ?>
    </main>
    <footer class="py-3 my-4">

        <ul class="nav justify-content-center border-bottom pb-3 mb-3">
            <!--
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
            <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Privacy</a></li>
            -->
        </ul>
        <p class="text-center text-muted">© 2022 Ghenciu Nicolae Adrian</p>
    </footer>
</body>

</html><?php /**PATH C:\xampp\htdocs\PHP\Proyecto 1º Trimestre\app\views/_template.blade.php ENDPATH**/ ?>