<?php

function validarEmail($email)
{
    $a = "^[^0-9][a-zA-Z0-9]+([.][a-zA-Z0-9]+)*[@][a-zA-Z0-9]+([.][a-zA-Z0-9_]+)*[.][a-zA-Z]{2,4}$";
    if (preg_match("/$a/", $email)) {
        return true;
    } else {
        return false;
    }
}
