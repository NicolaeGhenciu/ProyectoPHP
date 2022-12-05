<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="../../Assets/css/menu.css">

</head>
@extends('_template')

@section('cuerpo')
<body>
    <h2>Menu</h2>
    <div>
        <input type="button" class="btn btn-primary" value="Ver lista de incidencias/tareas"> <br>
        <input type="button" class="btn btn-primary" value="Añadir una nueva incidencia/tarea"> <br>
        <input type="button" class="btn btn-primary" value="Modificar datos de una incidencia/tarea"> <br>
        <input type="button" class="btn btn-primary" value="Eliminar una tarea"> <br>
        <input type="button" class="btn btn-primary" value="Cambiar el estado de una incidencia/tarea"> <br>
        <input type="button" class="btn btn-primary" value="Buscar tarea"> <br>
    </div>
</body>
@endsection

</html>