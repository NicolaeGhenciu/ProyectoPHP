<?php

/**
 * subirArchivo
 *
 * @param  string $fich nombre del fichero
 * @param  string $id id de la tarea al que va a pertenecer el array
 * @return void
 */

function subirArchivo($fich, $id)
{
    $destino = __DIR__ . "/../../Files/";
    $dest = $destino . "Tarea-" . $id . "-" .  basename($_FILES[$fich]['name']);

    if (is_uploaded_file($_FILES[$fich]['tmp_name'])) {

        move_uploaded_file($_FILES[$fich]['tmp_name'], $dest);
    }
    
}
