<?php

include(__DIR__ . "/varios.php");

session_start();

if ($_SESSION['rol'] == "Administrador") { //comprobamos si el usuario es administrador


    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        echo $blade->render('mensajeBorrarTarea', [ //renderizamos el mensaje de Borrar Tarea pasandole la id por parametro
            'id' => $id,
        ]);
    }

    if (isset($_GET['nif'])) {
        $nif = $_GET['nif'];

        echo $blade->render('mensajeBorrarUsuario', [ //renderizamos el mensaje de Borrar Usuario pasandole el nif por parametro
            'nif' => $nif,
        ]);
    }
} else {
    header("location:procesarListaTareas.php"); //si el operario intenta acceder a funciones de administrador le mostramos la listaTareas
}
