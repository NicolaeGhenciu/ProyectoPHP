<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    

    <?php $__env->startSection('cuerpo'); ?>

    <h3>¿Estas seguro de querer borrar la tarea <?= $_GET['id'] ?> ?</h3>
    <a href="/app/controllers/controlador_borrar.php?id=<?= $_GET['id'] ?>">Si</a>
    <a href="/app/controllers/procesarlistaTareas.php">No</a>

    <?php $__env->stopSection(); ?>
</body>

</html>
<?php echo $__env->make('_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Proyecto 1º Trimestre\app\views/mensajeBorrarTarea.blade.php ENDPATH**/ ?>