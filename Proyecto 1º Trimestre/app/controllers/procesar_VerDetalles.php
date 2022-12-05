<?php

include("../models/Tareas.php");
include("../models/conx_bd.php");
include("../libreria/creaTable.php");
include("../libreria/getContenido.php");

$id = $_GET["id"];

$datosTarea = Tareas::getdatosTarea($id);

$datos = getContenido($datosTarea,false);

//include("../views/verDetalles.php");



