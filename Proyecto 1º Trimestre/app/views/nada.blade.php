<!DOCTYPE html>
<html lang="en">

<head>
    <title>Menu</title>
</head>

<body>

    @extends('_template')

    @section('cuerpo')
    <br>
    <br>

    <h1 style="color: #00BFFF;">Bienvenido <?= $_SESSION['nombre'] ?></h1>
    <img src="/Assets/img/grua.jpg">
    @endsection
</body>

</html>