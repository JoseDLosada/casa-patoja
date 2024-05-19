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
            <a class="btn btn-primary btn-flat" href="?fControlador=habitacion&fAccion=FormHabitacion"><i class="fa fa-lg fa-plus"></i></a>

            <a class="btn btn-info btn-flat" href="?fControlador=habitacion"><i class="fa fa-lg fa-refresh"></i></a>
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
                    <th>Direccion Propiedad</th>
                    <th>Numero Habitación</th>
                    <th>Disponibilidad</th>
                    <th>Tarifa de Alquiler</th>
                    <th>Baño Privado</th>
                    <th>Tamaño Habitación</th>
                    <th>Amueblada</th>
                    <th>Acciones</th>
                </thead>
                <tbody>
                <?php foreach($this->modeloHabitacion->Listar() as $resultado):?>
                <tr>
                    <td><?=$resultado->propiedad_direccion?></td>
                    <td><?=$resultado->habitacion_numero?></td>
                    <td><?=$resultado->habitacion_disponibilidad?></td>
                    <td><?=$resultado->habitacion_tarifa_alquiler?></td>
                    <td><?=$resultado->habitacion_banio_privado?></td>
                    <td><?=$resultado->habitacion_tamanio?></td>
                    <td><?=$resultado->habitacion_amueblada?></td>
                    <td>
                        <a class="btn btn-success btn-flat" href="?fControlador=habitacion&fAccion=FormActulizarHabitacion&propiedad_direccion=<?=urlencode($resultado->propiedad_direccion)?>&habitacion_numero=<?=urlencode($resultado->habitacion_numero)?>"><i class="fa fa-lg fa-pencil"></i></a>

                        <a class="btn btn-warning btn-flat" href="?fControlador=habitacion&fAccion=EliminarHabitacion&propiedad_direccion=<?=urlencode($resultado->propiedad_direccion)?>&habitacion_numero=<?=urlencode($resultado->habitacion_numero)?>"><i class="fa fa-lg fa-trash"></i></a>
                        
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
