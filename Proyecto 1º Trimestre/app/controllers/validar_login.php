<?php
include(__DIR__ . "/../models/conx_bd.php");
include("varios.php");
$bd = conx_basedatos::getInstance();

if (isset($_SESSION)) {
    session_destroy();
}

if (!$_POST) { // Si no han enviado el fomulario
    echo $blade->render('login');
} else {

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $usuario = $bd->getNifLogin($email, $pass);

    if (isset($usuario['nif'])) {

        session_start(); //crear una sesion vacia
        $fechaHora = date('H:i:s');

        $_SESSION['fecha'] = $fechaHora;
        $_SESSION['nombre'] = $usuario['nombre'];

        if ($usuario['es_admin'] == 1) {
            $_SESSION['rol'] = "Administrador";
        } else {
            $_SESSION['rol'] = "Operario";
        }


        echo $blade->render('nada', [
            'usuario' => $usuario['nombre'],
        ]);
    } else {
        echo $blade->render('login');
    }
}
