<?php

use function PHPSTORM_META\type;

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

    public function numFilas($tabla)
    {

        $sql = "SELECT * FROM " . $tabla;

        $resultado = $this->pdo->prepare($sql);
        $resultado->execute();

        $numFilas = $resultado->rowCount();

        return $numFilas;
    }

    public function numFilasPendientes($tabla)
    {

        $sql = "SELECT * FROM " . $tabla . " WHERE estado='P'";

        $resultado = $this->pdo->prepare($sql);
        $resultado->execute();

        $numFilas = $resultado->rowCount();

        return $numFilas;
    }

    public function numFilasFiltrado($condicion)
    {

        $sql = "SELECT * FROM tareas " . $condicion;
        echo $sql;

        $resultado = $this->pdo->prepare($sql);
        $resultado->execute();

        $numFilas = $resultado->rowCount();

        return $numFilas;
    }

    public function resultadosPorPagina($tareas, $empezarDesde, $tamanioPagina)
    {

        $queryLimite = "SELECT id,nif_cif,nombre,apellidos,telefono,descripcion,email,direccion,poblacion,
        codigo_postal,provincias,estado,DATE_FORMAT(fecha_creacion, '%d/%m/%Y') AS fecha_creacion ,operario_encargado, DATE_FORMAT(fecha_realizacion, '%d/%m/%Y') AS fecha_realizacion,
        anotaciones_anteriores,anotaciones_posteriores,fichero_resumen,foto_trabajo FROM `tareas` ORDER BY fecha_realizacion " .  " LIMIT " . $empezarDesde . "," . $tamanioPagina;

        $resultado = $this->pdo->prepare($queryLimite);
        $resultado->execute();

        //Almacenamos el resultado de fetchAll en una variable/
        $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $datos;
    }

    public function resultadosPorPaginaPendietes($tareas, $empezarDesde, $tamanioPagina)
    {

        $queryLimite = "SELECT id,nif_cif,nombre,apellidos,telefono,descripcion,email,direccion,poblacion,
        codigo_postal,provincias,estado,DATE_FORMAT(fecha_creacion, '%d/%m/%Y') AS fecha_creacion ,operario_encargado, DATE_FORMAT(fecha_realizacion, '%d/%m/%Y') AS fecha_realizacion,
        anotaciones_anteriores,anotaciones_posteriores,fichero_resumen,foto_trabajo FROM `tareas` WHERE estado='P'  ORDER BY fecha_realizacion " .  " LIMIT " . $empezarDesde . "," . $tamanioPagina;

        $resultado = $this->pdo->prepare($queryLimite);
        $resultado->execute();

        //Almacenamos el resultado de fetchAll en una variable/
        $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $datos;
    }

    function getNifLogin($correo, $clave)
    {
        $stmt = $this->pdo->query("SELECT * FROM usuarios WHERE correo='" . $correo . "' AND clave='" . $clave . "'");
        return $stmt->fetch();
    }

    function getCountTareas()
    {
        $stmt = $this->pdo->query("SELECT id FROM tareas GROUP BY id desc limit 1");
        return $stmt->fetch();
    }

    function borrarTarea($idt)
    {

        $sql = "DELETE FROM tareas WHERE id = $idt";

        $resultado = $this->pdo->prepare($sql);
        $resultado->execute();
    }

    function getTarea($idt)
    {
        $stmt = $this->pdo->query("SELECT * FROM tareas WHERE id = $idt");
        return $stmt->fetch();
    }

    function updateTareas($nombres, $campos, $idt)
    {

        $cadena = '';

        $a_campos = explode(",", $campos);

        foreach ($nombres as $valor => $contenido) {

            $cadena .= $a_campos[$valor] . " = '" .  $contenido . "' ,";
        }

        $cadena = substr($cadena, 0, -1);

        $sql = "UPDATE tareas SET " . $cadena . " WHERE id = $idt";

        $resultado = $this->pdo->prepare($sql);
        $resultado->execute(array());
    }

    function buscarTarea($consulta)
    {

        $queryLimite = "SELECT id,nif_cif,nombre,apellidos,telefono,descripcion,email,direccion,poblacion,
        codigo_postal,provincias,estado,DATE_FORMAT(fecha_creacion, '%d/%m/%Y') AS fecha_creacion ,operario_encargado, DATE_FORMAT(fecha_realizacion, '%d/%m/%Y') AS fecha_realizacion,
        anotaciones_anteriores,anotaciones_posteriores,fichero_resumen,foto_trabajo FROM `tareas` " . $consulta;

        $resultado = $this->pdo->prepare($queryLimite);
        $resultado->execute();

        //Almacenamos el resultado de fetchAll en una variable/
        $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

        return $datos;
    }
}
