<?php

/**
 * validarString
 *
 * @param  string $string campo a comprobar, solo se permiten Letras de la a-z A-Z Y acentos con un minimo de 2 caracteres y un maximo de 40
 * @return boolean
 */

function validarString($string)
{
    $a = "^[A-Za-zÁÉÍÓÚáéíóúñÑ ]{2,40}+$";
    if (preg_match("/$a/", $string)) {
        return true;
    } else {
        return false;
    }
}

/**
 * validarStringyNumber
 *
 * @param  mixed $string campo a comprobar, solo se permiten Letras de la a-z A-Z, numeros del 0-9, acentos y un minimo de 2 caracteres y un maximo de 300
 * @return boolean
 */

function validarStringyNumber($string)
{
    $a = "^[A-Za-zÁÉÍÓÚáéíóúñÑ0-9 ]{2,300}+$";
    if (preg_match("/$a/", $string)) {
        return true;
    } else {
        return false;
    }
}