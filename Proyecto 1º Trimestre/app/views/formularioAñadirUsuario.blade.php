<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link rel="stylesheet" href="../../Assets/css/formulario.css">
</head>

<body>
    @extends('_template')
    @section('cuerpo')
    <h3>Añadir un Usuario</h3>
    <form action="/app/controllers/añadirUsuario.php" method="post">
        <label>NIF:</label>
        <input class="form-control" type="text" name="nif" value="<?= ValorPost('nif') ?>">
        <?= VerError('nif') ?> <br>
        <br>
        <label>Nombre y Apellidos:</label>
        <input class="form-control" type="text" name="nombre" value="<?= ValorPost('nombre') ?>">
        <?= VerError('nombre') ?> <br>
        <br>
        <label>Contraseña</label>
        <input class="form-control" type="text" name="clave" value="<?= ValorPost('clave') ?>">
        <?= VerError('clave') ?>
        <label>Email</label>
        <input class="form-control" type="text" name="correo" value="<?= ValorPost('correo') ?>">
        <?= VerError('correo') ?> <br>
        <br>
        <label>Télefono</label>
        <input class="form-control" type="text" name="telefono" value="<?= ValorPost('telefono') ?>">
        <?= VerError('telefono') ?> <br>
        <br>
        <label>¿Es Admin?</label>
        <div>
            <span>SI </span><input class="form-check-input" type="radio" id="es_admin" name="es_admin" value="1" <?= ValorPost('es_admin') == 1 ? 'checked' : '' ?>>
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span>NO </span><input class="form-check-input" type="radio" id="es_admin" name="es_admin" value="0" <?= ValorPost('es_admin') == 0 ? 'checked' : '' ?>>
        </div>
        <?= VerError('es_admin') ?> <br>
        <button class="btn btn-success">Añadir Usuario</button>
    </form>


    @endsection
</body>

</html>