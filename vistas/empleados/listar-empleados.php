<div class="content-wrapper">
    <div class="page-title">
        <div>
        <h1>Empleados</h1>
        <ul class="breadcrumb side">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li>Tablas</li>
            <li class="active"><a href="#">Empleados</a></li>
        </ul>
        </div>
        <div>
            <a class="btn btn-primary btn-flat" href="?fControlador=empleado&fAccion=FormEmpleado"><i class="fa fa-lg fa-plus"></i></a>

            <a class="btn btn-info btn-flat" href="?fControlador=empleado"><i class="fa fa-lg fa-refresh"></i></a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
        <div class="card">
            <div class="card-body">
            <!-- <input type="text" id="searchInput" class="form-control mb-2" placeholder="Buscar..."> -->
            <table class="table table-hover table-bordered" id="sampleTable">
                <thead>
                <tr>
                    <th>Cedula</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Codigo Salud</th>
                    <th>Ocupacion</th>
                    <th>Salario</th>
                    <th>Propiedad</th>
                    <th>Acciones</th>

                    
                </thead>
                <tbody>
                <?php foreach($this->modeloEmpleado->Listar() as $resultado):?>
                <tr>
                    <td><?=$resultado->empleado_cedula?></td>
                    <td><?=$resultado->empleado_nombre?></td>
                    <td><?=$resultado->empleado_apellido?></td>
                    <td><?=$resultado->empleado_direccion?></td>
                    <td><?=$resultado->empleado_telefono?></td>
                    <td><?=$resultado->empleado_codigo_salud?></td>
                    <td><?=$resultado->empleado_tipo?></td>
                    <td><?=$resultado->empleado_salario?></td>
                    <td><?=$resultado->propiedad_direccion?></td>
                    
                    <td>
                        <a class="btn btn-success btn-flat" href="?fControlador=empleado&fAccion=FormEmpleadoActualizar&empleado_cedula=<?=urlencode($resultado->empleado_cedula)?>"><i class="fa fa-lg fa-pencil"></i></a>

                        <a class="btn btn-warning btn-flat" href="?fControlador=empleado&fAccion=Eliminar&empleado_cedula=<?=urlencode($resultado->empleado_cedula)?>"><i class="fa fa-lg fa-trash"></i></a>
                        
                    </td>
                </tr>
                <?php endforeach;?>
                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    </div>
