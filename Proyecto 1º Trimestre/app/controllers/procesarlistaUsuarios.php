<?php
session_start();
include(__DIR__ . '/varios.php');
include('../models/Usuarios.php');
include('../models/conx_bd.php');
include('../libreria/creaTable.php');

$nombreCampos = [
    'nif', 'nombre', 'clave', 'correo', 'telefono',
    'es_admin',
];

$tamanioPagina = 8;

/**
 * Comprobar si se ha enviado por parametro el valor de la página a mostrar
 */
if (isset($_GET['pagina'])) {

    if ($_GET['pagina'] == 1) {

        header('location:procesarlistaUsuarios.php');
    } else {

        $pagina = $_GET['pagina'];
    }
} else {

    $pagina = 1;
}

$numFilas = Usuarios::getNumeroUsuarios();
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

$listaValores = [];


echo $blade->render('listaUsuarios', [
    'tareas' => Usuarios::getUsuariosPorPagina($empezarDesde, $tamanioPagina),
    'nombreCampos' => $nombreCampos,
    'empezarDesde' => $empezarDesde,
    'tamanioPagina' => $tamanioPagina,
    'pagina' => $pagina,
    'totalPaginas' => $totalPaginas

]);
