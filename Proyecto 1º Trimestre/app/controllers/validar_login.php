<?php
include(__DIR__ . "/../models/Usuarios.php");
include(__DIR__ . "/../models/conx_bd.php");

include(__DIR__ . "/../controllers/utilsforms.php");

include("varios.php");

if (isset($_SESSION)) {
    session_destroy(); //si existe sesion lo destruimos
}

if (!$_POST) { // Si no han enviado el fomulario
    echo $blade->render('login'); //renderizamos el login
} else {

    $email = $_POST['email'];
    $pass = $_POST['pass'];

    $usuario = Usuarios::getUsuarioConClave($email, $pass); //comprobamos si existe el usuario

    if (isset($usuario['nif'])) { //si el usuairo existe

        session_start(); //crear una sesion vacia

        $fechaHora = date('H:i:s'); //hora actual

        //creamos las sesiones  
        $_SESSION['fecha'] = $fechaHora;
        $_SESSION['nombre'] = $usuario['nombre'];
        $_SESSION['nif'] = $usuario['nif'];

        //hacemos la distincion
        if ($usuario['es_admin'] == 1) {
            $_SESSION['rol'] = "Administrador";
        } else {
            $_SESSION['rol'] = "Operario";
        }

        echo $blade->render('nada', [ //renderizamos un menu sin nada
            'usuario' => $usuario['nombre'],
        ]);

    } else {
        $errores = []; //si no existe el usuario mostramos el usuario
        $errores['pass'] = 'Incorrecto';
        echo $blade->render('login');
    }
}
