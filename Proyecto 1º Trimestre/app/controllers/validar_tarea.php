<?php

include "utilsforms.php";

$hayError = FALSE;
$errores = [];
$fcha = date("Y-m-d");

if (!$_POST) { // Si no han enviado el fomulario
    include("../views/formulario_tarea.php");
} else {

    if (empty($_POST["nombre"])) {
        $errores['nombre'] = 'Campo nombre se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["apellidos"])) {
        $errores['apellidos'] = 'Campo apellidos se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["descripcion"])) {
        $errores['descripcion'] = 'Campo descripción se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["cod_postal"]) || !validarCodigoPostal($_POST["cod_postal"])) {
        $errores['cod_postal'] = 'Campo Codigo Postal tiene un formato incorrecto o se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["nif_cif"]) || !validarDni($_POST["nif_cif"])) {
        $errores['nif_cif'] = 'Campo NIF o CIF tiene un formato incorrecto o se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["telefono"]) || !validarTelefono($_POST["telefono"])) {
        $errores['telefono'] = 'Campo teléfono tiene un formato incorrecto o se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["email"]) || !validarEmail($_POST["email"])) {
        $errores['email'] = 'Campo email tiene un formato incorrecto o se encuentra vacio';
        $hayError = TRUE;
    }
    if (empty($_POST["fecha_realizacion"]) || !validarFechaRealizacion($_POST["fecha_realizacion"])) {
        $errores['fecha_realizacion'] = 'Campo fecha de realización se encuentra vacio o no es valido, la fecha tiene que ser posterior a la de hoy';
        $hayError = TRUE;
    }

    if ($hayError) {
        include("../views/formulario_tarea.php");
    }
}

function validarDni($dni)
{
    $dnisL = substr($dni, 0, -1);
    $letra = substr($dni, -1);
    $lista = "TRWAGMYFPDXBNJZSQVHLCKE";
    $arLista = str_split($lista);

    if (strlen($dnisL) == 8 && is_numeric($dnisL)) {
        $resultado = (int)$dnisL % 23;
        $letraAsign = $arLista[$resultado];
        if ($letra == $letraAsign) {
            return true;
        } else {
            return false;
        }
    }
}


function validarTelefono($tel)
{
    $a = "^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$";
    if (preg_match("/$a/", $tel)) {
        return true;
    } else {
        return false;
    }
}

function validarCodigoPostal($cod)
{
    $a = "^(?:0[1-9]\d{3}|[1-4]\d{4}|5[0-2]\d{3})$";
    if (preg_match("/$a/", $cod)) {
        return true;
    } else {
        return false;
    }
}

function validarEmail($email)
{
    $a = "^[^0-9][a-zA-Z0-9]+([.][a-zA-Z0-9]+)*[@][a-zA-Z0-9]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$";
    if (preg_match("/$a/", $email)) {
        return true;
    } else {
        return false;
    }
}

function validarFechaRealizacion($fecha)
{
    $fecha = new DateTime($fecha);
    $hoy = new DateTime();
    if ($fecha <= $hoy) {
        return false;
    } else {
        return true;
    }
}
