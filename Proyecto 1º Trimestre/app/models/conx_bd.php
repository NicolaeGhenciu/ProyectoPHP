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

    public function resultadosPorPagina($tabla, $empezarDesde, $tamanioPagina)
    {

        $queryLimite = "SELECT * FROM " . $tabla . " LIMIT " . $empezarDesde . "," . $tamanioPagina;

        $resultado = $this->pdo->prepare($queryLimite);
        $resultado->execute();

        //Almacenamos el resultado de fetchAll en una variable/
        $datos = $resultado->fetchAll(PDO::FETCH_ASSOC);

        /* while($registro = $resultado->fetch(PDO::FETCH_ASSOC)){

            $lista = $registro["nombre"] . "<br>";

            }*/

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
}
