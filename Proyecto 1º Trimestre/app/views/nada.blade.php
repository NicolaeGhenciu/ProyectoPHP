<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    @extends('_template')

    @section('usuario')
    <div>
    <b><?= $usuario ?></b> <a href="" class="btn btn-warning">LOGOUT</a>
    </div>
    @endsection


    @section('cuerpo')

    @endsection
</body>

</html>