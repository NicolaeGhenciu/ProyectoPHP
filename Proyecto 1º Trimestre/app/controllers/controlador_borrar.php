<?php
session_start();
include("varios.php");
include("../models/Tareas.php");
include("../models/Usuarios.php");
include("../models/conx_bd.php");



if (isset($_GET['id'])) {
    $id = $_GET['id'];

    Tareas::borrarTarea($id);

    header("location:procesarListaTareas.php");
}

if (isset($_GET['nif'])) {
    $nif = "'" . $_GET['nif'] . "'";
    Usuarios::borrarUsuario($nif);
    header("location:procesarListaUsuarios.php");
}
