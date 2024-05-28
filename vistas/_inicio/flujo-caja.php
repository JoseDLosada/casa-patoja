<div class="content-wrapper">
  <!-- Page Title -->
  <div class="page-title">
    <div>
      <h1><i class="fa fa-dashboard"></i> Flujo de Caja 🤑</h1>
      <p>Información Administrativa de Casa Patoja</p>
    </div>
    <div>
      <ul class="breadcrumb">
        <li><i class="fa fa-home fa-lg"></i></li>
        <li><a href="#">Movimientos</a></li>
      </ul>
    </div>
  </div>

  <div class="row">

    <div class="col-md-3">
      <div class="widget-small info">
        <i class="icon fa fa-money fa-3x"></i>
        <div class="info">
          <h4>Total Ingresos Mes</h4>
          <p>
            <?php $ingreso = $this->modeloIngreso->MostrarTotalIngresosMes() ?>
            <?= $ingreso->total_pagos ?> $
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="widget-small danger">
        <i class="icon fa fa-arrow-down fa-3x"></i>
        <div class="info">
          <h4>Total Gastos Mes</h4>
          <p>
            <?php $gasto = $this->modeloGasto->MostrarTotalGastosMes() ?>
            <?= $gasto->monto ?> $
          </p>
        </div>
      </div>
    </div>


    <div class="col-md-3">
      <div class="widget-small warning">
        <i class="icon fa fa-files-o fa-3x"></i>
        <div class="info">
          <h4>Total Nomina Mes</h4>
          <p>
            <?php $nomina = $this->modeloNomina->MostrarTotalNominaMes() ?>
            <?= $nomina->total ?> $
          </p>
        </div>
      </div>
    </div>

    <div class="col-md-3">
      <div class="widget-small primary">
        <i class="icon fa fa-bank fa-3x"></i>
        <div class="info">
          <h4>Balance Mes</h4>
          <p>
            <?php $balance = $this->modeloPropiedad->BalanceToTalMes() ?>
            <?= $balance->total_balance ?> $
          </p>
        </div>
      </div>
    </div>




    <div class="col-md-6">
      <div class="card">
        <h3 class="card-title">Gastos Propiedad: Mes Actual</h3>
        <table class="table table-hover">
          <thead>
            <tr>

              <th>Categoria</th>
              <th>Monto</th>
              <th>Fecha</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->modeloGasto->ListarGastosMes() as $resultado) : ?>
              <tr>
                <td><?= $resultado->categoria ?></td>
                <td><?= $resultado->monto ?></td>
                <td><?= $resultado->fecha ?></td>
              </tr>
            <?php endforeach; ?>
        </table>
      </div>
    </div>





    <div class="col-md-6">
      <div class="card">
        <h3 class="card-title">Pagos Nomina: Mes Actual</h3>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Cedula</th>
              <th>nombre</th>
              <th>Cargo</th>
              <th>Monto</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->modeloNomina->ListarNominaMes() as $resultado) : ?>
              <tr>
                <td><?= $resultado->cedula ?></td>
                <td><?= $resultado->nombre ?></td>
                <td><?= $resultado->cargo ?></td>
                <td><?= $resultado->monto ?></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-md-6">
      <div class="card">
        <h3 class="card-title">Pagos Arrendatarios: Mes Actual</h3>
        <table class="table table-hover">
          <thead>
            <tr>
              <th>Arrendatario</th>
              <th>Propiedad</th>
              <th>Habitacion</th>
              <th>Contrato</th>
              <th>Monto</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($this->modeloIngreso->ListarPagosMes() as $resultado) : ?>
              <tr>
                <td><?= $resultado->arrendatario ?></td>
                <td><?= $resultado->propiedad ?></td>
                <td><?= $resultado->habitacion ?></td>
                <td><?= $resultado->contrato ?></td>
                <td><?= $resultado->monto ?></td>
              </tr>
            <?php endforeach; ?>

          </tbody>
        </table>
      </div>
    </div>

 
  </div>
</div>
