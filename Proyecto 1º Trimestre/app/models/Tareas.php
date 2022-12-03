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

    static function getNumeroTareas()
    {

        return conx_basedatos::getInstance()->numFilas('tareas');
    }

    static function getTareasPorPagina($empezarDesde, $tamanioPagina)
    {

        return conx_basedatos::getInstance()->resultadosPorPagina('tareas', $empezarDesde, $tamanioPagina);
    }

    static function borrarTarea($id)
    {
        return conx_basedatos::getInstance()->borrarTarea($id);
    }

    static function getdatosTarea($id)
    {
        return conx_basedatos::getInstance()->getTarea($id);
    }

    static function updateTareas($names, $campos, $id)
    {
        return conx_basedatos::getInstance()->updateTareas($names, $campos, $id);
    }
}
