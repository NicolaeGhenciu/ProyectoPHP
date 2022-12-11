<?php

class Tareas
{
    private function __construct()
    {
    }

    /**
     * insertarTarea
     *
     * @param  mixed $campos nombre de los campos a insertar
     * @param  mixed $names values de los campos
     * @return void
     */
    static function insertarTarea($campos, $names)
    {
        return conx_basedatos::getInstance()->insertarCampos('tareas', $names, $campos);
    }

    /**
     * getNumeroTareas
     *
     * @return string retorna el numero de filas que tiene la tabla tareas en total
     */

    static function getNumeroTareas()
    {

        return conx_basedatos::getInstance()->numFilas('tareas');
    }

    /**
     * getNumeroTareasPendientes
     *
     * @return string retorna el numero de filas que tiene la tabla tareas pero solo las pendientes
     */

    static function getNumeroTareasPendientes()
    {

        return conx_basedatos::getInstance()->numFilas('tareas', " WHERE estado='P'");
    }

    
    /**
     * getNumeroTareasFiltrado
     *
     * @param  string $condicion string que contiene un where con cierta condicion
     * @return string retotna el numero de filas que tiene con esa condicion
     */

    static function getNumeroTareasFiltrado($condicion)
    {
        return conx_basedatos::getInstance()->numFilas('tareas', $condicion);
    }

    /**
     * getTareasPorPagina
     *
     * @param  int $empezarDesde numero de la pagina por donde empezar  a paginar
     * @param  int $tamanioPagina numero de la pagina donde termina el paginado
     * @return array array indexado con los datos
     */

    static function getTareasPorPagina($empezarDesde, $tamanioPagina)
    {

        return conx_basedatos::getInstance()->resultadosPorPagina('', $empezarDesde, $tamanioPagina);
    }

    /**
     * getTareasPorPagina
     * 
     * @param  string condicion a cumplir en este caso, tareas pendientes
     * @param  int $empezarDesde numero de la pagina por donde empezar  a paginar
     * @param  int $tamanioPagina numero de la pagina donde termina el paginado
     * @return array array indexado con los datos
     */
    static function getTareasPorPaginaPendietes($empezarDesde, $tamanioPagina)
    {

        return conx_basedatos::getInstance()->resultadosPorPagina("WHERE estado='P'", $empezarDesde, $tamanioPagina);
    }

    static function getTareasPorPaginaFiltrado($consulta,$empezarDesde, $tamanioPagina)
    {
        return conx_basedatos::getInstance()->resultadosPorPagina($consulta, $empezarDesde, $tamanioPagina);
    }

    //_________________

    /**
     * borrarTarea
     *
     * @param  string $id numero id de la tarea a borrar
     * @return void
     */
    static function borrarTarea($id)
    {
        return conx_basedatos::getInstance()->borrarFila('tareas', 'id', $id);
    }

    /**
     * getdatosTarea
     *
     * @param  string $id numero id de la tarea que quieres consultar
     * @return void
     */

    static function getdatosTarea($id)
    {
        return conx_basedatos::getInstance()->getFila('tareas', 'id', $id);
    }

    /**
     * updateTareas
     *
     * @param  string $tabla nombre de la tabla
     * @param  string $pk primay key que usaremos en la consulta where
     * @param  array $nombres array con los nombres de los campos
     * @param  mixed $campos array con los values
     * @param  mixed $idt el value a comparar con la pk
     * @return void
     */

    static function updateTareas($names, $campos, $id)
    {
        return conx_basedatos::getInstance()->update("tareas", "id", $names, $campos, $id);
    }
}
