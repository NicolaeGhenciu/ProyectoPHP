<?php

/**
 * validarTelefono
 *
 * @param  string $tel telefono a comprobar, tiene que ser un telefono de españa
 * @return boolean
 */

function validarTelefono($tel)
{
    $a = "^(?:(?:\+?[0-9]{2,4})?[ ]?[6789][0-9 ]{8,13})$";
    if (preg_match("/$a/", $tel)) {
        return true;
    } else {
        return false;
    }
}
