<?php

include("varios.php");
include("../models/Tareas.php");
include("../models/conx_bd.php");

$id = $_GET['id'];

Tareas::borrarTarea($id);

header ("location:procesarListaTareas.php");
