<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo IP_SERVER ?>adm">Inicio</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>usactivos">Usuarios Activos</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>usactivos"><?php echo $usuario_id?></a></li>
        </ul>
    </div>
</div>
<section>
    <div class="col-12">
        <div class="col-lg-10 offset-1">
          <br>
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4>Modificar Usuario     </h4>
                </div>
                <br>
                <div class="form-group-material">
                  <img src="<?php if(!empty($usuario[0]->usuario_foto)){echo IP_SERVER.$usuario[0]->usuario_foto; }?>" alt="<?php if(!empty($usuario[0]->usuario_foto)){echo IP_SERVER.$usuario[0]->usuario_foto; }?>" class="img-banner">
                </div>
                <hr><br>
                <form id="usuario_actualizar" method="post" enctype="multipart/form-data">
                  <div class="col-sm-12">
                    <div class="form-group-material">
                        <input id="usuario_id" readonly type="text" name="usuario_id" value="<?php echo $usuario[0]->usuario_id;?>" required class="input-material" style="color: #2b90d9;" >
                        <label for="usuario_id" class="label-material">id Usuario</label>
                    </div>
                    <div class="usuario_nombre">
                      <label>Nombres</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                      <div class="input-group">
                        <input type="text" class="form-control" require name="usuario_nombre" value="<?php echo $usuario[0]->usuario_nombre ?>">
                      </div>
                    </div>
                    <div class="usuario_apellidos">
                      <br>
                      <label>Apellidos</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                      <div class="input-group">
                        <input type="text" class="form-control" require name="usuario_apellidos" value="<?php echo $usuario[0]->usuario_apellidos ?>">
                      </div>
                    </div>
                    <div class="usuario_correo">
                      <br>
                      <label>Correo</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                      <div class="input-group">
                        <input type="email" class="form-control" require name="usuario_correo" value="<?php echo $usuario[0]->usuario_correo ?>">
                      </div>
                    </div>
                    <div class="usuario_foto">
                      <br>
                      <label>Foto</label>
                      <div class="input-group">
                        <input type="file" require class="form-control" name="usuario_foto" id="usuario_foto" >
                      </div>
                    </div>
                    <div class="usuario_ciudad">
                      <br>
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
                    <div class="usuario_telefono">
                      <br>
                      <label>Telefono</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                      <div class="input-group">
                        <input type="tel" class="form-control" require name="usuario_telefono" id="usuario_telefono" maxlength="13" minlength="7" value="<?php echo $usuario[0]->usuario_telefono ?>">
                      </div>
                    </div>
                    <div class="usuario_rol_id">
                      <br>
                      <label>Rol</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                      <div class="input-group">
                        <select class="form-control" id="usuario_rol_id" name="usuario_rol_id">
                          <?php foreach ($roles as $r){ ?>
                              <option value="<?php echo $r->rol_id; ?>" <?php if($r->rol_id==$usuario[0]->usuario_rol_id){echo "selected";}?> ><?php echo $r->rol_nombre; ?></option>
                          <?php } ?>
                          </select>
                      </div>
                    </div>
                    <br>
                    <div class="form-group-material">
                      <div id="leyenda">(<span data-title="Campo obligatorio" class="obligatorio" style="color:red;">*</span>) Campos obligatorios.</div>
                        <input type="submit" id="actualizarus" name="actualizarus" value="Actualizar Usuario" class="btn btn-primary">
                        <a type="button" href="<? echo IP_SERVER."usactivos"?>" class="btn btn-secondary">Cerrar</a>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo IP_SERVER ?>assets/js/usuarios/usuariosactualizar.js"></script>
