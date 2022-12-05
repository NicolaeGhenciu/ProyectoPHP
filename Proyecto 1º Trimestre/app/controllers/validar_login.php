<?php

include("utilsforms.php");
//include("../models/conx_bd.php");
include("varios.php");

//$bd = conx_basedatos::getInstance();

if (!$_POST) { // Si no han enviado el fomulario
    echo $blade->render('login');
} else {

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $usuario = $bd->getNifLogin($email, $pass);

    if (isset($usuario['nif'])) {
        //echo "Bienvenido "  . $usuario['nombre'];
        echo $blade->render('nada', [
            'usuario' => $usuario['nombre'],
        ]);
    } else {
        echo $blade->render('login');
    }
}
