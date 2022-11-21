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

        try {
            $this->pdo = new PDO($dsn, $usuario, $contraseña);
        } catch (PDOException $e) {
            echo 'Falló la conexión: ' . $e->getMessage();
        }
    }

    function getProvincia()
    {
        $this->stmt = $this->pdo->prepare('SELECT codPoblacion,nombre FROM poblacion');
        $this->stmt->execute();

        $aProvincias = array();
        while ($row = $this->stmt->fetch(PDO::FETCH_ASSOC)) {
            $aProvincias[$row['codPoblacion']] = $row['nombre'];
        }
        return $aProvincias;
    }

    function getTrabajadores()
    {
        $this->stmt = $this->pdo->prepare('SELECT nombre,apellidos FROM usuario WHERE esadmin=0');
        $this->stmt->execute();

        $aTrabajadores = array();
        while ($row = $this->stmt->fetch(PDO::FETCH_ASSOC)) {
            $aTrabajadores[$row['nombre']] = $row['apellidos'];
        }
        return $aTrabajadores;
    }
}
