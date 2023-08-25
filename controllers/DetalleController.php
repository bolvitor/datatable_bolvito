<?php

namespace Controllers;

use Exception;
use Model\Detalle;
use MVC\Router;

class DetalleController {
    public static function estadistica(Router $router){
        if(isset($_SESSION['auth_user'])){
        $router->render('productos/estadistica', []);
    }else{
        header('Location: /datatable_bolvito/');
    }
    }
    public static function detalleVentasAPI(){

        $sql = "SELECT producto_nombre as producto, sum (detalle_cantidad) as cantidad  from detalle_ventas inner join ventas on detalle_venta = venta_id inner join productos on detalle_producto = producto_id where detalle_situacion = 1  group by producto_nombre order by producto_nombre";

        try {
            
            $productos = Detalle::fetchArray($sql);
    
            echo json_encode($productos);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }


    public static function estadistica2(Router $router){
        if(isset($_SESSION['auth_user'])){
        $router->render('empleados/estadistica', []);
    }else{
        header('Location: /datatable_bolvito/');
    }
    }

    public static function detalleEmpleadosAPI(){

        $sql = "SELECT e.empleado_nombre AS empleado, COUNT(DISTINCT v.venta_id) AS total_ventas
        FROM empleados e
        LEFT JOIN ventas v ON e.empleado_id = v.empleado_id
        WHERE v.venta_situacion = '1'
        GROUP BY e.empleado_id, e.empleado_nombre
        ORDER BY e.empleado_nombre";

        try {
            
            $empleados = Detalle::fetchArray($sql);
    
            echo json_encode($empleados);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

}