<?php

include(__DIR__ . "/varios.php");

include(__DIR__ . "/../models/conx_bd.php");
include(__DIR__ . "/../models/Tareas.php");
include(__DIR__ . "/../models/Usuarios.php");

session_start();

if ($_SESSION['rol'] == "Administrador") { //comprobamos si el usuario es administrador

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        Tareas::borrarTarea($id); //borramos la tarea

        header("location:procesarListaTareas.php"); // mandamos al usuario al procesar lista tareas
    }

    if (isset($_GET['nif'])) {
        $nif = "'" . $_GET['nif'] . "'";
        Usuarios::borrarUsuario($nif);
        header("location:procesarListaUsuarios.php"); //mandamos al usuario al procesar lista usuarios
    }
} else {
    header("location:procesarListaTareas.php"); //si el operario intenta acceder a funciones de administrador le mostramos la listaTareas
}
