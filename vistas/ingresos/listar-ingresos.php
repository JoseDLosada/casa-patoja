<div class="content-wrapper">
    <div class="page-title">
        <div>
        <h1>Propiedades</h1>
        <ul class="breadcrumb side">
            <li><i class="fa fa-home fa-lg"></i></li>
            <li>Tablas</li>
            <li class="active"><a href="#">Propiedades</a></li>
        </ul>
        </div>
        <div>
            <a class="btn btn-primary btn-flat" href="?fControlador=propiedad&fAccion=FormPropiedad"><i class="fa fa-lg fa-plus"></i></a>

            <a class="btn btn-info btn-flat" href="?fControlador=propiedad"><i class="fa fa-lg fa-refresh"></i></a>
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
                    <th>ID Alquiler</th>
                    <th>Fecha</th>
                    <th>Monto</th>
                    <th>Metodo de Pago</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                <?php foreach($this->modeloIngreso->Listar() as $resultado):?>
                <tr>
                    <td><?=$resultado->pagoAlq_id?></td>
                    <td><?=$resultado->alquiler_id?></td>
                    <td><?=$resultado->pagoAlq_fecha?></td>
                    <td><?=$resultado->pagoAlq_monto?></td>
                    <td><?=$resultado->pagoAlq_metodo?></td>
                    <td><?=$resultado->pagoAlq_descripcion?></td>

                    
                    <td>
                        <a class="btn btn-success btn-flat" href="?fControlador=propiedad&fAccion=FormPropiedadActualizar&propiedad_direccion=<?=urlencode($resultado->propiedad_direccion)?>"><i class="fa fa-lg fa-pencil"></i></a>

                        <a class="btn btn-warning btn-flat" href="?fControlador=propiedad&fAccion=Eliminar&propiedad_direccion=<?=urlencode($resultado->propiedad_direccion)?>"><i class="fa fa-lg fa-trash"></i></a>
                        
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
