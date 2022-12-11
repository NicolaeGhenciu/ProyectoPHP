<?php

include(__DIR__ . "/varios.php");
include(__DIR__ . "/utilsforms.php");

include(__DIR__ . "/../models/conx_bd.php");
include(__DIR__ . "/../models/Usuarios.php");

include(__DIR__ . "/../libreria/getContenido.php");
include(__DIR__ . "/../libreria/validarString.php");
include(__DIR__ . "/../libreria/validarDni.php");
include(__DIR__ . "/../libreria/validarEmail.php");
include(__DIR__ . "/../libreria/validarTelefono.php");
include(__DIR__ . "/../libreria/validarPass.php");

$bd = conx_basedatos::getInstance();
session_start();

$hayError = FALSE;
$errores = [];

if ($_SESSION['rol'] == "Administrador") { //comprobamos si el usuario es administrador

    if (!$_POST) { // Si no han enviado el fomulario

        echo $blade->render('formularioAñadirUsuario');
    } else { //una vez enviado el formulario

        //hacemos las validaciones
        //validacion nif
        if (empty($_POST["nif"]) || !validarDni($_POST["nif"])) {
            $errores['nif'] = 'Campo NIF o CIF tiene un formato incorrecto o se encuentra vacio';
            $hayError = TRUE;
        }
        //validacion nombre
        if (empty($_POST["nombre"]) || !validarString($_POST["nombre"])) {
            $errores['nombre'] = 'Campo nombre se encuentra vacio';
            $hayError = TRUE;
        }
        //validacion clave
        if (empty($_POST["clave"]) || !validarpass($_POST["clave"])) {
            $errores['clave'] = '<ul><li>Minimo 8 caracteres</li><li>Maximo 15</li><li>Al menos una letra mayúscula</li><li>Al menos una letra minucula</li><li>Al menos un dígito</li><li>No espacios en blanco</li><li>Al menos 1 caracter especial</li></ul>';
            $hayError = TRUE;
        }
        //validacion correo
        if (empty($_POST["correo"]) || !validarEmail($_POST["correo"])) {
            $errores['correo'] = 'Campo correo tiene un formato incorrecto o se encuentra vacio';
            $hayError = TRUE;
        }
        //validacion telefono
        if (empty($_POST["telefono"]) || !validarTelefono($_POST["telefono"])) {
            $errores['telefono'] = 'Campo teléfono tiene un formato incorrecto o se encuentra vacio';
            $hayError = TRUE;
        }
        //validacion boton radio
        if (isset($_POST["es_admin"])) {
            if ($_POST["es_admin"] == "") {
                $errores['es_admin'] = 'Campo Admin es obligatorio';
                $hayError = TRUE;
            }
        }

        //if que comprueba si hay error
        if ($hayError) {
            //si hay error volvemos a renderizar el formulario
            echo $blade->render('formularioAñadirUsuario');
        } else {

            $todos_los_datos = $_POST; //recogemos todos los datos del formulario
            //insertamos el usuario
            Usuarios::insertarUsuarios(getContenido($todos_los_datos, false), getContenido($todos_los_datos, true));
            //volvemos a la lista de Usuarios
            header("location:procesarListaUsuarios.php");
        }
    }
} else {
    header("location:procesarListaTareas.php"); //si el operario intenta acceder a funciones de administrador le mostramos la listaTareas
}
