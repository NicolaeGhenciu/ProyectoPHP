<?php

session_start();

include("../models/conx_bd.php");
include("../controllers/varios.php");
include("../controllers/utilsforms.php");

include("../models/Usuarios.php");

include("../libreria/validarPass.php");
include("../libreria/validarEmail.php");

include("../libreria/getContenido.php");


$hayError = FALSE;
$errores = [];

if (!$_POST) { // Si no han enviado el fomulario

    $nif = "'" . $_GET['nif'] . "'";

    $datosUsuario = Usuarios::getdatosUsuario($nif);

    echo $blade->render('formularioModificarUsuario', [
        'datosUsuario' => $datosUsuario,
        'nif' => $_GET['nif'],
    ]);
} else {

    if (empty($_POST["correo"]) || !validarEmail($_POST["correo"])) {
        $errores['correo'] = 'Campo email tiene un formato incorrecto o se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["clave"]) || !validarpass($_POST["clave"])) {
        $errores['clave'] = '<ul><li>Minimo 8 caracteres</li><li>Maximo 15</li><li>Al menos una letra mayúscula</li><li>Al menos una letra minucula</li><li>Al menos un dígito</li><li>No espacios en blanco</li><li>Al menos 1 caracter especial</li></ul>';
        $hayError = TRUE;
    }

    if ($hayError) {
        $nif = $_GET['nif'];
        $nifq = "'" . $nif . "'";
        $datosUsuario = Usuarios::getdatosUsuario($nifq);
        echo $blade->render('formularioModificarUsuario', [
            'datosUsuario' => $datosUsuario,
            'nif' => $nif,
        ]);
    } else {

        $todos_los_campos = $_POST;

        $nif = "'" . $_GET['nif'] . "'";

        Usuarios::updateUsuario(getContenido($todos_los_campos, true), getContenido($todos_los_campos, false), $nif);

        header("location:procesarlistaUsuarios.php");
    }
}
