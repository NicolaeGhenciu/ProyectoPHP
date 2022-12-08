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
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>NIF/CIF</th>
            <th>Nombre</th>
            <th>Apellidos</th>
            <th>Teléfono</th>
            <th>Descripción</th>
            <th>Email</th>
            <th>Dirección</th>
            <th>Población</th>
            <th>Código Postal</th>
            <th>Provincias</th>
            <th>Estado</th>
            <th>Fecha de Creacion</th>
            <th>Operario Encargado</th>
            <th>Fecha de Realizacion</th>
            <th>Anotaciones Anteriores</th>
            <th>Anotaciones Posteriores</th>
            <th>Fichero Resumen</th>
            <th>Foto Trabajo</th>
        </tr>
        <tr>
            <td><?= $datosTarea['id'] ?></td>
            <td><?= $datosTarea['nif_cif'] ?></td>
            <td><?= $datosTarea['nombre'] ?></td>
            <td><?= $datosTarea['apellidos'] ?></td>
            <td><?= $datosTarea['telefono'] ?></td>
            <td><?= $datosTarea['descripcion'] ?></td>
            <td><?= $datosTarea['email'] ?></td>
            <td><?= $datosTarea['direccion'] ?></td>
            <td><?= $datosTarea['poblacion'] ?></td>
            <td><?= $datosTarea['codigo_postal'] ?></td>
            <td><?= $datosTarea['provincias'] ?></td>
            <td><?= $datosTarea['estado'] ?></td>
            <td><?= $datosTarea['fecha_creacion'] ?></td>
            <td><?= $datosTarea['operario_encargado'] ?></td>
            <td><?= $datosTarea['fecha_realizacion'] ?></td>
            <td><?= $datosTarea['anotaciones_anteriores'] ?></td>
            <td><?= $datosTarea['anotaciones_posteriores'] ?></td>
            <td><?= ($datosTarea['fichero_resumen'] != "") ? "<a class='btn btn-warning' href='/Files/" . $datosTarea['fichero_resumen'] . "' download='" . $datosTarea['fichero_resumen'] . "'>Descargar</a>" : "" ?> </td>
            <td><?= ($datosTarea['foto_trabajo'] != "") ? "<a class='btn btn-warning' href='/Files/" . $datosTarea['foto_trabajo'] . "' download='" . $datosTarea['foto_trabajo'] . "'>Descargar</a>" : "" ?> </td>
        </tr>
    </table>
    <a class="btn btn-info" href="..//controllers/procesarlistaTareas.php">Volver atras</a>
    <?php $__env->stopSection(); ?>
</body>

</html>
<?php echo $__env->make('_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Proyecto 1º Trimestre\app\views/verDetalles.blade.php ENDPATH**/ ?>