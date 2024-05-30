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
                              <input class="form-control" name="cnt-id" type="number" placeholder="ID Gasto" readonly value="<?=$contrato->getContrato_id()?>">
                            </div>                 
                          </div>

                          <div class="form-group">
                              <label class="col-lg-2 control-label" for="cnt-arrendatario">Cedula Arrendatario</label>
                              <div class="col-lg-10">
                                <input class="form-control" name="cnt-arrendatario" type="number" placeholder="ID Gasto" readonly value="<?=$contrato->getArrendatario_cedula()?>">
                                                                           
                                </div>
                            </div>

                            <div class="form-group">
                              <label class="col-lg-2 control-label" for="cnt-propiedad">Propiedad</label>
                              <div class="col-lg-10">
                                <input class="form-control" name="cnt-propiedad" type="text" placeholder="Numero Habitación" required value="<?=$contrato->getPropiedad_direccion()?>" readonly>              
                              </div>
                          </div>

   
                      <div class="form-group">
                          <label class="col-lg-2 control-label" for="cnt-habitacion">Numero Habitación</label>
                          <div class="col-lg-10">
                             <input class="form-control" name="cnt-habitacion" type="text" placeholder="Numero Habitación" required value="<?=$contrato->getHabitacion_numero()?>" readonly>              
                          </div>
                      </div>

                 


                         
                      
                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="cnt-costo">Costo Alquiler</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="cnt-costo" type="number" placeholder="0" required value="<?=$contrato->getContrato_costo()?>">
                        </div>                 
                      </div>
                    

                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="cnt-fecha-inicio">Fecha Inicio</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="cnt-fecha-inicio" type="date" id="cnt-fecha-inicio" required value="<?= $contrato->getContrato_fecha_inicio()->format('Y-m-d') ?>">
                        </div>
                      </div>

                      <div class="form-group">
                        <label class="col-lg-2 control-label" for="cnt-fecha-fin">Fecha Fin</label>
                        <div class="col-lg-10">
                          <input class="form-control" name="cnt-fecha-fin" id="cnt-fecha-fin" type="date" value="<?= $contrato->getContrato_fecha_final()->format('Y-m-d') ?>">
                        </div>
                      </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="cnt-estado">Estado Contrato</label>
                          <div class="col-lg-10">
                            <select class="form-control" name="cnt-estado" required>
                              <!-- <option>Activo</option>
                              <option >Finalizado</option> -->
                              <option value="Activo" <?= ($contrato->getContrato_estado() == "Activo") ? "selected" : "" ?>>Activo</option>
                              <option value="Finalizado" <?= ($contrato->getContrato_estado() == "Finalizado") ? "selected" : "" ?>>Finalizado</option>
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