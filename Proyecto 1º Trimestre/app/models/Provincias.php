<?php

class Provincias
{
    private function __construct()
    {
    }

    /**
     * DEvuelve la lista de provincias para crear un select cod->nombre
     */

    static function listaParaSelect()
    {
        return conx_basedatos::getInstance()->getListaSelect('provincias', 'cod', 'nombre');
    }
}
