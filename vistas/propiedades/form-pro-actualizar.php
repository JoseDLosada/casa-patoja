<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i>Formulario Propiedad</h1>
            <p>Ingrese la informacion de la propiedad</p>
          </div>
          <div>
            <ul class="breadcrumb">
              <li><i class="fa fa-home fa-lg"></i></li>
              <li>Forms</li>
              <li><a href="#">Form Components</a></li>
            </ul>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="row">
                <div class="col-lg-6">
                  <div class="well bs-component">

                    <form class="form-horizontal" method="POST" action="?fControlador=propiedad&fAccion=Actualizar">

                      <fieldset>
                        <legend>Actualizar Propiedad</legend>

                        <div class="form-group">
                          <label  class="col-lg-2 control-label" for="pro_direccion"> Direccion </label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="pro_direccion" type="text" placeholder="Direccion" readonly value="<?=$propiedad->getPropiedad_direccion()?>">
                          </div>

                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="pro_barrio"> Barrio </label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="pro_barrio" type="text" placeholder="Barrio" value="<?=$propiedad->getPropiedad_barrio()?>">
                          </div>

                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="pro_habitaciones"> Numero de Habitaciones </label>
                          <div class="col-lg-10">
                            <input required class="form-control" name="pro_habitaciones" type="number" placeholder="Numero de habitaciones" value="<?=$propiedad->getPropiedad_numero_habitaciones()?>">
                          </div>
                        </div>

                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="pro_descripcion"> Descripcion </label>
                          <div class="col-lg-10">

                            <textarea class="form-control" name="pro_descripcion" rows="3" placeholder="Descripcion general de la propiedad."><?=$propiedad->getPropiedad_descripcion()?></textarea>

                          </div>
                        </div>

                        <div class="form-group">
                          <div class="col-lg-10 col-lg-offset-2">
                            <button class="btn btn-default" type="reset">Cancelar</button>
                            <button class="btn btn-primary" type="submit">Enviar</button>
                          </div>
                        </div>
                      </fieldset>
                    </form>
                  </div>
                </div>
                </div>
              </div>
            </div>
          </div>
        </div>