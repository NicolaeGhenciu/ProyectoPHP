<?php

class Usuarios
{

    private function __construct()
    {
    }

    /**
     * DEvuelve la lista de provincias para crear un select cod->nombre
     */

    //el static no funciona.

    static function listaParaSelect()
    {
        return conx_basedatos::getInstance()->getListaSelect('usuarios', 'nif', 'nombre', 'WHERE es_admin=0');
    }

    static function insertarUsuarios($listaValues, $campos)
    {
        return conx_basedatos::getInstance()->insertarCampos('usuarios', $listaValues, $campos);
    }

    static function getNumeroUsuarios()
    {

        return conx_basedatos::getInstance()->numFilas('usuarios');
    }

    static function getUsuariosPorPagina($empezarDesde, $tamanioPagina)
    {

        return conx_basedatos::getInstance()->resultadosPorPaginaUsuario('usuarios', $empezarDesde, $tamanioPagina);
    }

    static function borrarUsuario($nif)
    {
        return conx_basedatos::getInstance()->borrarFila('usuarios', 'nif', $nif);
    }

    static function getdatosUsuario($nif)
    {
        return conx_basedatos::getInstance()->getFila('usuarios', 'nif', $nif);
    }

    static function updateUsuario($names, $campos, $nif)
    {
        return conx_basedatos::getInstance()->update("usuarios","nif", $names, $campos, $nif);
    }
}
