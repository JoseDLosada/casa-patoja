<div class="content-wrapper">
        <div class="page-title">
          <div>
            <h1><i class="fa fa-edit"></i> Form Components</h1>
            <p>Bootstrap default form components</p>
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
                    <form class="form-horizontal">
                      <fieldset>
                        <legend>Legend</legend>
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="inputEmail">Email</label>
                          <div class="col-lg-10">
                            <input class="form-control" id="inputEmail" type="text" placeholder="Email">
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="inputPassword">Password</label>
                          <div class="col-lg-10">
                            <input class="form-control" id="inputPassword" type="password" placeholder="Password">
                            <div class="checkbox">
                              <label>
                                <input type="checkbox">Checkbox
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="textArea">Textarea</label>
                          <div class="col-lg-10">
                            <textarea class="form-control" id="textArea" rows="3"></textarea><span class="help-block">A longer block of help text that breaks onto a new line and may extend beyond one line.</span>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label">Radios</label>
                          <div class="col-lg-10">
                            <div class="radio">
                              <label>
                                <input id="optionsRadios1" type="radio" name="optionsRadios" value="option1" checked="">Option one is this
                              </label>
                            </div>
                            <div class="radio">
                              <label>
                                <input id="optionsRadios2" type="radio" name="optionsRadios" value="option2">Option two can be something else
                              </label>
                            </div>
                          </div>
                        </div>
                        <div class="form-group">
                          <label class="col-lg-2 control-label" for="select">Selects</label>
                          <div class="col-lg-10">
                            <select class="form-control" id="select">
                                <?php
                                    // Iterar sobre las habitaciones disponibles
                                    foreach ($this->modelo->MostrarDireccion() as $resultado) {
                                        // Mostrar cada habitación disponible como una opción en el select
                                        echo "<option>" . $resultado->propiedad_direccion . "</option>";
                                    }
                                    ?>
                            </select><br>
                            <select class="form-control" multiple="">
                              <option>1</option>
                              <option>2</option>
                              <option>3</option>
                              <option>4</option>
                              <option>5</option>
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
                <div class="col-lg-4 col-lg-offset-1">
                  <form class="bs-component">
                    <div class="form-group">
                      <label class="control-label" for="focusedInput">Focused input</label>
                      <input class="form-control" id="focusedInput" type="text" value="This is focused...">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="disabledInput">Disabled input</label>
                      <input class="form-control" id="disabledInput" type="text" placeholder="Disabled input here..." disabled="">
                    </div>
                    <div class="form-group has-warning">
                      <label class="control-label" for="inputWarning">Input warning</label>
                      <input class="form-control" id="inputWarning" type="text">
                    </div>
                    <div class="form-group has-error">
                      <label class="control-label" for="inputError">Input error</label>
                      <input class="form-control" id="inputError" type="text">
                    </div>
                    <div class="form-group has-success">
                      <label class="control-label" for="inputSuccess">Input success</label>
                      <input class="form-control" id="inputSuccess" type="text">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputLarge">Large input</label>
                      <input class="form-control input-lg" id="inputLarge" type="text">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputDefault">Default input</label>
                      <input class="form-control" id="inputDefault" type="text">
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="inputSmall">Small input</label>
                      <input class="form-control input-sm" id="inputSmall" type="text">
                    </div>
                    <div class="form-group">
                      <label class="control-label">Input addons</label>
                      <div class="input-group"><span class="input-group-addon">$</span>
                        <input class="form-control" type="text"><span class="input-group-btn">
                          <button class="btn btn-default" type="button">Button</button></span>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>