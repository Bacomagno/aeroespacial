  <!-- Breadcrumb-->
    <div class="breadcrumb-holder">
        <div class="container-fluid">
            <ul class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo IP_SERVER ?>adm">Inicio</a></li>
            <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>perfil">Perfil </a></li>
            </ul>
        </div>
    </div>
      <!-- /Breadcrumb -->

      <div class="container">
          <div class="main-body">
              <br>
    <form id="usuario_actualizar"  method="post" enctype="multipart/form-data">
     <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                    <img src="<?php echo IP_SERVER.$usuario[0]->usuario_foto;?>" alt="Foto" class="rounded-circle" width="150">
                    <div class="mt-3">
                      <h4><?php echo $usuario[0]->usuario_nombre.' '.$usuario[0]->usuario_apellidos;?></h4>
                      <p class="text-secondary mb-1"><?php echo $usuario[0]->rol_nombre;?></p>
                      <p class="text-muted font-size-sm"><?php echo $usuario[0]->usuario_ciudad;?></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-sm-12 text-center">
                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-primary">Actualizar Contraseña</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Nombre</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" readonly require value="<?php echo $usuario[0]->usuario_nombre.' '.$usuario[0]->usuario_apellidos; ?>">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Usuario</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="text" class="form-control" readonly require name="usuario_usuario" value="<?php echo $usuario[0]->usuario_usuario; ?>">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Telefono</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input type="tel" id="usuario_telefono" class="form-control" placeholder="+57311111111" name="usuario_telefono" value="<?php echo $usuario[0]->usuario_telefono; ?>">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Correo</h6>
                    </div>
                    <div class="col-sm-9 text-secondary input-material">
                        <input type="email" class="form-control" require name="usuario_correo" value="<?php echo $usuario[0]->usuario_correo; ?>">
                    </div>
                  </div>
                  <hr>
                  <div class="usuario_ciudad">
                    <label>Ciudad</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                    <div class="input-group">
                      <select class="form-control" id="usuario_ciudad" name="usuario_ciudad">
                                  <option selected value="<?php echo $usuario[0]->usuario_ciudad ?>"><?php echo $usuario[0]->usuario_ciudad ?></option>
                                  <option value="Arauca">Arauca</option>
                                  <option value="Armenia">Armenia</option>
                                  <option value="Barranquilla">Barranquilla</option>
                                  <option value="Bogotá">Bogotá</option>
                                  <option value="Bucaramanga">Bucaramanga</option>
                                  <option value="Cali">Cali</option>
                                  <option value="Cartagena">Cartagena</option>
                                  <option value="Cúcuta">Cúcuta</option>
                                  <option value="Florencia">Florencia</option>
                                  <option value="Ibagué">Ibagué</option>
                                  <option value="Leticia">Leticia</option>
                                  <option value="Manizales">Manizales</option>
                                  <option value="Medellín">Medellín</option>
                                  <option value="Mitú">Mitú</option>
                                  <option value="Mocoa">Mocoa</option>
                                  <option value="Montería">Montería</option>
                                  <option value="Neiva">Neiva</option>
                                  <option value="Pasto">Pasto</option>
                                  <option value="Pereira">Pereira</option>
                                  <option value="Popayán">Popayán</option>
                                  <option value="Puerto Carreño">Puerto Carreño</option>
                                  <option value="Puerto Inírida">Puerto Inírida</option>
                                  <option value="Quibdó">Quibdó</option>
                                  <option value="Riohacha">Riohacha</option>
                                  <option value="San Andrés">San Andrés</option>
                                  <option value="San José del Guaviare">San José del Guaviare</option>
                                  <option value="Santa Marta">Santa Marta</option>
                                  <option value="Sincelejo">Sincelejo</option>
                                  <option value="Tunja">Tunja</option>
                                  <option value="Valledupar">Valledupar</option>
                                  <option value="Villavicencio">Villavicencio</option>
                                  <option value="Yopal">Yopal</option>
                              </select>
                    </div>
                  </div>
                  <hr>
                  <div class="usuario_rol_id">
                    <label>Rol</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                    <div class="input-group">
                      <select class="form-control" id="usuario_rol_id" name="usuario_rol_id">
                        <?php foreach ($roles as $r){ ?>
                            <option value="<?php echo $r->rol_id; ?>" <?php if($r->rol_id==$usuario[0]->usuario_rol_id){echo "selected";}?> ><?php echo $r->rol_nombre; ?></option>
                        <?php } ?>
                        </select>
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Actualizar Foto</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <input id="usuario_foto" type="file" accept="image/png,image/jpeg,image/jpg" name="usuario_foto" class="input-material">
                    </div>
                  </div>
                  <hr>
                  <div class="row">
                    <div class="col-sm-12">
                        <input type="submit" id="actualizarpr" name="actualizarpr" value="Actualizar" class="btn btn-primary">
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
    </form>
    <div class="card">
        <!-- Modal-->
        <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
          <div role="document" class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 id="exampleModalLabel" class="modal-title">Cambio de Contraseña</h5>
                <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                <form method="POST" action="" id="usuario_actualizarc">
                  <div class="form-group">
                    <label>Nueva Contraseña</label>
                    <div class="input-group">
                      <input type="password" placeholder="Password" class="form-control" name="usuario_contrasena" id="usuario_contrasena" >
                      <div class="input-group-append">
                      <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPassword()"> <span class="fa fa-eye-slash icon"></span> </button>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Confirmar Contraseña</label>
                    <div class="input-group">
                    <input type="password" placeholder="Password" class="form-control" name="usuario_contrasenac" id="usuario_contrasenac">
                    <div class="input-group-append">
                      <button id="show_password" class="btn btn-primary" type="button" onclick="mostrarPasswordc()"> <span class="fa fa-eye-slash icon"></span> </button>
                      </div>
                    </div>
                  </div>
                  <br>
                  <div class="modal-footer">
                    <button type="button" data-dismiss="modal" class="btn btn-secondary">Cerrar</button>
                    <input type="submit" id="actualziarc" name="actualziarc" value="Actualziar Contraseña" class="btn btn-primary">
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    </div>
        </div>
    </div>
    <script src="<?php echo IP_SERVER ?>assets/js/perfil/actualziarperfil.js"></script>
