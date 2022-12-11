<!DOCTYPE html>
<html lang="en">

<head>
    <title>Borrar Usuario</title>
</head>

<body>
    @extends('_template')

    @section('cuerpo')

    <h3>¿Estas seguro de querer borrar el Usuario <?= $_GET['nif'] ?> ?</h3>
    <a class="btn btn-danger" href="/app/controllers/controlador_borrar.php?nif=<?= $_GET['nif'] ?>"><i class="fa-solid fa-square-check"></i>Si</a>
    <a class="btn btn-success" href="/app/controllers/procesarlistaUsuarios.php"><i class="fa-sharp fa-solid fa-circle-xmark"></i>No</a>

    @endsection
</body>

</html>