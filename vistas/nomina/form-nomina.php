<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i><?=$formulario?></h1>
            <p><?=$titulo?></p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Forms</li>
              <li><a href="#"><?=$titulo?></a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-lg-6">
                  <div class="well bs-component">
                    <form class="form-horizontal" method="POST" action="?fControlador=nomina&fAccion=GuardarNomina">

                      <fieldset>
                        <legend><?=$titulo?></legend>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="g-id">ID</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="nom-id" type="number" placeholder="ID Gasto" readonly>
                          </div>                 
                        </div>

                        <div class="form-group">
                              <label class="col-lg-2 control-label" for="nom-empleado">Cedula Empleado</label>
                              <div class="col-lg-10">
                                  <select class="form-control" name="nom-empleado" required>
                                      <?php
                                        // Iterar sobre las habitaciones disponibles
                                        foreach ($this->modeloNomina->ListarEmpleados() as $resultado) {
                                            // Mostrar cada habitación disponible como una opción en el select
                                            echo "<option value='" . $resultado->empleado_cedula . "'>" . $resultado->empleado_cedula . " - " . $resultado->nombre . "</option>";
                                            //"<option>" . $resultado->empleado_cedula . "</option>";

                                          }
                                          ?>
                                    </select>               
                                </div>
                            </div>

      

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="nom-pago">Pago Nomina</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="nom-pago" type="number" placeholder="0">
                          </div>                 
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="nom-fecha">Fecha Pago</label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="nom-fecha" type="date" >
                          </div>
                        </div>
                  

                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default" type="reset">Cancel</button>
                            <button class="btn btn-primary" type="submit">Submit</button>
                          </div>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>         
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>