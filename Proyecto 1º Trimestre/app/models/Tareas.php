<?php

class Tareas
{
    private function __construct()
    {
    }

    /**
     * DEvuelve la lista de provincias para crear un select cod->nombre
     */

    //el static no funciona.

    static function insertarTarea($campos, $names)
    {
        return conx_basedatos::getInstance()->insertarCampos('tareas', $names, $campos);
    }
}
