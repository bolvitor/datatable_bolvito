<?php 
require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\AppController;
use Controllers\DetalleController;
use Controllers\LoginController;
use Controllers\ProductoController;
use Controllers\EmpleadoController;

$router = new Router();
$router->setBaseURL('/' . $_ENV['APP_NAME']);

$router->get('/', [LoginController::class,'index']);
$router->get('/menu', [LoginController::class,'menu']);
$router->get('/logout', [LoginController::class,'logout']);
$router->post('/API/login', [LoginController::class,'loginAPI']);
$router->get('/productos/datatable', [ProductoController::class,'datatable']);
$router->get('/API/productos/buscar', [ProductoController::class,'buscarAPI']);

// $router->get('/', [AppController::class,'index']);
// $router->get('/empleados', [EmpleadoController::class,'index'] );
$router->get('/empleados/datatable', [EmpleadoController::class,'datatable']);
$router->post('/API/empleados/guardar', [EmpleadoController::class,'guardarAPI'] );
$router->post('/API/empleados/modificar', [EmpleadoController::class,'modificarAPI'] );
$router->post('/API/empleados/eliminar', [EmpleadoController::class,'eliminarAPI'] );
$router->get('/API/empleados/buscar', [EmpleadoController::class,'buscarAPI'] );

$router->get('/productos/estadistica', [DetalleController::class,'estadistica']);
$router->get('/API/productos/estadistica', [DetalleController::class,'detalleVentasAPI']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();
