<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i>Formulario Gastos</h1>
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
                    <form class="form-horizontal" method="POST" action="?fControlador=ingreso&fAccion=GuardarIngreso">

                      <fieldset>
                        <legend><?=$titulo?></legend>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="i-id">ID</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="i-id" type="number" placeholder="ID Gasto" readonly value= "<?=$ingreso->getPagoAlq_id()?>" >
                          </div>                 
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="i-contrato">ID Contrato</label>
                          <div class="col-lg-10">
                            <select class="form-control" name="i-contrato">
                            <?php
                                    // Iterar sobre las habitaciones disponibles
                                    foreach ($this->modeloIngreso->ListarContrato() as $resultado) {
                                        // Mostrar cada habitación disponible como una opción en el select
                                        echo "<option value='" . $resultado->contrato . "'>" . $resultado->contrato . " - " . $resultado->arrendatario . "</option>";
                                        //echo "<option>" . $resultado->contrato_id . "</option>";
                                    }
                                    ?>
                            </select>               
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="i-fecha">Fecha</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="i-fecha" type="date" value="<?= $ingreso->getPagoAlq_fecha()->format('Y-m-d') ?>">
                          </div>
                        </div>


                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="i-monto">Monto</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="i-monto" type="number" placeholder="Valor del Gasto" value="<?=$ingreso->getPagoAlq_monto()?>">
                          </div>                 
                        </div>

                  

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="i-metodo">Metodo Pago</label>
                          <div class="col-lg-10">
                            <select class="form-control" name="i-metodo">
                              <option value="Efectivo" <?= ($ingreso->getPagoAlq_metodo() == "Efectivo") ? "selected" : "" ?>>Efectivo</option>
                              <option value="Transaccion" <?= ($ingreso->getPagoAlq_metodo() == "Transaccion") ? "selected" : "" ?>>Transaccion</option>
                            </select>               
                          </div>
                        </div>
              
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="i-descripcion">Descripcion</label>
                          <div class="col-lg-10">
                            <textarea class="form-control" name="i-descripcion" rows="1"><?=$ingreso->getPagoAlq_descripcion()?></textarea>
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