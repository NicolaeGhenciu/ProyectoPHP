<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    @extends('_template')
    @section('cuerpo')
    <h1>Flitrando</h1>
    <form action="">

        <?= CreaSelect('provincias', Provincias::listaParaSelect(), filter_input(INPUT_POST, 'provincias')) ?>
        <br>

        <?= CreaSelect('operario_encargado', Usuarios::listaParaSelect(), filter_input(INPUT_POST, 'operario_encargado')) ?>
        <br>

        <select class="form-select" name="estado">
            <option value="B">B=Esperando ser aprobada</option>
            <option value="P">P=Pendiente</option>
            <option value="R">R=Realizada</option>
            <option value="C">C=Cancelada</option>
        </select> <br>

    </form>
    @endsection
</body>

</html>