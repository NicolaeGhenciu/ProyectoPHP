<?php
session_start();
include("varios.php");

$id = $_GET['id'];

echo $blade->render('mensajeBorrarTarea', [
    'id' => $id,
]);
