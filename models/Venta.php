<?php

namespace Model;

class Venta extends ActiveRecord{
    protected static $tabla = 'ventas';
    protected static $columnasDB = ['VENTA_FECHA','EMPLEADO_ID','VENTA_SITUACION'];
    protected static $idTabla = 'VENTA_ID';
    
    public $venta_id;
    public $venta_fecha;
    public $empleado_id;
    public $venta_situacion;


    public function __construct($args = [])
    {
        $this->venta_id = $args['venta_id'] ?? null;
        $this->venta_fecha = $args['venta_fecha'] ?? '';
        $this->empleado_id = $args['empleado_id'] ?? '';
        $this->venta_situacion = $args['venta_situacion'] ?? '';

    }
}