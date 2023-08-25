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


<h1>Datatable de productos</h1>
<div class="row justify-content-center">
    <div class="col table-responsive">
        <table id="tablaProductos" class="table table-bordered table-hover">
        </table>
    </div>
</div>
<script src="<?= asset('./build/js/productos/index.js') ?>"></script>