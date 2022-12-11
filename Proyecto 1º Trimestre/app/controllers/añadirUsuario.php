<?php

include("varios.php");
include("utilsforms.php");

include("../models/conx_bd.php");
$bd = conx_basedatos::getInstance();
include("../models/Usuarios.php");

include("../libreria/getContenido.php");
include("../libreria/validarString.php");
include("../libreria/validarDni.php");
include("../libreria/validarEmail.php");
include("../libreria/validarTelefono.php");
include("../libreria/validarPass.php");

session_start();

$hayError = FALSE;
$errores = [];

if ($_SESSION['rol'] == "Administrador") {

    if (!$_POST) { // Si no han enviado el fomulario
        echo $blade->render('formularioAñadirUsuario');
    } else {

        if (empty($_POST["nif"]) || !validarDni($_POST["nif"])) {
            $errores['nif'] = 'Campo NIF o CIF tiene un formato incorrecto o se encuentra vacio';
            $hayError = TRUE;
        }
        if (empty($_POST["nombre"]) || !validarString($_POST["nombre"])) {
            $errores['nombre'] = 'Campo nombre se encuentra vacio';
            $hayError = TRUE;
        }
        if (empty($_POST["clave"]) || !validarpass($_POST["clave"])) {
            $errores['clave'] = '<ul><li>Minimo 8 caracteres</li><li>Maximo 15</li><li>Al menos una letra mayúscula</li><li>Al menos una letra minucula</li><li>Al menos un dígito</li><li>No espacios en blanco</li><li>Al menos 1 caracter especial</li></ul>';
            $hayError = TRUE;
        }
        if (empty($_POST["correo"]) || !validarEmail($_POST["correo"])) {
            $errores['correo'] = 'Campo correo tiene un formato incorrecto o se encuentra vacio';
            $hayError = TRUE;
        }
        if (empty($_POST["telefono"]) || !validarTelefono($_POST["telefono"])) {
            $errores['telefono'] = 'Campo teléfono tiene un formato incorrecto o se encuentra vacio';
            $hayError = TRUE;
        }

        //$_POST["es_admin"]==""
        if (isset($_POST["es_admin"])) {
            if ($_POST["es_admin"] == "") {
                $errores['es_admin'] = 'Campo Admin es obligatorio';
                $hayError = TRUE;
            }
        }

        if ($hayError) {
            $todos_los_datos = $_POST;

            echo $blade->render('formularioAñadirUsuario');
        } else {

            $todos_los_datos = $_POST;

            Usuarios::insertarUsuarios(getContenido($todos_los_datos, false), getContenido($todos_los_datos, true));
            header("location:procesarListaTareas.php");
        }
    }
}
