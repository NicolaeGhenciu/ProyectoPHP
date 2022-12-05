<?php
// Evitamos errores "deprecated" en php 8.1 que tenemos con la versión de jessengers blade
error_reporting(E_ERROR | E_WARNING | E_PARSE);

// Estamos trabajando con espacios de nombres, hay objetos que queremos simplificar su nombre
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

//
// URL en la que se encuentra la aplicación. Se precisa para crear los enlaces
// BASE_URL si utilizáis XAMMP será 
// http://localhost/carpeta/index.php/
//
// Si utilizamos como servidor el interprete de php ejecutando en el terminal
// php -S localhost:8000
define('BASE_URL', 'http://localhost:3000/index.php/');

require __DIR__ . '/../vendor/autoload.php'; // Autocargador para los componentes instalados desde composer (en este caso Slim y blade)
require __DIR__ . '/../ctes.php'; // definimos constantes que facilitan el trabajo

include(MODEL_PATH . '/conx_bd.php');
include(CTRL_PATH . '/validar_login.php');

// Habilitamos errores detallados para que nos informe de cualquier contratiempo
// https://www.slimframework.com/docs/v3/handlers/error.html
/**
 * Instantiate App
 * Creamos la aplicación
 */

$app = new \Slim\App(['settings' => ['displayErrorDetails' => true,],]);

// Página de login (observad que entramos por get/post/put/... al poner any())
$app->any('', function (Request $request, Response $response, $args) {

});