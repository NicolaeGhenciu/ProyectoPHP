<!DOCTYPE html>
<html lang="en">

<head>
    <title>Borrar Tarea</title>
</head>

<body>
    

    <?php $__env->startSection('cuerpo'); ?>

    <h3>¿Estas seguro de querer borrar la tarea <?= $_GET['id'] ?> ?</h3>
    <a class="btn btn-danger" href="/app/controllers/controlador_borrar.php?id=<?= $_GET['id'] ?>">Si</a>
    <a class="btn btn-warning" href="/app/controllers/procesarlistaTareas.php">No</a>

    <?php $__env->stopSection(); ?>
</body>

</html>
<?php echo $__env->make('_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Proyecto 1º Trimestre\app\views/mensajeBorrarTarea.blade.php ENDPATH**/ ?>