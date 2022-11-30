<?php

include("utilsforms.php");
include("../models/conx_bd.php");


$bd = conx_basedatos::getInstance();

if (!$_POST) { // Si no han enviado el fomulario
    include("../views/login.php");
} else {

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $usuario = $bd->getNifLogin($email, $pass);

    if (isset($usuario['nif'])) {
        echo "Bienvenido "  . $usuario['nombre'];
        include("../views/menu.php");
    } else {
        include("../views/login.php");
    }
}
