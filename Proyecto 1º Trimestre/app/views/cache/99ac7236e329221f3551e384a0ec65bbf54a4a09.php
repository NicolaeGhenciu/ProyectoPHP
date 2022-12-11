<!DOCTYPE html>
<html lang="en">

<head>
    <title>Menu</title>
</head>

<body>

    

    <?php $__env->startSection('cuerpo'); ?>
    <br>
    <br>

    <h1 style="color: #00BFFF;">Bienvenido <?= $_SESSION['nombre'] ?></h1>
    <img src="/Assets/img/grua.jpg">
    <?php $__env->stopSection(); ?>
</body>

</html>
<?php echo $__env->make('_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Proyecto 1º Trimestre\app\views/nada.blade.php ENDPATH**/ ?>