<nav class="navbar navbar-dark bg-dark fixed-top navbar-expand-lg">
    <a class="navbar-brand" href="#">MENU</a>
    <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark" href="/datatable_bolvito/menu">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark" href="/datatable_bolvito/productos/datatable">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark" href="/datatable_bolvito/productos/estadistica">Estadística</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark" href="/datatable_bolvito/empleados/datatable">Empleados</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-dark" href="/datatable_bolvito/empleados/estadistica2">Estadística2</a>
                    </li>
                  
                </ul>
    </div>
    <a href="/datatable_bolvito/logout" class="btn btn-danger">CERRAR SESIÓN</a>
</nav>


<h1>ESTADISTICAS DE VENTAS</h1>
<button id="btnActualizar" class="btn btn-info">Actualizar</button>
<div class="row">
    <div class="col-lg-6">
        <canvas id="chartVentas" width="100%"></canvas>
    </div>
</div>
<script src="<?=asset('./build/js/productos/estadistica.js') ?>"></script>