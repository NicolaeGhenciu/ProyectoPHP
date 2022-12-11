<?php
//[a-zA-Z ]{2,254}

function validarString($string)
{
    $a = "^[a-zA-Z ]{2,40}+$";
    if (preg_match("/$a/", $string)) {
        return true;
    } else {
        return false;
    }
}

function validarStringyNumber($string)
{
    $a = "^[a-zA-Z0-9 ]{2,300}+$";
    if (preg_match("/$a/", $string)) {
        return true;
    } else {
        return false;
    }
}