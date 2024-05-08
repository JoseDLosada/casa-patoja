<div class="content-wrapper">
    <div class="page-title">
        <div>
        <h1>Lista de Gastos</h1>
        <ul class="breadcrumb side">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li>Tablas</li>
            <li class="active"><a href="#">Gastos</a></li>
        </ul>
        </div>
        <div>
            <a class="btn btn-primary btn-flat" href="?fControlador=gasto&fAccion=FormGasto"><i class="fa fa-lg fa-plus"></i></a>

            <a class="btn btn-info btn-flat" href="?fControlador=gasto"><i class="fa fa-lg fa-refresh"></i></a>
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
                    <th>Categoria</th>
                    <th>Monto</th>
                    <th>Fecha</th>
                    <th>NIT Factura</th>
                    <th>Descripcion</th>
                    <th>Direccion Propiedad</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                <?php foreach($this->modeloGasto->Listar() as $resultado):?>
                <tr>
                    <td><?=$resultado->gasto_id?></td>
                    <td><?=$resultado->gasto_categoria?></td>
                    <td><?=$resultado->gasto_monto?></td>
                    <td><?=$resultado->gasto_fecha?></td>
                    <td><?=$resultado->gasto_nit_factura?></td>
                    <td><?=$resultado->gasto_descripcion?></td>
                    <td><?=$resultado->propiedad_direccion?></td>
                    <td>
                        <a class="btn btn-success btn-flat" href="?fControlador=gasto&fAccion=FormGastoActualizar&gasto_id=<?=urlencode($resultado->gasto_id)?>"><i class="fa fa-lg fa-pencil"></i></a>

                        <a class="btn btn-warning btn-flat" href="?fControlador=gasto&fAccion=Eliminar&gasto_id=<?=urlencode($resultado->gasto_id)?>"><i class="fa fa-lg fa-trash"></i></a>
                        
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
