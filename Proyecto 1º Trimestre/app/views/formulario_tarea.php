<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

    <link rel="stylesheet" href="../../Assets/css/formulario.css">

    <title>Formulario</title>
</head>

<body>
    <form action="../controllers/validar_tarea.php" method="post" enctype="multipart/form-data">
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
        <input class="form-control" type="text" name="direccion"> <br>
        <label>Población: </label>
        <input class="form-control" type="text" name="poblacion"> <br>
        <label>Codigo Postal: </label>
        <input class="form-control" type="text" name="codigo_postal" value="<?= ValorPost('codigo_postal') ?>">
        <?= VerError('codigo_postal') ?> <br>
        <label>Provincia: </label>
        <?= CreaSelect('provincias', Provincias::listaParaSelect(), filter_input(INPUT_POST, 'provincias')) ?>
        <br>
        <label>Estado: </label>
        <select class="form-select" name="estado">
            <option hidden selected>Selecciona un estado</option>
            <option value="B">B=Esperando ser aprobada</option>
            <option value="P">P=Pendiente</option>
            <option value="R">R=Realizada</option>
            <option value="C">C=Cancelada</option>
        </select> <br>
        <label>Fecha de creación de la tarea: </label>
        <input class="form-control" type="date" name="fecha_creacion" readonly value="<?= $fcha ?>"> <br>
        <label>Operario encargado: </label>
        <?= CreaSelect('operario_encargado', Usuarios::listaParaSelect(), filter_input(INPUT_POST, 'operario_encargado')) ?>
        <br>
        <label>Fecha de realización: </label>
        <input class="form-control" type="date" name="fecha_realizacion" value="<?= ValorPost('fecha_realizacion') ?>">
        <?= VerError('fecha_realizacion') ?> <br>
        <label>Anotaciones anteriores: </label> <br>
        <textarea class="form-control" name="anotaciones_anteriores" cols="30" rows="3"></textarea> <br>
        <label>Anotaciones posteriores: </label> <br>
        <textarea class="form-control" name="anotaciones_posteriores" cols="30" rows="3"></textarea> <br>
        <label>Fichero resumen: </label> <br>
        <input class="form-control" name="fichero_resumen" type="file"> <br>
        <label>Fotos del trabajo realizado: </label> <br>
        <input class="form-control" name="foto_trabajo" type="file"> <br>
        <button class="btn btn-primary mb-3" type="submit">Enviar</button>
    </form>
</body>

</html>