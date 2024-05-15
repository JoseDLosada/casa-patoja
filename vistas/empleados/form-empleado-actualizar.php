<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i>Formulario Empleado</h1>
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
                    <form class="form-horizontal" method="POST" action="?fControlador=empleado&fAccion=ActualizarEmpleado">

                      <fieldset>
                        <legend><?=$titulo?></legend>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="emp-cedula">Cedula Empleado</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="emp-cedula" type="number" placeholder="Cedula" value="<?=$empleado->getEmpleado_cedula()?>" readonly>
                          </div>                 
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="emp-nombre">Nombre Empleado</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="emp-nombre" type="text" placeholder="Nombre Empleado" value="<?=$empleado->getEmpleado_nombre()?>">
                          </div>                 
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="emp-apellido">Apellido Empleado</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="emp-apellido" type="text" placeholder="Apellido Empleado" value="<?=$empleado->getEmpleado_apellido()?>">
                          </div>                 
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="emp-direccion">Direccion Empleado</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="emp-direccion" type="text" placeholder="Direccion Empleado" value="<?=$empleado->getEmpleado_direccion()?>">
                          </div>                 
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="emp-telefono">Telefono Empleado</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="emp-telefono" type="number" placeholder="Telefono Empleado" value="<?=$empleado->getEmpleado_telefono()?>">
                          </div>                 
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="emp-codigo-salud">Codigo Salud Empleado</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="emp-codigo-salud" type="text" placeholder="Codigo Salud Empleado" value="<?=$empleado->getEmpleado_codigo_salud()?>">
                          </div>                 
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="emp-tipo">Tipo Empleado</label>
                          <div class="col-lg-10">
                            <select class="form-control" name="emp-tipo">
                                <option value="Administrativo" <?= ($empleado->getEmpleado_tipo() == "Administrativo") ? "selected" : "" ?>>Administrativo</option>
                                <option value="Servicios Generales" <?= ($empleado->getEmpleado_tipo() == "Servicios Generales") ? "selected" : "" ?>>Servicios Generales</option>
                                <option value="Contratista" <?= ($empleado->getEmpleado_tipo() == "Contratista") ? "selected" : "" ?>>Contratista</option>
                            </select>               
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="emp-salario">Salario</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="emp-salario" type="number" placeholder="0" value="<?=$empleado->getEmpleado_salario()?>">
                          </div>                 
                        </div>


                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="emp-prodiedad">Propiedad</label>
                          <div class="col-lg-10">
                            <select class="form-control" name="emp-prodiedad">
                            <?php
                                    // Iterar sobre las habitaciones disponibles
                                    foreach ($this->modeloEmpleado->ListarDireccion() as $resultado) {
                                       // Mostrar cada habitación disponible como una opción en el select
                                         echo "<option>" . $resultado->direccion . "</option>";
                                     }
                                     ?>
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