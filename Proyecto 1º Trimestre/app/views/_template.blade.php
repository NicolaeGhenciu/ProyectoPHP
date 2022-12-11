<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/526f5e2cea.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/Assets/css/template.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-0 border-bottom">
        <h1 class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none">Bunglebuild S.L.&nbsp;&nbsp;<img id="logo" src="/Assets/img/logo.jpg"></h1>

        <div>
            <b><?= $_SESSION['nombre'], " - ", $_SESSION['rol'], ' ', ($_SESSION['rol'] == 'Operario' ? '<i class="fa-sharp fa-solid fa-gavel"></i>' : '<i class="fa-solid fa-chess-king"></i>'), " - ", $_SESSION['fecha'] ?></b> <a href="/app/controllers/validar_login.php" class="btn btn-warning"><i class="fa-sharp fa-solid fa-right-from-bracket"></i> LOGOUT</a>
        </div>

    </header>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        @include('menu')
    </nav>

    <main id="cuerpo">
        @yield('cuerpo')
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

</html>