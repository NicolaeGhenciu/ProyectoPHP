<!DOCTYPE html>
<html lang="en">

<head>
    <title>Borrar Tarea</title>
</head>

<body>
    @extends('_template')

    @section('cuerpo')

    <h3>¿Estas seguro de querer borrar la tarea <?= $_GET['id'] ?> ?</h3>
    <a class="btn btn-danger" href="/app/controllers/controlador_borrar.php?id=<?= $_GET['id'] ?>">Si</a>
    <a class="btn btn-warning" href="/app/controllers/procesarlistaTareas.php">No</a>

    @endsection
</body>

</html>