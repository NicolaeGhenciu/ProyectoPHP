<!DOCTYPE html>
<html lang="en">

<head>
    <title>Document</title>
    <link rel="stylesheet" href="../../Assets/css/formulario.css">
</head>

<body>
    
    <?php $__env->startSection('cuerpo'); ?>
    <h3>Añadir un Usuario</h3>
    <form action="/app/controllers/añadirUsuario.php" action="post">
        <label>NIF/CIF:</label>
        <input class="form-control" type="text" name="">
        <br>
        <label>Nombre:</label>
        <input class="form-control" type="text" name="">
        <br>
        <label>Contraseña</label>
        <input class="form-control" type="text" name="">
        <br>
        <label>Email</label>
        <input class="form-control" type="text" name="">
        <br>
        <label>Télefono</label>
        <input class="form-control" type="text" name="">
        <br>
        <label>¿Es Admin?</label>
        <div>
            <span>SI </span><input type="radio" id="es_admin" name="es_admin" value="1">
            <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</span>
            <span>NO </span><input type="radio" id="es_admin" name="es_admin" value="0">
        </div>
        <br>
        <button class="btn btn-primary mb-3" type="submit">Enviar</button>
    </form>


    <?php $__env->stopSection(); ?>
</body>

</html>
<?php echo $__env->make('_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Proyecto 1º Trimestre\app\views/añadirUsuario.blade.php ENDPATH**/ ?>