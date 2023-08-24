<?php

namespace Model;

class empleado extends ActiveRecord{
    public static $tabla = 'empleados';
    public static $columnasDB = ['empleado_nombre', 'empleado_dpi', 'empleado_edad', 'empleado_sexo', 'empleado_situacion'];
    public static $idTabla = 'empleado_id';

    public $empleado_id;
    public $empleado_nombre;
    public $empleado_dpi;
    public $empleado_edad;
    public $empleado_sexo;
    public $empleado_situacion;

    public function __construct($args =[])
    {
        $this->empleado_id = $args['empleado_id'] ?? null;
        $this->empleado_nombre = $args['empleado_nombre'] ?? '';
        $this->empleado_dpi = $args['empleado_dpi'] ?? '';
        $this->empleado_edad = $args['empleado_edad'] ?? '';
        $this->empleado_sexo = $args['empleado_sexo'] ?? '';
        $this->empleado_situacion = $args['empleado_situacion'] ?? '1';
    }

}