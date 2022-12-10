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

    static function getNumeroTareasFiltrado($condicion)
    {

        return conx_basedatos::getInstance()->numFilasFiltrado($condicion);
    }

    static function getNumeroTareasPendientes()
    {

        return conx_basedatos::getInstance()->numFilasPendientes('tareas');
    }

    static function getTareasPorPagina($empezarDesde, $tamanioPagina)
    {

        return conx_basedatos::getInstance()->resultadosPorPagina('tareas', $empezarDesde, $tamanioPagina);
    }

    static function getTareasPorPaginaPendietes($empezarDesde, $tamanioPagina)
    {

        return conx_basedatos::getInstance()->resultadosPorPaginaPendietes('tareas', $empezarDesde, $tamanioPagina);
    }

    static function borrarTarea($id)
    {
        return conx_basedatos::getInstance()->borrarFila('tareas','id',$id);
    }

    static function getdatosTarea($id)
    {
        return conx_basedatos::getInstance()->getFila('tareas','id',$id);
    }

    static function updateTareas($names, $campos, $id)
    {
        return conx_basedatos::getInstance()->update("tareas","id",$names, $campos, $id);
    }

    static function buscarTarea($consulta)
    {
        return conx_basedatos::getInstance()->buscarTarea($consulta);
    }

}
