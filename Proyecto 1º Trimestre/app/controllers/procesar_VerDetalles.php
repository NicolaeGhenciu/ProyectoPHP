<?php

include(__DIR__ . "/../controllers/varios.php");

include(__DIR__ . "/../models/Tareas.php");
include(__DIR__ . "/../models/conx_bd.php");

include(__DIR__ . "/../libreria/creaTable.php");
include(__DIR__ . "/../libreria/getContenido.php");

session_start();

if ($_SESSION['rol'] == "Administrador" && $_SESSION['rol'] == "Operario") {

    $id = $_GET["id"]; //recogemos la id

    $datosTarea = Tareas::getdatosTarea($id); // con la id cogemos todos los datos de la tarea

    echo $blade->render('verDetalles', [ //renderizamos y enviamos todos los datos de la tarea a la vista
        'datosTarea' => $datosTarea,
    ]);
}
