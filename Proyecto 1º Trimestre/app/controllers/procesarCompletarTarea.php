<?php

include(__DIR__ . "/utilsforms.php");
include(__DIR__ . "/varios.php");

include(__DIR__ . "/../models/Tareas.php");
include(__DIR__ . "/../models/conx_bd.php");

include(__DIR__ . "/../libreria/subirArchivos.php");
include(__DIR__ . "/../libreria/validarString.php");
include(__DIR__ . "/../libreria/getContenido.php");

session_start();

if ($_SESSION['rol'] == "Operario") { //comprobamos si el usuario es operario

    $hayError = FALSE; //iniciamos la variable hay error
    $errores = []; //array que almacenara los errores

    if (!$_POST) { // Si no han enviado el fomulario

        $id = $_GET['id']; //recogemos la id

        $datosTarea = Tareas::getdatosTarea($id); //con la id de la tarea cogemos todos los datos

        echo $blade->render('formularioCompletarTarea', [ //renderizamos el formulario completar tarea pasandole todos los datos
            'id' => $id,
            'datosTarea' => $datosTarea
        ]);
    } else {
        //hacemos las validaciones
        //validacion anotaciones anteriores
        if (!validarStringyNumber($_POST["anotaciones_anteriores"])) {
            $errores['anotaciones_anteriores'] = 'Formato incorrecto o se encuentra vacio';
            $hayError = TRUE;
        }
        //validacion anotaciones posteriores
        if (!validarStringyNumber($_POST["anotaciones_posteriores"])) {
            $errores['anotaciones_posteriores'] = 'Formato incorrecto o se encuentra vacio';
            $hayError = TRUE;
        }

        if ($hayError) { //si hay un error renderizamos el formulario tarea de nuevo

            $id = $_GET['id']; //recogemos la id

            $datosTarea = Tareas::getdatosTarea($id); //con la id de la tarea cogemos todos los datos

            echo $blade->render('formularioCompletarTarea', [ //renderizamos el formulario completar tarea pasandole todos los datos
                'id' => $id,
                'datosTarea' => $datosTarea
            ]);
        } else { //si no hay errores

            $todos_los_campos = $_POST; //recogemos todos los datos del formulario

            $id = $_GET['id']; //recogemos la id

            if ($_FILES['fichero_resumen']['name'] == "") { //comprobamos si el nombre del fichero esta vacio
                $todos_los_campos["fichero_resumen"] = ""; //le asignamos ""
            } else {
                subirArchivo('fichero_resumen', $id); // llamamos a la funcion subirArchivo que nos pondra el fichero en la carpeta FILES
                $todos_los_campos["fichero_resumen"] = "Tarea-" . $id . "-" . $_FILES['fichero_resumen']['name']; //cambiamos el nombre del campo que recibimos cuando hacemos $_POST
            }

            if ($_FILES['foto_trabajo']['name'] == "") { //comprobamos si el nombre del fichero esta vacio
                $todos_los_campos["foto_trabajo"] = ""; //le asignamos ""
            } else {
                subirArchivo('foto_trabajo', $id); // llamamos a la funcion subirArchivo que nos pondra el fichero en la carpeta FILES
                $todos_los_campos["foto_trabajo"] = "Tarea-" . $id . "-" . $_FILES['foto_trabajo']['name']; //cambiamos el nombre del campo que recibimos cuando hacemos $_POST
            }

            Tareas::updateTareas(getContenido($todos_los_campos, true), getContenido($todos_los_campos, false), $id); // actualizamos los datos de la tarea

            header("location:procesarListaTareas.php"); // volvemos al procesar lista tareas
        }
    }
} else {
    header("location:procesarListaTareas.php"); //si el administrador intenta acceder a funciones de operario le mostramos la listaTareas
}
