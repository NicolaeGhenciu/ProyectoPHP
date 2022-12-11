<?php

include(__DIR__ . '/varios.php');

include(__DIR__ . '/../models/Tareas.php');
include(__DIR__ . '/../models/conx_bd.php');

include(__DIR__ . '/../libreria/creaTable.php');

session_start();

$nombreCampos = [ //nombre de los campos a mostrar
    'id', 'nif_cif', 'nombre', 'descripcion', 'poblacion',
    'estado', 'fecha_creacion', 'operario_encargado', 'fecha_realizacion',
];

$tamanioPagina = 5; //tamaño de la pagina


if (isset($_GET['pagina'])) { //Comprobamos si nos han enviado el parametro pagina

    if ($_GET['pagina'] == 1) {

        header('location:procesarListaTareasPendientes.php');
    } else {

        $pagina = $_GET['pagina'];
    }
} else {

    $pagina = 1;
}

$numFilas = Tareas::getNumeroTareasPendientes(); //numero de filas

$totalPaginas = ceil($numFilas / $tamanioPagina); //total de paginas que vamos a tener

//Comprobamos si por el buscador nos han enviado la variable numpag

if (isset($_GET['numPag'])) {

    if ($_GET['numPag'] > 0 && $_GET['numPag'] <= $totalPaginas) {
        $pagina = $_GET['numPag'];
    } else {
        $pagina = 1;
    }
}

$empezarDesde = ($pagina - 1) * $tamanioPagina; //desde donde vamos a empezar ej: multiplicamos 0 x 0 por lo tanto empezamos en 0

echo $blade->render('listaTareasPendientes', [ //renderizamos la lista de Tareas
    'tareas' => Tareas::getTareasPorPaginaPendietes($empezarDesde, $tamanioPagina),
    'nombreCampos' => $nombreCampos,
    'empezarDesde' => $empezarDesde,
    'tamanioPagina' => $tamanioPagina,
    'pagina' => $pagina,
    'totalPaginas' => $totalPaginas

]);
