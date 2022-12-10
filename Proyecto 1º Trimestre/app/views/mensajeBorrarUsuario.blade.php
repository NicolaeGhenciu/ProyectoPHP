<!DOCTYPE html>
<html lang="en">

<head>
    <title>Borrar Usuario</title>
</head>

<body>
    @extends('_template')

    @section('cuerpo')

    <h3>¿Estas seguro de querer borrar el Usuario <?= $_GET['nif'] ?> ?</h3>
    <a class="btn btn-danger" href="/app/controllers/controlador_borrar.php?nif=<?= $_GET['nif'] ?>">Si</a>
    <a class="btn btn-warning" href="/app/controllers/procesarlistaUsuarios.php">No</a>

    @endsection
</body>

</html>