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
                    <form class="form-horizontal" method="POST" action="?fControlador=gasto&fAccion=GuardarGasto">

                      <fieldset>
                        <legend><?=$titulo?></legend>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="g-id">ID</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="g-id" type="number" placeholder="ID Gasto" readonly value= "<?=$gasto->getGasto_id()?>" >
                          </div>                 
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="g-categoria">Categoria</label>
                          <div class="col-lg-10">
                            <select class="form-control" name="g-categoria" >
                              <option value="Servicios públicos" <?= ($gasto->getGasto_categoria() == "Servicios públicos") ? "selected" : "" ?>>Servicios públicos</option>
                              <option value="Mantenimiento" <?= ($gasto->getGasto_categoria() == "Mantenimiento") ? "selected" : "" ?>>Mantenimiento</option>
                              <option value="Compra insumos" <?= ($gasto->getGasto_categoria() == "Compra insumos") ? "selected" : "" ?>>Compra insumos</option>
                              <option value="Pago Nomina" <?= ($gasto->getGasto_categoria() == "Pago Nomina") ? "selected" : "" ?>>Pago Nomina</option>
                            </select>               
                          </div>
                        </div>


                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="g-monto">Monto</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="g-monto" type="number" placeholder="Valor del Gasto" value="<?=$gasto->getGasto_monto()?>">
                          </div>                 
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="g-fecha">Fecha</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="g-fecha" type="date" value="<?= $gasto->getGasto_fecha()->format('Y-m-d') ?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="g-nit">NIT Factura</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="g-nit" type="text" placeholder="NIT" value="<?=$gasto->getGasto_nit_factura()?>">
                          </div>                 
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="g-propiedad">Propiedad</label>
                          <div class="col-lg-10">                     
                            <select class="form-control" name="g-propiedad">
                            <?php
                                // Obtener todas las direcciones
                                $direcciones = array();
                                foreach ($this->modeloGasto->ListarDireccion() as $resultado) {
                                    $direcciones[] = $resultado->direccion;
                                }

                                // Eliminar direcciones duplicadas
                                $direccionesUnicas = array_unique($direcciones);

                                // Iterar sobre las direcciones únicas y mostrarlas como opciones en el select
                                foreach ($direccionesUnicas as $direccion) {
                                    echo "<option value='" . $direccion . "'>" . $direccion . "</option>";
                              }
                                
                              ?>
                            </select>
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="g-descripcion">Descripcion</label>
                          <div class="col-lg-10">

                            <textarea class="form-control" name="g-descripcion" rows="1"><?=$gasto->getGasto_descripcion()?></textarea>

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