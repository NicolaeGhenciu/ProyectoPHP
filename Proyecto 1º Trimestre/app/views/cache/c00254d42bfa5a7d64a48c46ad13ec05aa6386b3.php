<!DOCTYPE html>
<html lang="en">

<head>
    <title>Insertar Tarea</title>
    <link rel="stylesheet" href="../../Assets/css/formulario.css">
</head>

<body>
    

    <?php $__env->startSection('cuerpo'); ?>
    <form action="/app/controllers/insertar_tarea.php" method="post" enctype="multipart/form-data">
        <h3>Formulario Tarea</h3>
        <label>NIF o CIF:</label>
        <input class="form-control" type="text" name="nif_cif" value="<?= ValorPost('nif_cif') ?>">
        <?= VerError('nif_cif') ?> <br>
        <label>Persona de contacto :</label> <br>
        <label>Nombre: </label>
        <input class="form-control" type="text" name="nombre" value="<?= ValorPost('nombre') ?>">
        <?= VerError('nombre') ?> <br>
        <label>Apellidos: </label>
        <input class="form-control" type="text" name="apellidos" value="<?= ValorPost('apellidos') ?>">
        <?= VerError('apellidos') ?> <br>
        <label>Teléfono: </label>
        <input class="form-control" type="text" name="telefono" value="<?= ValorPost('telefono') ?>">
        <?= VerError('telefono') ?> <br>
        <label>Descripción: </label> <br>
        <textarea class="form-control" name="descripcion" cols="30" rows="3"><?= ValorPost('descripcion') ?></textarea>
        <?= VerError('descripcion') ?> <br>
        <label>Correo electrónico: </label>
        <input class="form-control" type="text" name="email" value="<?= ValorPost('email') ?>">
        <?= VerError('email') ?> <br>
        <label>Dirección: </label>
        <input class="form-control" type="text" name="direccion" value="<?= ValorPost('direccion') ?>"> <br>
        <?= VerError('direccion') ?> <br>
        <label>Población: </label>
        <input class="form-control" type="text" name="poblacion" value="<?= ValorPost('poblacion') ?>"> <br>
        <?= VerError('poblacion') ?> <br>
        <label>Codigo Postal: </label>
        <input class="form-control" type="text" name="codigo_postal" value="<?= ValorPost('codigo_postal') ?>">
        <?= VerError('codigo_postal') ?> <br>
        <label>Provincia: </label>
        <?= CreaSelect('provincias', Provincias::listaParaSelect(), filter_input(INPUT_POST, 'provincias')) ?>
        <br>
        <label>Estado: </label>
        <select class="form-select" name="estado">
            <option value="B">B=Esperando ser aprobada</option>
            <option value="P">P=Pendiente</option>
            <option value="R">R=Realizada</option>
            <option value="C">C=Cancelada</option>
        </select> <br>
        <label>Operario encargado: </label>
        <?= CreaSelect('operario_encargado', Usuarios::listaParaSelect(), filter_input(INPUT_POST, 'operario_encargado')) ?>
        <br>
        <label>Fecha de realización: </label>
        <input class="form-control" type="date" name="fecha_realizacion" value="<?= ValorPost('fecha_realizacion') ?>">
        <?= VerError('fecha_realizacion') ?> <br>
        <button class="btn btn-primary mb-3" type="submit">Enviar</button>
    </form>
    <?php $__env->stopSection(); ?>
</body>

</html>
<?php echo $__env->make('_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Proyecto 1º Trimestre\app\views/formulario_tarea.blade.php ENDPATH**/ ?>