<!DOCTYPE html>
<html lang="en">

<head>
    <title>Modificar</title>
    <link rel="stylesheet" href="../../Assets/css/formulario.css">
</head>

<body>
    

    <?php $__env->startSection('cuerpo'); ?>

    <h4>Datos</h4>
    <table class="table table-bordered">
        <tr>
            <th>NIF</th>
            <th>Nombre</th>
            <th>Contraseña</th>
            <th>Correo</th>
            <th>Teléfono</th>
        </tr>
        <tr>
            <td><?= $datosUsuario['nif'] ?></td>
            <td><?= $datosUsuario['nombre'] ?></td>
            <td><?= $datosUsuario['clave'] ?></td>
            <td><?= $datosUsuario['correo'] ?></td>
            <td><?= $datosUsuario['telefono'] ?></td>
        </tr>
    </table>
 
    <h3>Modificaciones</h3>
    <form action='/app/controllers/procesarModificarUsuario.php?nif=<?= $nif ?>' method="post" enctype="multipart/form-data">

        <label>Correo electrónico: </label>
        <input class="form-control" type="text" name="correo" value="<?= isset($datosUsuario["correo"]) ? $datosUsuario["correo"] : ValorPost('correo') ?>">
        <?= VerError('correo') ?> <br>

        <label>Contraseña: </label>
        <input class="form-control" type="text" name="clave" value="<?= isset($datosUsuario["clave"]) ? $datosUsuario["clave"] : ValorPost('clave') ?>">
        <?= VerError('clave') ?> <br>

        <button class="btn btn-primary mb-3" type="submit">Enviar</button>
    </form>
    <a class="btn btn-info" href="/app/controllers/procesarlistaUsuarios.php"><i class="fa-solid fa-arrow-turn-down-left"></i>Volver atras</a>
    <?php $__env->stopSection(); ?>
</body>

</html>
<?php echo $__env->make('_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Proyecto 1º Trimestre\app\views/formularioModificarUsuario.blade.php ENDPATH**/ ?>