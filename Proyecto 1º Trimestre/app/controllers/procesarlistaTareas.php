<?php
session_start();
include(__DIR__ . '/varios.php');
include('../models/Tareas.php');
include('../models/conx_bd.php');
include('../libreria/creaTable.php');

$nombreCampos = [
    'id', 'nif_cif', 'nombre', 'descripcion', 'poblacion',
    'estado', 'fecha_creacion', 'operario_encargado', 'fecha_realizacion',
];

$tamanioPagina = 8;

/**
 * Comprobar si se ha enviado por parametro el valor de la página a mostrar
 */

if (isset($_GET['pagina'])) {

    if ($_GET['pagina'] == 1) {

        header('location:procesarListaTareas.php');
    } else {

        $pagina = $_GET['pagina'];
    }
} else {

    $pagina = 1;
}


$numFilas = Tareas::getNumeroTareas();
$totalPaginas = ceil($numFilas / $tamanioPagina);

/**
 * Comprobar si se ha enviado el valor de la página por el buscador
 */
if (isset($_GET['numPag'])) {

    if ($_GET['numPag'] > 0 && $_GET['numPag'] <= $totalPaginas) {
        $pagina = $_GET['numPag'];
    }
}

$empezarDesde = ($pagina - 1) * $tamanioPagina;

//$registro = Tareas::getTareasPorPagina($empezarDesde, $tamanioPagina);

$listaValores = [];

echo $blade->render('listaTareas', [
    'tareas' => Tareas::getTareasPorPagina($empezarDesde, $tamanioPagina),
    'nombreCampos' => $nombreCampos,
    'empezarDesde' => $empezarDesde,
    'tamanioPagina' => $tamanioPagina,
    'pagina' => $pagina,
    'totalPaginas' => $totalPaginas

]);
