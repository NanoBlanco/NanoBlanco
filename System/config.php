<?php
defined('BASEPATH') or exit('No se permite acceso directo');
setlocale(LC_TIME,"es_ES");

//////////////////////////////////////
// Valores de uri
/////////////////////////////////////
define('URI', $_SERVER['REQUEST_URI']);
define('REQUEST_METHOD', $_SERVER['REQUEST_METHOD']);

//////////////////////////////////////
// Valores de rutas
/////////////////////////////////////
define('FOLDER_PATH', '/activo');
define('ROOT', $_SERVER['DOCUMENT_ROOT']);
define('PATH_VIEWS', FOLDER_PATH . '/App/Views/');
define('PATH_CONTROLLERS', 'App/Controllers/');
define('MODL',  FOLDER_PATH . '/App/Models/');
define('HELPER_PATH', 'System/helpers/');
define('LIBS_ROUTE', ROOT. FOLDER_PATH . '/System/libs/');
define('ASSETS', FOLDER_PATH.'/Assets');

//////////////////////////////////////
// Valores de core
/////////////////////////////////////
define('CORE', 'System/core/');
define('DEFAULT_CONTROLLER', 'Login');
// define( 'DEBUG', true );
// define( 'DEBUG_LOG', true );
// define( 'DEBUG_DISPLAY', false );
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

//////////////////////////////////////
// Valores de base de datos
/////////////////////////////////////
define('HOST', 'localhost');
define('USER', 'root');
define('PASSWORD', '');
define('DB_NAME', 'activos');

//////////////////////////////////////
// Valores configuracion
/////////////////////////////////////
define('ERROR_REPORTING_LEVEL', -1);

//////////////////////////////////////
// Datos envio de correo
//////////////////////////////////////
const NOMBRE_REMITENTE = "RB Servicios SPA";
const EMAIL_REMITENTE = "contacto@rbservicios.cl";
const NOMBRE_EMPESA = "RB Servicios SPA";
const WEB_EMPRESA = "www.rbservicios.cl";

if (isset($_SERVER['HTTP_ORIGIN'])){
    header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
}else{
    header('Access-Control-Allow-Origin: *');
}
header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method");
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
header("Allow: GET, POST, OPTIONS, PUT, DELETE");
$method = $_SERVER['REQUEST_METHOD'];
if($method == "OPTIONS") {
    exit('Problema de Cabeceras');
}

/////////////////////////////////////
//  Funcion cors
/**
 *  An example CORS-compliant method.  It will allow any GET, POST, or OPTIONS requests from any
 *  origin.
 *
 *  In a production environment, you probably want to be more restrictive, but this gives you
 *  the general idea of what is involved.  For the nitty-gritty low-down, read:
 *
 *  - https://developer.mozilla.org/en/HTTP_access_control
 *  - https://fetch.spec.whatwg.org/#http-cors-protocol
 *
 */
function cors() {
    
    // Allow from any origin
    if (isset($_SERVER['HTTP_ORIGIN'])) {
        // Decide if the origin in $_SERVER['HTTP_ORIGIN'] is one
        // you want to allow, and if so:
        header("Access-Control-Allow-Origin: {$_SERVER['HTTP_ORIGIN']}");
        header('Access-Control-Allow-Credentials: true');
        header('Access-Control-Max-Age: 86400');    // cache for 1 day
    }
    
    // Access-Control headers are received during OPTIONS requests
    if ($_SERVER['REQUEST_METHOD'] == 'OPTIONS') {
        
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHOD']))
            // may also be using PUT, PATCH, HEAD etc
            header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
        
        if (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']))
            header("Access-Control-Allow-Headers: {$_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']}");
    
        exit(0);
    }
    
    //echo "You have CORS!";
}