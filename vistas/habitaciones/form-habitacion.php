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
                    <form class="form-horizontal" method="POST" action="?fControlador=habitacion&fAccion=GuardarHabitacion">

                      <fieldset>
                        <legend><?=$titulo?></legend>

                        
                        <div class="form-group">
                            <label class="col-lg-2 control-label" for="hab-prodiedad">Propiedad</label>
                            <div class="col-lg-10">
                                <select class="form-control" name="hab-prodiedad">
                                    <?php
                                     // Iterar sobre las habitaciones disponibles
                                     foreach ($this->modeloHabitacion->ListarDireccion() as $resultado) {
                                         // Mostrar cada habitación disponible como una opción en el select
                                         echo "<option>" . $resultado->direccion . "</option>";
                                        }
                                        ?>
                            </select>               
                        </div>
                    </div>
                    
                    <div class="form-group">
                      <label class="col-lg-2 control-label" for="hab-numero">Numero Habitación</label>
                      <div class="col-lg-10">
                        <input class="form-control" name="hab-numero" type="number" placeholder="0" >
                      </div>                 
                    </div>
                    
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="hab-disponibilidad">Disponibilidad</label>
                          <div class="col-lg-10">
                            <select class="form-control" name="hab-disponibilidad">
                              <option>Libre</option>
                              <option >Ocupada</option>
                            </select>               
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="hab-tarifa">Tarifa Alquiler</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="hab-tarifa" type="number" placeholder="0" >
                          </div>                 
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="hab-banio">Baño Privado</label>
                          <div class="col-lg-10">
                            <select class="form-control" name="hab-banio">
                              <option>Si</option>
                              <option >No</option>
                            </select>               
                          </div>
                        </div>


                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="hab-tamanio">Tamaño Habitación</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="hab-tamanio" type="text" placeholder="Grande,Mediana,Pequeña" >
                          </div>                 
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="hab-amueblada">Habitacion Amueblada</label>
                          <div class="col-lg-10">
                            <select class="form-control" name="hab-amueblada">
                              <option>Si</option>
                              <option >No</option>
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