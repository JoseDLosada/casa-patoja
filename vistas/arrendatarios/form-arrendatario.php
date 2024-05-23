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
                    <form class="form-horizontal" method="POST" action="?fControlador=arrendatario&fAccion=GuardarArrendatario">

                      <fieldset>
                        <legend><?=$titulo?></legend>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="arr-cedula">Cedula Arrendatario</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="arr-cedula" type="number" placeholder="10612952" >
                          </div>                 
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="arr-nombre">Nombre Arrendatario</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="arr-nombre" type="text" placeholder="Pedro" >
                          </div>                 
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="arr-apellido">Apellido Arrendatario</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="arr-apellido" type="text" placeholder="Lopez" >
                          </div>                 
                        </div>


                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="arr-telefono">Telefono Arrendatario</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="arr-telefono" type="number" placeholder="3148788275" >
                          </div>                 
                        </div>
                      

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="arr-ocupacion">Ocupacion Arrendatario</label>
                          <div class="col-lg-10">
                            <select class="form-control" name="arr-ocupacion">
                              <option>Estudiante</option>
                              <option >Trabajador</option>
                              <option >Independiente</option>
                            </select>               
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="arr-emergencia">Contacto Emergencia</label>
                          <div class="col-lg-10">
                            <input class="form-control" name="arr-emergencia" type="number" placeholder="3126744795">
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