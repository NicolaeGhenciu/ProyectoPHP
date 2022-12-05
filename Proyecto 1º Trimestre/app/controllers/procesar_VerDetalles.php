<?php

include("../models/Tareas.php");
include("../models/conx_bd.php");
include("../libreria/creaTable.php");
include("../libreria/getContenido.php");

$id = $_GET["id"];

$datosTarea = Tareas::getdatosTarea($id);

include("../views/verDetalles.php");

