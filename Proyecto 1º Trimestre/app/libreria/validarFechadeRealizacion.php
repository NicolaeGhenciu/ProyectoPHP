<?php

/**
 * validarFechaRealizacion
 *
 * @param  string $fecha contiene la fecha que vamos a comprobar que tendra que ser posterior o igual a la fecha actual
 * @return void
 */

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
