<?php

include(__DIR__ . "/../models/conx_bd.php");
include(__DIR__ . "/../models/Usuarios.php");

include(__DIR__ . "/../controllers/varios.php");
include(__DIR__ . "/../controllers/utilsforms.php");

include(__DIR__ . "/../libreria/validarPass.php");
include(__DIR__ . "/../libreria/validarEmail.php");
include(__DIR__ . "/../libreria/getContenido.php");

session_start();

$hayError = FALSE;
$errores = [];



if ($_SESSION['rol'] == "Administrador" || $_SESSION['nif'] == $_GET['nif']) { //comprobamos si el usuario es administrador

    if (!$_POST) { // Si no han enviado el fomulario

        $nif = "'" . $_GET['nif'] . "'"; //ponemos el nif entre comillas 

        $datosUsuario = Usuarios::getdatosUsuario($nif); //con el nif recogemos todos los datos de usuario

        echo $blade->render('formularioModificarUsuario', [ //renderizamos el formulario
            'datosUsuario' => $datosUsuario,
            'nif' => $_GET['nif'],
        ]);
    } else {
        //hacemos las validaciones
        //validacion correo
        if (empty($_POST["correo"]) || !validarEmail($_POST["correo"])) {
            $errores['correo'] = 'Campo email tiene un formato incorrecto o se encuentra vacio';
            $hayError = TRUE;
        }
        //validacion clave
        if (empty($_POST["clave"]) || !validarpass($_POST["clave"])) {
            $errores['clave'] = '<ul><li>Minimo 8 caracteres</li><li>Maximo 15</li><li>Al menos una letra mayúscula</li><li>Al menos una letra minucula</li><li>Al menos un dígito</li><li>No espacios en blanco</li><li>Al menos 1 caracter especial</li></ul>';
            $hayError = TRUE;
        }
        
        if ($hayError) { //si hay un error renderizamos el formulario tarea de nuevo

            $nif = $_GET['nif']; // recogemos el nif

            $nifq = "'" . $nif . "'"; //le ponemos comillas al nif para la consulta

            $datosUsuario = Usuarios::getdatosUsuario($nifq); //recogemos todos los datos de usuario con el nif

            echo $blade->render('formularioModificarUsuario', [ //renderizamos el formulario de nuevo
                'datosUsuario' => $datosUsuario,
                'nif' => $nif,
            ]);

        } else {

            $todos_los_campos = $_POST; //recogemos todos los datos del formulario

            $nif = "'" . $_GET['nif'] . "'";

            Usuarios::updateUsuario(getContenido($todos_los_campos, true), getContenido($todos_los_campos, false), $nif); //actualizamos el usuario

            header("location:procesarlistaUsuarios.php"); //volvemos al listar Usuarios
        }
    }
} else {
    header("location:procesarListaTareas.php"); //si el operario intenta acceder a funciones de administrador le mostramos la listaTareas
}
