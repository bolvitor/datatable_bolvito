<h1 class="text-center">EMPLEADOS</h1>
<div class="row justify-content-center mb-5">
    <form class="col-lg-8 border bg-light p-3" id="formularioEmpleado">
        <input type="hidden" name="empleado_id" id="empleado_id">
        <div class="row mb-3">
                <div class="col">
                    <label for="empleado_nombre">Nombre del empleado</label>
                    <input type="text" name="empleado_nombre" id="empleado_nombre" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="empleado_dpi">DPI</label>
                    <input type="number" name="empleado_dpi" id="empleado_dpi" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="empleado_edad">Edad</label>
                    <input type="number" name="empleado_edad" id="empleado_edad" class="form-control">
                </div>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <label for="empleado_sexo">Género del Empleado</label>
                    <select name="empleado_sexo" id="empleado_sexo" class="form-control">
                        <option value="">Todos</option>
                        <option value="Masculino">Masculino</option>
                        <option value="Femenino">Femenino</option>
                    </select>
                </div>
            </div>
            
            <div class="row mb-3">
            <div class="col">
                <button type="submit" form="formularioEmpleado" id="btnGuardar" data-saludo= "hola" data-saludo2="hola2" class="btn btn-primary w-100">Guardar</button>
            </div>
            <div class="col">
                <button type="button" id="btnModificar" class="btn btn-warning w-100">Modificar</button>
            </div>
            <div class="col">
                <button type="button" id="btnBuscar" class="btn btn-info w-100">Buscar</button>
            </div>
            <div class="col">
                <button type="button" id="btnCancelar" class="btn btn-danger w-100">Cancelar</button>
            </div>
        </div>
    </form>
</div>


<h1>Datatable de productos</h1>
<div class="row justify-content-center">
    <div class="col table-responsive">
        <table id="tablaEmpleados" class="table table-bordered table-hover">
        </table>
    </div>
</div>
<script src="<?= asset('./build/js/empleados/index.js') ?>"></script>