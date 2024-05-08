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
                    <form class="form-horizontal" method="POST" action="?fControlador=propiedad&fAccion=Search"class="mb-3" id="searchForm">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control" placeholder="Buscar...">
                            <div class="input-group-append">
                                <button type="submit" name="search" class="btn btn-primary">Buscar</button>
                            </div>
                        </div>
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>Direccion</th>
                                <th>Barrio</th>
                                <th>Numero de Habitaciones</th>
                                <th>Descripcion</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            // Realizar la búsqueda si se ha enviado el formulario
                            if(isset($_POST['search'])) {
                                // $term = $_POST['search'];
                                // $resultados = $this->modelo->Buscar($term); // Método en tu modelo para buscar según el término
                                foreach($resultados as $resultado):?>
                                <tr>
                                    <td><?=$resultado->propiedad_direccion?></td>
                                    <td><?=$resultado->propiedad_barrio?></td>
                                    <td><?=$resultado->propiedad_numero_habitaciones?></td>
                                    <td><?=$resultado->propiedad_descripcion?></td>
                                    <td>
                                        <a class="btn btn-success btn-flat" href="#"><i class="fa fa-lg fa-pencil"></i></a>
                                        <a class="btn btn-warning btn-flat" href="#"><i class="fa fa-lg fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach;
                            } else {
                                // Si no se ha enviado el formulario, listar todas las propiedades
                                foreach($this->modelo->Listar() as $resultado):?>
                                <tr>
                                    <td><?=$resultado->propiedad_direccion?></td>
                                    <td><?=$resultado->propiedad_barrio?></td>
                                    <td><?=$resultado->propiedad_numero_habitaciones?></td>
                                    <td><?=$resultado->propiedad_descripcion?></td>
                                    <td>
                                        <a class="btn btn-success btn-flat" href="#"><i class="fa fa-lg fa-pencil"></i></a>
                                        <a class="btn btn-warning btn-flat" href="#"><i class="fa fa-lg fa-trash"></i></a>
                                    </td>
                                </tr>
                                <?php endforeach;
                            }?>
                        </tbody>
                    </table>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
