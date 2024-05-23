<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-dashboard"></i> Panel Principal 🏠</h1>
            <p>Información general de Casa Patoja</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li><a href="#">Panel Principal</a></li>
            </ul>
          </div>
        </div>

        <div class="row">

        <div class="col-md-3">
            <div class="widget-small primary"><i class="icon fa fa-users fa-3x"></i>
              <div class="info">
                <h4>Numero de Arrentarios</h4>
                <p><b><?php $arrendatario= $this->modeloPropiedad->MostrarNumeroArrendatarios()?>
                  <?=$arrendatario->numero_arrendatarios?> arrendatarios</b></p>
              </div>
            </div>
          </div>


       
          <div class="col-md-3">
            <div class="widget-small info"><i class="icon fa fa-thumbs-o-up fa-3x"></i>
              <div class="info">
                <h4>Habitaciones Libres</h4>
                <p><b><?php $habitacion= $this->modeloHabitacion->MostrarNumeroHabitaciones()?>
                  <?=$habitacion->numero_habitaciones?> habitaciones libres</b></p>
              </div>
            </div>
          </div>

          <div class="col-md-3">
            <div class="widget-small info"><i class="icon fa fa-files-o fa-3x"></i>
              <div class="info">
                <h4>Contratos Activos</h4>
                <p><b><?php $propiedad= $this->modeloPropiedad->MostrarNumeroHabitaciones()?>
                  <?=$propiedad->numero_habitaciones?> habitaciones</b></p>
              </div>
            </div>
          </div>

       

          <div class="col-md-3">
            <div class="widget-small danger"><i class="icon fa fa-star fa-3x"></i>
              <div class="info">
                <h4>Empleados</h4>
                <p><b><?php $propiedad= $this->modeloPropiedad->MostrarNumeroEmpleados()?>
                  <?=$propiedad->numero_empleados?> Empleados</b></p>
              </div>
            </div>
          </div>
     

          <div class="col-md-6">
            <div class="card">
              <h3 class="card-title">Conteo de habitaciones</h3>
              <p><?php $propiedad= $this->modeloPropiedad->MostrarNumeroHabitaciones()?>
                  <?=$propiedad->numero_habitaciones?> habitaciones</p>
                  <!-- < ?  =//var_dump($propiedad)? ></p> para saber que se esta imprimiendo -->
              </p>
              <p></p>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="card">
                <h3 class="card-title">Buscar Dirección</h3>
                <form action="" method="get">
                    <input type="text" name="direccion" placeholder="Ingrese la dirección">
                    <input type="submit" value="Buscar">
                    <br>
                    <?php
                    if (isset($_GET['direccion'])) {
                        $direccion = $_GET['direccion'];
                        $propiedades = $this->modeloPropiedad->FiltrarDireccion($direccion);
                        
                        if ($propiedades && count($propiedades) > 0) {
                            echo '<table class="table table-bordered">';
                            echo '<thead><tr><th>Dirección</th><th>Número de Habitaciones</th></tr></thead>';
                            echo '<tbody>';
                            foreach ($propiedades as $propiedad) {
                                echo '<tr>';
                                echo '<td>' . htmlspecialchars($propiedad->propiedad_direccion) . '</td>';
                                echo '<td>' . htmlspecialchars($propiedad->propiedad_numero_habitaciones) . '</td>';
                                echo '</tr>';
                            }
                            echo '</tbody>';
                            echo '</table>';
                        } else {
                            echo "No se encontró la dirección";
                        }
                    }
                    ?>
                </form>
            </div>
        </div>

        </div>
      </div>
