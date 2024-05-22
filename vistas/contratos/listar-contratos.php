<div class="content-wrapper">
    <div class="page-title">
        <div>
        <h1>Contratos</h1>
        <ul class="breadcrumb side">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li>Tablas</li>
            <li class="active"><a href="#">Contratos</a></li>
        </ul>
        </div>
        <div>
            <a class="btn btn-primary btn-flat" href="?fControlador=contrato&fAccion=FormContrato"><i class="fa fa-lg fa-plus"></i></a>

            <a class="btn btn-info btn-flat" href="?fControlador=contrato"><i class="fa fa-lg fa-refresh"></i></a>
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
                    <th>Cedula Arrendatario</th>
                    <th>Numero Habitación</th>
                    <th>Costo Alquiler</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Fin</th>
                    <th>Estado Contrato</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                <?php foreach($this->modeloContrato->Listar() as $resultado):?>
                <tr>
                    <td><?=$resultado->contrato_id?></td>
                    <td><?=$resultado->arrendatario_cedula?></td>
                    <td><?=$resultado->habitacion_numero?></td>
                    <td><?=$resultado->contrato_costo?></td>
                    <td><?=$resultado->contrato_fecha_inicio?></td>
                    <td><?=$resultado->contrato_fecha_final?></td>
                    <td><?=$resultado->contrato_estado?></td>

                    <td>
                        <a class="btn btn-success btn-flat" href="?fControlador=contrato&fAccion=FormContratoActualizar&contrato_id=<?=urlencode($resultado->contrato_id)?>"><i class="fa fa-lg fa-pencil"></i></a>

                        <a class="btn btn-warning btn-flat" href="?fControlador=contrato&fAccion=Eliminar&contrato_id=<?=urlencode($resultado->contrato_id)?>"><i class="fa fa-lg fa-trash"></i></a>
                        
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
