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
              <h3 class="card-title">Buscar Direccion</h3>
              <form action="" method="get">
                <input type="text" name="direccion" placeholder="Ingrese la direccion">
                <input type="submit" value="Buscar">
                <br>
                  <?php
                  if(isset($_GET['direccion'])){
                    $propiedad= $this->modeloPropiedad->FiltrarDireccion($_GET['direccion']);
                    if($propiedad){
                      echo $propiedad->propiedad_direccion;
                    }else{
                      echo "No se encontro la direccion";
                    }
                  }
                  ?>
              </form>              
            </div>
          </div>

        </div>
      </div>