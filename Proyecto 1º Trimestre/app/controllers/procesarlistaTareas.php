<?php

include('../models/Tareas.php');
include('../models/conx_bd.php');
include('../libreria/creaTable.php');

$nombreCampos = [
    'id', 'nif_cif', 'nombre', 'apellidos', 'descripcion', 'poblacion',
    'estado', 'fecha_creacion', 'operario_encargado', 'fecha_realizacion',
];

$tamanioPagina = 10;

if (isset($_GET['pagina'])) {

    if ($_GET['pagina'] == 1) {

        header('location:procesarlistaTareas.php');
    } else {

        $pagina = $_GET['pagina'];
    }
} else {

    $pagina = 1;
}

$empezarDesde = ($pagina - 1) * $tamanioPagina;

$numFilas = Tareas::getNumeroTareas();
$totalPaginas = ceil($numFilas / $tamanioPagina);

$registro = Tareas::getTareasPorPagina($empezarDesde, $tamanioPagina);

include('../views/listaTareas.php');

if (isset($_GET['numPag'])) {

    if ($_GET['numPag'] < 1 || $_GET['numPag'] > $totalPaginas) {

        $url = "procesarlistaTareas.php?pagina=" . $pagina;
        
    } else {

        $url = "procesarlistaTareas.php?pagina=" . $_GET['numPag'];
    }

    header("Location:$url");
}
