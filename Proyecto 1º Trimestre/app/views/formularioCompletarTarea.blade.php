<!DOCTYPE html>
<html lang="en">

<head>
    <title>Completar Tarea</title>
    <link rel="stylesheet" href="../../Assets/css/formulario.css">
</head>

<body>

    @extends('_template')
    @section('cuerpo')

    <h1>Completar tarea</h1>

    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>NIF/CIF</th>
            <th>Nombre</th>
            <th>Descripción</th>
            <th>Población</th>
            <th>Estado</th>
            <th>Fecha de Creacion</th>
            <th>Operario Encargado</th>
            <th>Fecha de Realizacion</th>
        </tr>
        <tr>
            <td><?= $datosTarea['id'] ?></td>
            <td><?= $datosTarea['nif_cif'] ?></td>
            <td><?= $datosTarea['nombre'] ?></td>
            <td><?= $datosTarea['descripcion'] ?></td>
            <td><?= $datosTarea['poblacion'] ?></td>
            <td><?= $datosTarea['estado'] ?></td>
            <td><?= $datosTarea['fecha_creacion'] ?></td>
            <td><?= $datosTarea['operario_encargado'] ?></td>
            <td><?= $datosTarea['fecha_realizacion'] ?></td>
        </tr>
    </table>

    <form action="../controllers/procesarCompletarTarea.php?id=<?= $id ?>" method='post' enctype="multipart/form-data">

        <select class="form-select" name="estado">
            <option value="B" <?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'B' ? 'selected' : '' ?>>B=Esperando ser aprobada</option>
            <option value="P" <?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'P' ? 'selected' : '' ?>>P=Pendiente</option>
            <option value="R" <?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'R' ? 'selected' : '' ?>>R=Realizada</option>
            <option value="C" <?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'C' ? 'selected' : '' ?>>C=Cancelada</option>
        </select> <br>

        <label for="" class="form-label">Anotaciones anteriores</label>
        <textarea class="form-control" name="anotaciones_anteriores" rows="2" cols="50"><?= isset($datosTarea["anotaciones_anteriores"]) ? $datosTarea["anotaciones_anteriores"] : "" ?></textarea>
        <?= VerError('anotaciones_anteriores') ?>
        <br><br>
        <label for="" class="form-label">Anotaciones posteriores</label>
        <textarea class="form-control" name="anotaciones_posteriores" rows="2" cols="50"><?= isset($datosTarea["anotaciones_posteriores"]) ? $datosTarea["anotaciones_posteriores"] : "" ?></textarea>
        <?= VerError('anotaciones_posteriores') ?>
        <br><br>
        <label for="" class="form-label">Subir archivo</label>
        <input class="form-control" type="file" name="fichero_resumen"><br><br>

        <label for="" class="form-label">Subir fotos</label>
        <input class="form-control" type="file" name="foto_trabajo"><br><br>

        <button class="btn btn-success">Completar tarea</button>


    </form>

    @endsection

</body>

</html>