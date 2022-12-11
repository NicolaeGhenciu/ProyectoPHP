<?php

class conx_basedatos
{
    public $_pdo;
    public $stmt;
    static $_instance;

    /*La función construct es privada para evitar que el objeto pueda ser creado mediante new*/
    private function __construct()
    {
        $this->conectar();
    }

    /*Evitamos el clonaje del objeto. Patrón Singleton*/
    private function __clone()
    {
    }

    /*Función encargada de crear, si es necesario, el objeto. Esta es la función que debemos llamar desde fuera de la clase para instanciar el objeto, y así, poder utilizar sus métodos*/
    public static function getInstance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    /*Realiza la conexión a la base de datos.*/
    public function conectar()
    {
        $dsn = 'mysql:dbname=bd_proyecto;host=localhost';
        $usuario = 'root';
        $contraseña = '';

        $this->pdo = new PDO($dsn, $usuario, $contraseña);
    }


    /**
     * getListaSelect
     *
     * @param  string $tabla tabla donde vamos a realizar la consulta
     * @param  string $c_idx parametros que le vamos a pedir a la consulta
     * @param  string $c_value parametros que le vamos a pedir a la consulta
     * @param  string $condicion
     * @return array 
     */

    function getListaSelect($tabla, $c_idx, $c_value, $condicion = "")
    {
        $this->stmt = $this->pdo->prepare('SELECT ' . $c_idx . ',' . $c_value . ' FROM ' . $tabla . " " . $condicion);
        $this->stmt->execute();

        $lista = array();
        while ($row = $this->stmt->fetch(PDO::FETCH_ASSOC)) {
            $lista[$row[$c_idx]] = $row[$c_value];
        }
        return $lista;
    }

    /**
     * insertarCampos
     *
     * @param  string $tabla tabla donde vamos a hacer el insert
     * @param  string $listaValues string con el nombre de los campos de la bbdd
     * @param  array $campos array con los valores que iran en el value de la consulta
     * @return void
     */

    function insertarCampos($tabla, $listaValues, $campos)
    {

        $cadena = '';

        foreach ($campos as $valor) {

            $cadena .= "'" . $valor . "'" . ",";
        }

        $cadena = substr($cadena, 0, -1);

        $sql = "INSERT INTO " . $tabla . "(" . $listaValues . ") VALUES(" . $cadena . ")";

        $resultado = $this->pdo->prepare($sql);
        $resultado->execute(array());
    }

    /**
     * numFilas
     *
     * @param  string $tabla tabla de la que queramos saber el numero de filas que tiene
     * @param  string $condicion Consulta Where en caso de tenerla, sino sera ""
     * @return void
     */

    public function numFilas($tabla, $condicion = "")
    {

        $sql = "SELECT * FROM " . $tabla . $condicion;

        $resultado = $this->pdo->prepare($sql);
        $resultado->execute();

        $numFilas = $resultado->rowCount();

        return $numFilas;
    }

    /**
     * resultadosPorPagina
     *
     * @param  string $condicion where en caso de que existir
     * @param  int $empezarDesde numero de la pagina por donde empezar  a paginar
     * @param  int $tamanioPagina numero de la pagina donde termina el paginado
     * @return void
     */

    public function resultadosPorPagina($condicion = "", $empezarDesde, $tamanioPagina)
    {

        $queryLimite = "SELECT id,nif_cif,nombre,apellidos,telefono,descripcion,email,direccion,poblacion,
        codigo_postal,provincias,estado,DATE_FORMAT(fecha_creacion, '%d/%m/%Y') AS fecha_creacion ,operario_encargado, DATE_FORMAT(fecha_realizacion, '%d/%m/%Y') AS fecha_realizacion,
        anotaciones_anteriores,anotaciones_posteriores,fichero_resumen,foto_trabajo FROM `tareas` " . $condicion . " ORDER BY fecha_realizacion " .  " LIMIT " . $empezarDesde . "," . $tamanioPagina;

        $resultado = $this->pdo->prepare($queryLimite);
        $resultado->execute();

        //Almacenamos el resultado de fetchAll en una variable/
        $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $datos;
    }

    public function resultadosPorPaginaUsuario($tareas, $empezarDesde, $tamanioPagina)
    {

        $queryLimite = "SELECT nif,nombre,clave,correo,telefono,es_admin FROM $tareas LIMIT " . $empezarDesde . "," . $tamanioPagina;

        $resultado = $this->pdo->prepare($queryLimite);
        $resultado->execute();

        //Almacenamos el resultado de fetchAll en una variable/
        $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $datos;
    }

    /**
     * getNifLogin
     *
     * @param  string $correo correo que le vamos a pasar por parametro
     * @param  string $clave que le vamos a pasar por parametro para comprobar que el usuario existe
     * @return void
     */

    function getNifLogin($correo, $clave)
    {
        $stmt = $this->pdo->query("SELECT * FROM usuarios WHERE correo='" . $correo . "' AND clave='" . $clave . "'");
        return $stmt->fetch();
    }

    /**
     * getCountTareas
     * retorna el numero de tareas existentes
     * @return string 
     */

    function getCountTareas()
    {
        $stmt = $this->pdo->query("SELECT id FROM tareas GROUP BY id desc limit 1");
        return $stmt->fetch();
    }

    /**
     * borrarFila
     *
     * @param  string $tabla nombre de la tabla
     * @param  string $nombreCampo nombre del campo a comprobar en la consulta Where
     * @param  string $idt value que va va en el where
     * @return void
     */

    function borrarFila($tabla, $nombreCampo, $idt)
    {

        $sql = "DELETE FROM $tabla WHERE $nombreCampo = $idt";

        echo $sql;

        $resultado = $this->pdo->prepare($sql);
        $resultado->execute();
    }

    /**
     * getFila
     * 
     * @param  string $tabla nombre de la tabla
     * @param  string $nombreCampo nombre del campo a comprobar en la consulta
     * @param  string $idt value que va en el where
     * @return array nos retorna en un array indexado todos los datos de la fila
     */

    function getFila($tabla, $nombreCampo, $idt)
    {
        $stmt = $this->pdo->query("SELECT * FROM $tabla WHERE $nombreCampo = $idt");
        return $stmt->fetch();
    }

    /**
     * update
     * actualizar una fila de la bbdd
     * @param  string $tabla nombre de la tabla
     * @param  string $pk primay key que usaremos en la consulta where
     * @param  array $nombres array con los nombres de los campos
     * @param  mixed $campos array con los values
     * @param  mixed $idt el value a comparar con la pk
     * @return void
     */

    function update($tabla, $pk, $nombres, $campos, $idt)
    {

        $cadena = '';

        $a_campos = explode(",", $campos);

        foreach ($nombres as $valor => $contenido) {

            $cadena .= $a_campos[$valor] . " = '" .  $contenido . "' ,";
        }

        $cadena = substr($cadena, 0, -1);

        $sql = "UPDATE $tabla SET " . $cadena . " WHERE $pk = $idt";

        echo $sql;

        $resultado = $this->pdo->prepare($sql);
        $resultado->execute(array());
    }
}
