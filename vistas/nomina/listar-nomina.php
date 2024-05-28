<div class="content-wrapper">
    <div class="page-title">
        <div>
        <h1>Lista de Pagos Empleados</h1>
        <ul class="breadcrumb side">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li>Tablas</li>
            <li class="active"><a href="#">Nomina</a></li>
        </ul>
        </div>
        <div>
            <a class="btn btn-primary btn-flat" href="?fControlador=nomina&fAccion=FormNomina"><i class="fa fa-lg fa-plus"></i></a>

            <a class="btn btn-info btn-flat" href="?fControlador=nomina"><i class="fa fa-lg fa-refresh"></i></a>
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
                    <th>ID</th>
                    <th>Empleado</th>
                    <th>Pago</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                    
                </thead>
                <tbody>
                <?php foreach($this->modeloNomina->Listar() as $resultado):?>
                <tr>
                    <td><?=$resultado->nomina_id?></td>
                    <td><?=$resultado->empleado_cedula?></td>
                    <td><?=$resultado->nomina_pago?></td>
                    <td><?=$resultado->nomina_fecha?></td>

                    <td>
                        <a class="btn btn-success btn-flat" href="?fControlador=nomina&fAccion=FormNominaActualizar&nomina_id=<?=urlencode($resultado->nomina_id)?>"><i class="fa fa-lg fa-pencil"></i></a>

                        <a class="btn btn-warning btn-flat" href="?fControlador=nomina&fAccion=Eliminar&nomina_id=<?=urlencode($resultado->nomina_id)?>"><i class="fa fa-lg fa-trash"></i></a>
                        
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
