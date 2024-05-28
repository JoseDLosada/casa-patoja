<div class="content-wrapper">
    <!-- Page Title -->
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
        <!-- Arrendatarios -->
        <div class="col-md-3">
            <div class="widget-small primary">
                <i class="icon fa fa-users fa-3x"></i>
                <div class="info">
                    <h4>Número de Arrendatarios</h4>
                    <p><?php $arrendatario = $this->modeloPropiedad->MostrarNumeroArrendatarios()?>
                    <?=$arrendatario->numero_arrendatarios?> Arrendatarios</p>
                </div>
            </div>
        </div>
        
        <!-- Contratos Activos -->
        <div class="col-md-3">
            <div class="widget-small info">
                <i class="icon fa fa-files-o fa-3x"></i>
                <div class="info">
                    <h4>Contratos Activos</h4>
                    <p><?php $propiedad = $this->modeloContrato->ContarContratosActivos()?>
                    <?=$propiedad->contrato?> Contratos</p>
                </div>
            </div>
        </div>

        <!-- Habitaciones Libres -->
        <div class="col-md-3">
            <div class="widget-small info">
                <i class="icon fa fa-home fa-3x"></i>
                <div class="info">
                    <h4>Total Habitaciones Libres</h4>
                    <p><?php $habitacion = $this->modeloHabitacion->MostrarNumeroHabitaciones()?>
                    <?=$habitacion->numero_habitaciones?> Habitaciones Libres</p>
                </div>
            </div>
        </div>


        <!-- Habitaciones Ocupadas -->
        <div class="col-md-3">
            <div class="widget-small danger">
                <i class="icon fa fa-bed fa-3x"></i>
                <div class="info">
                    <h4>Total Habitaciones Ocupadas</h4>
                    <p><?php $habitacion = $this->modeloHabitacion->MostrarNumeroHabitacionesOcupadas()?>
                    <?=$habitacion->numero_habitaciones?> Habitaciones Ocupadas</p>
                </div>
            </div>
        </div>
        

        <!-- Lista de Propiedades -->
        <div class="col-md-12">
          <div class="card">
            <h3 class="card-title">Lista de Propiedades</h3>
            <div class="table-responsive">
              <table class="table">
                <thead>
                  <tr>
                    <th>Propiedad Dirección</th>
                    <th>Total Habitaciones Registradas</th>
                    <th>Habitaciones Libres</th>
                    <th>Habitaciones Ocupadas</th>
                    <th>Porcentaje Ocupacion</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($this->modeloPropiedad->ListarPropiedadHabitacionesLibres() as $resultado):?>
                  <tr>
                    <td> <?=$resultado->propiedad_direccion?> </td>
                    <td> <?=$resultado->total_habitaciones_registradas?> </td>
                    <td> <?=$resultado->total_habitaciones_libres?> </td>
                    <td> <?=$resultado->total_habitaciones_ocupadas?> </td>
                    <td> <?=$resultado->porcentaje_ocupacion?>% </td>
                  </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>

        <!-- Total de Habitaciones Registradas -->
        <div class="col-md-6">
            <div class="card">
                <h3 class="card-title">Total de Habitaciones Registradas</h3>
                <p><?php $propiedad = $this->modeloPropiedad->MostrarNumeroHabitaciones()?>
                <?=$propiedad->numero_habitaciones?> habitaciones</p>
            </div>
        </div>

        <!-- Total de empleados -->
        <div class="col-md-3">
            <div class="widget-small warning"><i class="icon fa fa-users fa-3x"></i>
              <div class="info">
                <h4>Total Empleados</h4>
                <p><?php $empleado= $this->modeloEmpleado->MostrarNumeroEmpleados()?>
                  <?=$empleado->numero_empleados?> Empelados</p>
              </div>
            </div>
          </div>
        
            <!-- <div class="clearfix"></div> -->
          <div class="col-md-12">
            <div class="card">
              <h3 class="card-title">Arrendatarios Pendientes de Pago: Mes Actual</h3>
              <div class="table-responsive">
                <table class="table">
                  <thead>
                    <tr>
                      <th>Arrendatario</th>
                      <th>Propiedad</th>
                      <th>Habitación</th>
                      <th>Contrato</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php foreach($this->modeloContrato->ListarMorosos() as $resultado):?>
                  <tr>
                    <td> <?=$resultado->arrendatario?> </td>
                    <td> <?=$resultado->propiedad?> </td>
                    <td> <?=$resultado->habitacion?> </td>
                    <td> <?=$resultado->contrato?> </td>
                  </tr>
                  <?php endforeach;?>
                    
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          
        <!-- Buscar Dirección -->
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


            <div class="col-md-6">
              <div class="card">
                <h3 class="card-title">Filtrar Gastos por Mes</h3>
                <form action="" method="get">
                  <br>
                  <label for="mes">Selecciona el mes:</label>
                  <select name="mes" id="mes">
                    <option value="1">Enero</option>
                    <option value="2">Febrero</option>
                    <option value="3">Marzo</option>
                    <option value="4">Abril</option>
                    <option value="5">Mayo</option>
                    <option value="6">Junio</option>
                    <option value="7">Julio</option>
                    <option value="8">Agosto</option>
                    <option value="9">Septiembre</option>
                    <option value="10">Octubre</option>
                    <option value="11">Noviembre</option>
                    <option value="12">Diciembre</option>
                  </select>
                  <button type="submit" class="btn btn-primary">Buscar</button>
                </form>

                <?php
                // Verificar si se ha seleccionado un mes
                if (isset($_GET['mes'])) {
                  $mes = $_GET['mes'];
                  // Obtener los gastos del mes seleccionado
                  $gastos = $this->modeloGasto->FiltrarGastosPorMes($mes);

                  // Verificar si se encontraron gastos
                  if ($gastos && count($gastos) > 0) {
                    echo '<div class="table-responsive">';
                    echo '<table class="table table-bordered table-striped">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th>Categoría</th>';
                    echo '<th>Monto</th>';
                    echo '<th>Fecha</th>';
                    echo '<th>Día</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                    foreach ($gastos as $gasto) {
                      echo '<tr>';
                      echo '<td>' . htmlspecialchars($gasto->categoria) . '</td>';
                      echo '<td>' . htmlspecialchars($gasto->monto) . '</td>';
                      echo '<td>' . htmlspecialchars($gasto->fecha) . '</td>';
                      echo '<td>' . htmlspecialchars($gasto->dia) . '</td>';
                      echo '</tr>';
                    }
                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                  } else {
                    echo "<p>No se encontraron gastos para el mes seleccionado.</p>";
                  }
                }
                ?>
              </div>
            </div>


           

    </div>
</div>
