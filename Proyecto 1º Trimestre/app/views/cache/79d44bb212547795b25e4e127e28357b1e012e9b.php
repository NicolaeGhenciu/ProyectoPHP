<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lista de Tareas Filtrando</title>
    <link rel="stylesheet" href="/Assets/css/filtrando.css">
</head>

<body>
    
    <?php $__env->startSection('cuerpo'); ?>
    <h1>Filtrando</h1>
    <form action="/app/controllers/procesarFormularioFiltrado.php" method="post">

        <table class="table table-bordered">
            <tr>
                <th>Campo</th>
                <th>Criterio</th>
                <th>Valor</th>
            </tr>
            <tr>
                <th>
                    <select class="form-select" name="campo1" id="">
                        <option value="nif_cif">NIF/CIF</option>
                        <option value="codigo_postal">Codigo Postal</option>
                        <option value="email">Email</option>
                    </select>
                </th>
                <th>
                    <select class="form-select" name="criterio1" id="">
                        <option value="=">=</option>
                        <option value="<">&lt;</option>
                        <option value=">">></option>
                    </select>
                </th>
                <th>
                    <input class="form-control" type="text" name="valor1">
                </th>
            </tr>
            <tr>
                <td>
                    <select class="form-select" name="campo2" id="">
                        <option value="nif_cif">NIF/CIF</option>
                        <option value="codigo_postal">Codigo Postal</option>
                        <option value="email">Email</option>
                    </select>
                </td>
                <td>
                    <select name="criterio2" class="form-select" id="">
                        <option value="=">=</option>
                        <option value="<">&lt;</option>
                        <option value=">">></option>
                    </select>
                </td>
                <td>
                    <input class="form-control" type="text" name="valor2">
                </td>
            </tr>
            <tr>
                <td>
                    <select class="form-select" name="campo3" id="">
                        <option value="nif_cif">NIF/CIF</option>
                        <option value="codigo_postal">Codigo Postal</option>
                        <option value="email">Email</option>
                    </select>
                </td>
                <td>
                    <select name="criterio3" class="form-select" id="">
                        <option value="=">=</option>
                        <option value="<">&lt;</option>
                        <option value=">">></option>
                    </select>
                </td>
                <td>
                    <input class="form-control" type="text" name="valor3">
                </td>
            </tr>
        </table>
        <button class="btn btn-primary mb-3" type="submit">Enviar</button>
    </form>
    <?php $__env->stopSection(); ?>
</body>

</html>
<?php echo $__env->make('_template', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\PHP\Proyecto 1º Trimestre\app\views/formularioFiltrado.blade.php ENDPATH**/ ?>