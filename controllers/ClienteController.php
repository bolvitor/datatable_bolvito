<?php

namespace Controllers;

use Exception;
use Model\Empleado;
use MVC\Router;

class EmpleadoController
{
    public static function index(Router $router)
    {
        $empleados = Empleado::all();
        // $empleados2 = empleado::all();
        // var_dump($empleados);
        // exit;
        $router->render('empleados/index', [
            'empleados' => $empleados,
            // 'empleados2' => $empleados2,
        ]);
    }

    public static function guardarAPI()
    {
        try {
            $empleado = new Empleado($_POST);
            $resultado = $empleado->crear();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Registro guardado correctamente',
                    'codigo' => 1
                ]);
            } else {
                echo json_encode([
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }
            // echo json_encode($resultado);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

    public static function modificarAPI()
    {
        try {
            $empleado = new Empleado($_POST);
            $resultado = $empleado->actualizar();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Registro modificado correctamente',
                    'codigo' => 1
                ]);
            } else {
                echo json_encode([
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }
            // echo json_encode($resultado);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

    public static function eliminarAPI()
    {
        try {
            $empleado_id = $_POST['empleado_id'];
            $empleado = Empleado::find($empleado_id);
            $empleado->empleado_situacion = 0;
            $resultado = $empleado->actualizar();

            if ($resultado['resultado'] == 1) {
                echo json_encode([
                    'mensaje' => 'Registro eliminado correctamente',
                    'codigo' => 1
                ]);
            } else {
                echo json_encode([
                    'mensaje' => 'Ocurrió un error',
                    'codigo' => 0
                ]);
            }
            // echo json_encode($resultado);
        } catch (Exception $e) {
            echo json_encode([
                'detalle' => $e->getMessage(),
                'mensaje' => 'Ocurrió un error',
                'codigo' => 0
            ]);
        }
    }

    public static function buscarAPI()
    {
        // $puestos = Puesto::all();
        $empleado_nombre = $_GET['empleado_nombre'] ?? '';
        $empleado_dpi = $_GET['empleado_dpi'] ?? '';
        $empleado_edad = $_GET['empleado_edad'] ?? '';
        $empleado_sexo = $_GET['empleado_sexo'] ?? '';


        $sql = "SELECT * FROM empleados WHERE empleado_situacion = 1 ";
        if ($empleado_nombre != '') {
            $empleado_nombre = strtolower($empleado_nombre);
            $sql .= " AND LOWER(empleado_nombre) LIKE '%$empleado_nombre%' ";
        }
        if ($empleado_dpi != '') {
            $empleado_dpi = strtolower($empleado_dpi);
            $sql .= " AND empleado_dpi= '$empleado_dpi' ";
        }
        if ($empleado_edad != '') {
            $empleado_edad = strtolower($empleado_edad);
            $sql .= " AND empleado_edad = '$empleado_edad' ";
        }
        if (!empty($empleado_sexo)) {
            $empleado_sexo = strtolower($empleado_sexo);
            $sexo_permitidos = ['masculino', 'femenino'];
            if (in_array($empleado_sexo, $sexo_permitidos)) {
                $sql .= " AND LOWER(empleado_sexo) = '$empleado_sexo'";
            }
        }

        try {

            $empleados = Empleado::fetchArray($sql);

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
