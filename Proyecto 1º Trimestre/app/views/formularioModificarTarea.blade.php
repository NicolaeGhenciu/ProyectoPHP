<!DOCTYPE html>
<html lang="en">

<head>
    <title>Modificar</title>
    <link rel="stylesheet" href="../../Assets/css/formulario.css">
</head>

<body>
    @extends('_template')

    @section('cuerpo')
    <form action='/app/controllers/validar_modficiacion_tarea.php?id=<?= $id ?>' method="post" enctype="multipart/form-data">
        <h3>Modificaciones Tarea</h3>
        <label>NIF o CIF:</label>
        <input class="form-control" type="text" name="nif_cif" value="<?= isset($datosTarea["nif_cif"]) ? $datosTarea["nif_cif"] : ValorPost('nif_cif') ?>">
        <?= VerError('nif_cif') ?> <br>
        <label>Persona de contacto :</label> <br>
        <label>Nombre: </label>
        <input class="form-control" type="text" name="nombre" value="<?= isset($datosTarea["nombre"]) ? $datosTarea["nombre"] : ValorPost('nombre') ?>">
        <?= VerError('nombre') ?> <br>
        <label>Apellidos: </label>
        <input class="form-control" type="text" name="apellidos" value="<?= isset($datosTarea["apellidos"]) ? $datosTarea["apellidos"] : ValorPost('apellidos') ?>">
        <?= VerError('apellidos') ?> <br>
        <label>Teléfono: </label>
        <input class="form-control" type="text" name="telefono" value="<?= isset($datosTarea["telefono"]) ? $datosTarea["telefono"] : ValorPost('telefono') ?>">
        <?= VerError('telefono') ?> <br>
        <label>Descripción: </label> <br>
        <textarea class="form-control" name="descripcion" cols="30" rows="3"><?= isset($datosTarea["descripcion"]) ? $datosTarea["descripcion"] : ValorPost('descripcion') ?></textarea>
        <?= VerError('descripcion') ?> <br>
        <label>Correo electrónico: </label>
        <input class="form-control" type="text" name="email" value="<?= isset($datosTarea["email"]) ? $datosTarea["email"] : ValorPost('email') ?>">
        <?= VerError('email') ?> <br>
        <label>Dirección: </label>
        <input class="form-control" type="text" name="direccion" value="<?= isset($datosTarea["direccion"]) ? $datosTarea["direccion"] : ValorPost('direccion') ?>"> <br>
        <label>Población: </label>
        <input class="form-control" type="text" name="poblacion" value="<?= isset($datosTarea["poblacion"]) ? $datosTarea["poblacion"] : ValorPost('poblacion') ?>"> <br>
        <label>Codigo Postal: </label>
        <input class="form-control" type="text" name="codigo_postal" value="<?= isset($datosTarea["codigo_postal"]) ? $datosTarea["codigo_postal"] : ValorPost('codigo_postal') ?>">
        <?= VerError('codigo_postal') ?> <br>
        <label>Provincia: </label>
        <?= CreaSelect('provincias', Provincias::listaParaSelect(), (isset($datosTarea["provincias"]) ? $datosTarea["provincias"] : ValorPost('provincias')), filter_input(INPUT_POST, 'provincias')) ?>
        <br>
        <label>Estado: </label>
        <select class="form-select" name="estado">
            <option value="B" <?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'B' ? 'selected' : '' ?>>B=Esperando ser aprobada</option>
            <option value="P" <?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'P' ? 'selected' : '' ?>>P=Pendiente</option>
            <option value="R" <?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'R' ? 'selected' : '' ?>>R=Realizada</option>
            <option value="C" <?= (isset($datosTarea["estado"]) ? $datosTarea["estado"] : ValorPost('estado')) == 'C' ? 'selected' : '' ?>>C=Cancelada</option>
        </select> <br>
        <label>Fecha de creación de la tarea: </label>
        <input class="form-control" type="date" name="fecha_creacion" value="<?= isset($datosTarea["fecha_creacion"]) ? $datosTarea["fecha_creacion"] : ValorPost('fecha_creacion') ?>"> <br>
        <label>Operario encargado: </label>
        <?= CreaSelect('operario_encargado', Usuarios::listaParaSelect(), (isset($datosTarea["operario_encargado"]) ? $datosTarea["operario_encargado"] : ValorPost('operario_encargado')), filter_input(INPUT_POST, 'operario_encargado')) ?>
        <br>
        <label>Fecha de realización: </label>
        <input class="form-control" type="date" name="fecha_realizacion" value="<?= isset($datosTarea["fecha_realizacion"]) ? $datosTarea["fecha_realizacion"] : ValorPost('fecha_realizacion') ?>">
        <br>
        <label>Anotaciones anteriores: </label> <br>
        <textarea class="form-control" name="anotaciones_anteriores" cols="30" rows="3"><?= isset($datosTarea["anotaciones_anteriores"]) ? $datosTarea["anotaciones_anteriores"] : ValorPost('anotaciones_anteriores') ?></textarea> <br>
        <label>Anotaciones posteriores: </label> <br>
        <textarea class="form-control" name="anotaciones_posteriores" cols="30" rows="3"><?= isset($datosTarea["anotaciones_posteriores"]) ? $datosTarea["anotaciones_posteriores"] : ValorPost('anotaciones_posteriores') ?></textarea> <br>
        <label>Fichero resumen: </label> <br>
        <input class="form-control" name="fichero_resumen" type="file" value=""> <br>
        <label>Fotos del trabajo realizado: </label> <br>
        <input class="form-control" name="foto_trabajo" type="file"> <br>
        <button class="btn btn-primary mb-3" type="submit">Enviar</button>
    </form>
    @endsection
</body>

</html>