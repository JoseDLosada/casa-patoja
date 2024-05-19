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
                    <form class="form-horizontal" method="POST" action="?fControlador=habitacion&fAccion=ActualizarHabitacion">

                      <fieldset>
                        <legend><?=$titulo?></legend>

                        
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="hab-prodiedad">Propiedad</label>
                            <div class="col-lg-10">
                            <input class="form-control" type="text" name="hab-prodiedad" value="<?=$habitacion->getPropiedad_direccion()?>" readonly>             
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-lg-2 control-label" for="hab-numero">Numero Habitación</label>
                      <div class="col-lg-10">
                        <input class="form-control" name="hab-numero" type="number" placeholder="0" value="<?=$habitacion->getHabitacion_numero()?>" readonly>
                      </div>                 
                    </div>
                    
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="hab-disponibilidad">Disponibilidad</label>
                          <div class="col-lg-10">
                            <select class="form-control" name="hab-disponibilidad">
                              <option value="Libre" <?=($habitacion->getHabitacion_disponibilidad() == "Libre") ? "selected": "" ?>>Libre</option>
                              <option value="Ocupada" <?=($habitacion->getHabitacion_disponibilidad() == "Ocupada") ? "selected": "" ?>>Ocupada</option>
                            </select>               
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="hab-tarifa">Tarifa Alquiler</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="hab-tarifa" type="number" placeholder="0" value="<?=$habitacion->getHabitacion_tarifa_alquiler()?>">
                          </div>                 
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="hab-banio">Baño Privado</label>
                          <div class="col-lg-10">
                            <select class="form-control" name="hab-banio">
                            <option value="Si" <?=($habitacion->getHabitacion_banio_privado() == "Si") ? "selected": "" ?>>Si</option>
                            <option value="No" <?=($habitacion->getHabitacion_banio_privado() == "No") ? "selected": "" ?>>No</option>
                            </select>               
                          </div>
                        </div>


                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="hab-tamanio">Tamaño Habitación</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="hab-tamanio" type="text" placeholder="Grande,Mediana,Pequeña" value="<?=$habitacion->getHabitacion_tamanio()?>">
                          </div>                 
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="hab-amueblada">Habitacion Amueblada</label>
                          <div class="col-lg-10">
                            <select class="form-control" name="hab-amueblada">
                                <option value="Si" <?=($habitacion->getHabitacion_amueblada() == "Si") ? "selected": "" ?>>Si</option>
                                <option value="No" <?=($habitacion->getHabitacion_amueblada() == "No") ? "selected": "" ?>>No</option>
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