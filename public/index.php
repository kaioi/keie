<?php
ini_set('display_errors',1);
ini_set('display_startup_errors',1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';
//sePuedeUsarLasClasesDephpRouteSinNecesidadDeLosInclude

session_start(); //sesionDeUsuarioIniciada
$baseUrl='';
//$baseDir=$_SERVER['SCRIPT_NAME']; //"/cursoPhp/blog/public/index.twig"

$baseDir=str_replace(basename($_SERVER['SCRIPT_NAME']),'',$_SERVER['SCRIPT_NAME']);//quitarUbicacionActualDeLaCADENA
$baseUrl='http://'.$_SERVER['HTTP_HOST'].$baseDir;

define('BASE_URL',$baseUrl);//DefiniendoUnaConstante

//var_dump($baseUrl);

$dotenv= new \Dotenv\Dotenv(__DIR__ . '/..');
$dotenv->load();
use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;
$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => getenv('DB_HOST'),
    'database'  => getenv('DB_NAME'),
    'username'  => getenv('DB_USER'),
    'password'  => getenv('DB_PASS'),
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);//configuracionDeVariablesDeEntornoDelArhc.env

$capsule->setAsGlobal();
$capsule->bootEloquent();

$route=$_GET['route']??'/';





use Phroute\Phroute\RouteCollector;

$router = new RouteCollector();

$router->controller('/admin',App\Controllers\Admin\IndexController::class); /*paginaDeAdministracionPrincipal*/
$router->controller('/auth',App\Controllers\AuthController::class);


$router->controller('/admin/post',App\Controllers\Admin\PostController::class);/*paginaDondeSeListanLosPots*/
$router->controller('/admin/users',App\Controllers\Admin\UserController::class);/*paginaDondeSeListanLosPots*/


$router->controller('/',App\Controllers\IndexController::class);/*paginaPrincipalDelBlog*/








$dispatcher = new Phroute\Phroute\Dispatcher($router->getData());
$response =$dispatcher->dispatch($_SERVER['REQUEST_METHOD'],$route);

echo $response;

//seCAMBIAelCODIGOdEMANERAtALQUEeLHTMLsoloQuedeParapurasVistaYpreviamenteSecarguenLosDatosMediandoPDO

?>