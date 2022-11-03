<?php
if (empty($_POST["nombre"]) || empty($_POST["apellidos"]) || empty($_POST["descripcion"])) {
    if (empty($_POST["nombre"]))
        echo "<p style='color:red'>Campo nombre vacio</p>";
    if (empty($_POST["apellidos"]))
        echo "<p style='color:red'>Campo apellidos vacio</p>";
    if (empty($_POST["descripcion"]))
        echo "<p style='color:red'>Campo descripción vacio</p>";
}

if (empty($_POST["cod_postal"]) || !validarCodigoPostal($_POST["cod_postal"]))
    echo "<p style='color:red'>Campo Codigo Postal incorrecto</p>";

if (empty($_POST["nif_cif"]) || !validarDni($_POST["nif_cif"]))
    echo "<p style='color:red'>Campo nif, cif vacio o incorrecto</p>";

if (empty($_POST["telefono"]) || !validarTelefono($_POST["telefono"]))
    echo "<p style='color:red'>Campo telefono vacio o incorrecto</p>";

if (empty($_POST["email"]) || !validarEmail($_POST["email"]))
    echo "<p style='color:red'>Campo email vacio o incorrecto</p>";

if (empty($_POST["fecha_realizacion"]) || !validarFechaRealizacion($_POST["fecha_realizacion"]))
    echo "<p style='color:red'>Campo fecha vacio o no es valido, la fecha tiene que ser posterior a la de hoy</p>";

include("../views/formulario_tarea.php");

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
