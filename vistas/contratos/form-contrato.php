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
                    <form class="form-horizontal" method="POST" action="?fControlador=contrato&fAccion=GuardarContrato">

                      <fieldset>
                        <legend><?=$titulo?></legend>

                          <div class="form-group">
                            <label class="col-lg-2 control-label" for="cnt-id">ID</label>
                            <div class="col-lg-10">
                              <input class="form-control" name="cnt-id" type="number" placeholder="ID Gasto" readonly>
                            </div>                 
                          </div>

                          <div class="form-group">
                              <label class="col-lg-2 control-label" for="ctn-arrendatario">Cedula Arrendatario</label>
                              <div class="col-lg-10">
                                  <select class="form-control" name="ctn-arrendatario" required>
                                      <?php
                                        // Iterar sobre las habitaciones disponibles
                                        foreach ($this->modeloContrato->ListarArrendatario() as $resultado) {
                                            // Mostrar cada habitación disponible como una opción en el select
                                            echo "<option>" . $resultado->arrendatario_cedula . "</option>";
                                          }
                                          ?>
                                    </select>               
                                </div>
                            </div>

                    

                          
                      <div class="form-group">
                          <label class="col-lg-2 control-label" for="cnt-habitacion">Numero Habitación</label>
                          <div class="col-lg-10">
                              <select class="form-control" name="cnt-habitacion" required>
                                  <?php
                                  
                                    // Iterar sobre las habitaciones disponibles
                                    foreach ($this->modeloContrato->ListarHabitacion() as $resultado) {
                                        // Mostrar cada habitación disponible como una opción en el select
                                        echo "<option>" . $resultado-> habitacion_numero ."</option>";
                                      }
                                      ?>
                                      
                              </select>               
                          </div>
                      </div>

                         
                      
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="cnt-costo">Costo Alquiler</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="cnt-costo" type="number" placeholder="0" required>
                        </div>                 
                      </div>
                    

                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="cnt-fecha-inicio">Fecha Inicio</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="cnt-fecha-inicio" type="date" required>
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="cnt-fecha-fin">Fecha Fin</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="cnt-fecha-fin" type="date" >
                        </div>
                      </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="cnt-estado">Estado Contrato</label>
                          <div class="col-lg-10">
                            <select class="form-control" name="cnt-estado" required>
                              <option>Activo</option>
                              <option >Finalizado</option>
                            </select>               
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