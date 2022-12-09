<!DOCTYPE html>
<html lang="en">

<head>
    <title>Ver Detalles</title>
</head>

<body>
    

    <?php $__env->startSection('cuerpo'); ?>

    <h2>Detalles</h2>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <td><?= $datosTarea['id'] ?></td>
        </tr>
        <tr>
            <th>NIF/CIF</th>
            <td><?= $datosTarea['nif_cif'] ?></td>
        </tr>
        <tr>
            <th>Nombre</th>
            <td><?= $datosTarea['nombre'] ?></td>
        </tr>
        <tr>
            <th>Apellidos</th>
            <td><?= $datosTarea['apellidos'] ?></td>
        </tr>
        <tr>
            <th>Teléfono</th>
            <td><?= $datosTarea['telefono'] ?></td>
        </tr>
        <tr>
            <th>Descripción</th>
            <td><?= $datosTarea['descripcion'] ?></td>
        </tr>
        <tr>
            <th>Email</th>
            <td><?= $datosTarea['email'] ?></td>
        </tr>
        <tr>
            <th>Dirección</th>
            <td><?= $datosTarea['direccion'] ?></td>
        </tr>
        <tr>
            <th>Población</th>
            <td><?= $datosTarea['poblacion'] ?></td>
        </tr>
        <tr>
            <th>Código Postal</th>
            <td><?= $datosTarea['codigo_postal'] ?></td>
        </tr>
        <tr>
            <th>Provincias</th>
            <td><?= $datosTarea['provincias'] ?></td>
        </tr>
        <tr>
            <th>Estado</th>
            <td><?= $datosTarea['estado'] ?></td>
        </tr>
        <tr>
            <th>Fecha de Creacion</th>
            <td><?= $datosTarea['fecha_creacion'] ?></td>
        </tr>
        <tr>
            <th>Operario Encargado</th>
            <td><?= $datosTarea['operario_encargado'] ?></td>
        </tr>
        <tr>
            <th>Fecha de Realizacion</th>
            <td><?= $datosTarea['fecha_realizacion'] ?></td>
        </tr>
        <tr>
            <th>Anotaciones Anteriores</th>
            <td><?= $datosTarea['anotaciones_anteriores'] ?></td>
        </tr>
        <tr>
            <th>Anotaciones Posteriores</th>
            <td><?= $datosTarea['anotaciones_posteriores'] ?></td>
        </tr>
        <tr>
            <th>Fichero Resumen</th>
            <td><?= ($datosTarea['fichero_resumen'] != "") ? "<a class='btn btn-warning' href='/Files/" . $datosTarea['fichero_resumen'] . "' download='" . $datosTarea['fichero_resumen'] . "'>Descargar</a>" : "" ?> </td>
        </tr>
        <tr>
            <th>Foto Trabajo</th>
            <td><?= ($datosTarea['foto_trabajo'] != "") ? "<a class='btn btn-warning' href='/Files/" . $datosTarea['foto_trabajo'] . "' download='" . $datosTarea['foto_trabajo'] . "'>Descargar</a>" : "" ?> </td>
        </tr>
    </table>
    <a class="btn btn-info" href="..//controllers/procesarlistaTareas.php">Volver atras</a>
    <?php $__env->stopSection(); ?>
</body>

</html>
<?php echo $__env->make('_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Proyecto 1º Trimestre\app\views/verDetalles.blade.php ENDPATH**/ ?>