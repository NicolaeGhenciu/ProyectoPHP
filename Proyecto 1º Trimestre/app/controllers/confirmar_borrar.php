<?php
session_start();
include("varios.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    echo $blade->render('mensajeBorrarTarea', [
        'id' => $id,
    ]);
}

if (isset($_GET['nif'])) {
    $nif = $_GET['nif'];

    echo $blade->render('mensajeBorrarUsuario', [
        'nif' => $nif,
    ]);
}
