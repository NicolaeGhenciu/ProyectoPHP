<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    

    <?php $__env->startSection('usuario'); ?>
    <div>
    <b><?= $usuario ?></b> <a href="" class="btn btn-warning">LOGOUT</a>
    </div>
    <?php $__env->stopSection(); ?>


    <?php $__env->startSection('cuerpo'); ?>

    <?php $__env->stopSection(); ?>
</body>

</html>
<?php echo $__env->make('_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Proyecto 1º Trimestre\app\views/nada.blade.php ENDPATH**/ ?>