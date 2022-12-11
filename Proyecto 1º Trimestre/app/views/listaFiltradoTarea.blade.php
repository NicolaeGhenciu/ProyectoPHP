<!DOCTYPE html>
<html lang="en">

<head>
    <title>Lista de Tareas Pendientes</title>
</head>

<body>
    @extends('_template')
    @section('cuerpo')

    <?= creaTable('tareasfiltrado', $nombreCampos, $tareas, "id") ?>

    <a href="?pagina=1" class="btn btn-dark" role='button'>Primera</a>

    <a href="?pagina=<?= ($pagina == 1) ? $pagina : $pagina - 1 ?>" class="btn btn-dark" role='button'>Anterior</a>

    <span>Página <?= $pagina ?></span>

    <a href="?pagina=<?= ($pagina == $totalPaginas) ? $pagina : $pagina + 1 ?>" class="btn btn-dark" role='button'>Siguiente</a>

    <a href="?pagina=<?= $totalPaginas ?>" class="btn btn-dark" role='button'>Última</a>

    <span>Nº páginas: <?= $totalPaginas ?></span>

    <br> <br>
    <div class="input-group mb-3">
        <form action="/app/controllers/procesarFormularioFiltrado.php" method="get">
            <div class="input-group mb-3">
                <div id="input_container"><input type="text" name="numPag" class="form-control"></div>
                <div class="input-group-append">
                    <button class="btn btn-dark">Ir a página</button>
                </div>
            </div>
        </form>
    </div>
    @endsection
</body>

</html>