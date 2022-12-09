<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lista de Tareas</title>
</head>

<body>
    @extends('_template')
    @section('cuerpo')

    <?= creaTable('listaTareas', $nombreCampos, $tareas) ?>

    <a href="?pagina=1" class="btn btn-dark" role='button'>Primera</a>

    <a href="?pagina=<?= ($pagina == 1) ? $pagina : $pagina - 1 ?>" class="btn btn-dark" role='button'>Anterior</a>

    <span>Página <?= $pagina ?></span>

    <a href="?pagina=<?= ($pagina == $totalPaginas) ? $pagina : $pagina + 1 ?>" class="btn btn-dark" role='button'>Siguente</a>

    <a href="?pagina=<?= $totalPaginas ?>" class="btn btn-dark" role='button'>Última</a>

    <span>Nº páginas: <?= $totalPaginas ?></span>

    <br> <br>

    <form action="../controllers/procesarListaTareas.php" method="get">
        <div class="input-group mb-3">
            <div id="input_container"><input type="text" name="numPag" class="form-control"></div>
            <div class="input-group-append">
                <button class="btn btn-dark">Ir a página</button>
            </div>
        </div>
    </form>
    @endsection
</body>

</html>