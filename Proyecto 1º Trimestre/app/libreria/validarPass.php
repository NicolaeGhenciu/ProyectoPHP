<?php

/**
 * validarpass
 *
 * @param  string $pass contiene la contraseña a comprobar que tendra que cumplir estos requisitos:
 * Minimo 8 caracteres
 * Maximo 15
 * Al menos una letra mayúscula
 * Al menos una letra minucula
 * Al menos un dígito
 * No espacios en blanco
 * Al menos 1 caracter especial';
 * @return void
 */
function validarpass($pass)
{
    $a = "^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[$@$!%*?&])[A-Za-z\d$@$!%*?&]{8,15}";
    if (preg_match("/$a/", $pass)) {
        return true;
    } else {
        return false;
    }
}
