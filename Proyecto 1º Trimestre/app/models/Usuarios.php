<?php

class Usuarios
{

    private function __construct()
    {
    }

    /**
     * DEvuelve la lista de usuarios para crear un select cod->nombre
     */

    static function listaParaSelect()
    {
        return conx_basedatos::getInstance()->getListaSelect('usuarios', 'nif', 'nombre', 'WHERE es_admin=0');
    }

    /**
     * insertarUsuarios
     *
     * @param  mixed $campos nombre de los campos a insertar
     * @param  mixed $names values de los campos
     * @return void
     */

    static function insertarUsuarios($listaValues, $campos)
    {
        return conx_basedatos::getInstance()->insertarCampos('usuarios', $listaValues, $campos);
    }

    /**
     * getNumeroUsuarios
     * retorna el numero de filas que tiene la tabla usuarios en total
     * @return void
     */

    static function getNumeroUsuarios()
    {

        return conx_basedatos::getInstance()->numFilas('usuarios');
    }

    /**
     * getTareasPorPagina
     *
     * @param  int $empezarDesde numero de la pagina por donde empezar  a paginar
     * @param  int $tamanioPagina numero de la pagina donde termina el paginado
     * @return array array indexado con los datos
     */

    static function getUsuariosPorPagina($empezarDesde, $tamanioPagina)
    {

        return conx_basedatos::getInstance()->resultadosPorPaginaUsuario('usuarios', $empezarDesde, $tamanioPagina);
    }

    /**
     * borrarUsuario
     *
     * @param  string $nif numero nif de la tarea a borrar
     * @return void
     */
    static function borrarUsuario($nif)
    {
        return conx_basedatos::getInstance()->borrarFila('usuarios', 'nif', $nif);
    }

    /**
     * getdatosUsuario
     *
     * @param  mixed $nif numero nif de la tarea que quieres consultar
     * @return void
     */

    static function getdatosUsuario($nif)
    {
        return conx_basedatos::getInstance()->getFila('usuarios', 'nif', $nif);
    }

    /**
     * updateUsuario
     *
     * @param  string $tabla nombre de la tabla
     * @param  string $pk primay key que usaremos en la consulta where
     * @param  array $nombres array con los nombres de los campos
     * @param  mixed $campos array con los values
     * @param  mixed $idt el value a comparar con la pk
     * @return void
     */
    static function updateUsuario($names, $campos, $nif)
    {
        return conx_basedatos::getInstance()->update("usuarios", "nif", $names, $campos, $nif);
    }

    /**
     * getUsuarioConClave
     * Esto comprobara si el usuario existe en la bbdd comparando email y contrasñea
     * @param  mixed $correo email del usuario
     * @param  mixed $clave contraseña del usuario
     * @return array devuelve un array indexado con los datos del usuario
     */

    static function getUsuarioConClave($correo, $clave)
    {
        return conx_basedatos::getInstance()->getNifLogin($correo, $clave);
    }
}
