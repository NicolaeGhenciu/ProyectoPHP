<?php

include("../models/Tareas.php");
include("../models/conx_bd.php");
include("../libreria/creaTable.php");
include("../libreria/getContenido.php");
include("../controllers/varios.php");

$id = $_GET["id"];

$datosTarea = Tareas::getdatosTarea($id);

echo $blade->render('verDetalles',[
    'datosTarea' => $datosTarea,
]);


