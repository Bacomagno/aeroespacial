<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo IP_SERVER ?>adm">Inicio</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>usactivos">Usuarios Activos</a></li>
        </ul>
    </div>
</div>
<section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header>
            <h1 class="h3 display">Usuarios Activos            </h1>
          </header>
          <div class="form-group row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <p>En esta sección encuentra en listado de Usuarios Activos             </p>
                  </div>
                </div>
          </div>
          <form action="<?php echo IP_SERVER?>usactivos" method="POST" id="usuarios_fechas" enctype="multipart/form-data">
                      <div class="form-group row">
                        <div class="col-sm-12">
                          <div class="form-group">
                            <div class="input-group">
                              <div class="input-group-prepend">
                              <div class="input-group-prepend"><span class="input-group-text">Fecha Inicio</span></div>
                              </div>
                              <input required type="date" name="fechaini" required class="form-control" id="fechaini" <?php if(!empty($_POST)){
                                  ?> value="<?php if(!empty($fechaini)){
                                      echo $fechaini;
                                  }else{
                                      echo "";
                                  }}?>">
                              <div class="input-group-prepend">
                              <div class="input-group-prepend"><span class="input-group-text">Fecha Fin</span></div>
                              </div>
                              <input type="date" name="fechafin" required class="form-control" id="fechafin" <?php if(!empty($_POST)){
                                  ?> value="<?php if(!empty($fechafin)){
                                      echo $fechafin;
                                  }else{
                                      echo "";
                                  }}?>">
                              <button type="sumbit" class="btn btn-primary" data-toggle="tooltip" data-placement="bottom" title="Buscar" id="buscarfecha"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                              </svg></button>
                              <form action="" method="post">
                                  <button type="reset" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="Limpiar" id="limpiarfecha"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eraser" viewBox="0 0 16 16"><path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414l-3.879-3.879zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z"/></svg></button>
                              </form>
                              <span  data-toggle="modal" data-target="#myModal" style="  border: 2px solid #4CAF50;">
                                <a type="button" class="btn btn btn-success text-white" data-toggle="tooltip" data-placement="bottom" title="Crear"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg></a>
                              </span>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                    <div class="row">
                      <div class="col-lg-12">
                        <div class="card">
                          <div class="card-body">
                            <div class="table-responsive">
                              <table class="table table-striped" id="usuariosactivos">
                                  <?php if(!empty($_POST)){
                                      if(!empty($fechaini) && !empty($fechafin)){
                                  ?>
                                  <div>
                                      <label for="noticias-activas" class="label-material">Fecha Inicio: <?php echo $fechaini;?> - Fecha Fin: <?php echo $fechaini;?></label>
                                  </div>
                                  <?php }}?>
                      <thead class="thead-dark">
                        <tr class="text-center">
                            <th>#</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Foto</th>
                            <th>Ciudad</th>
                            <th>Telefono</th>
                            <th>Rol</th>
                            <th>Ultimo Ingreso</th>
                            <th>Modificar</th>
                            <th>Desactivar</th>
                        </tr>
                      </thead>
                      <tbody id="tabla">
                      <?php foreach ($usuarios as $u){ ?>
                          <tr class="text-center">
                            <td class="table-active" scope="row"><?php echo $u->usuario_id; ?></th>
                            <td class="table-active"><div class="nombre"><?php echo $u->usuario_nombre; ?><div></td>
                            <td class="table-active"><div class="nombre"><?php echo $u->usuario_apellidos; ?><div></td>
                            <td class="table-active"><div class="nombre"><?php echo $u->usuario_usuario; ?><div></td>
                            <td class="table-active"><div class="nombre"><?php echo $u->usuario_correo; ?><div></td>
                            <td class="table-active"><img src="<?php echo $u->usuario_foto; ?>" alt="<?php echo $u->usuario_foto; ?>" style="height: 60px;"></td>
                            <td class="table-active"><div class="nombre"><?php echo $u->usuario_ciudad; ?><div></td>
                            <td class="table-active"><div class="nombre"><?php echo $u->usuario_telefono; ?><div></td>
                            <td class="table-active"><div class="nombre"><?php echo $u->rol_nombre; ?><div></td>
                            <td class="table-active"><div class="nombre"><?php echo $u->last_login; ?><div></td>
                            <td class="table-active text-left">
                            <a href="<?php echo IP_SERVER."usuarios/usuariosmodificar/".$u->usuario_id; ?>" type="button " class="btn btn-outline-success" data-toggle="tooltip" data-placement="bottom" title="Modificar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg></a>
                            </td>
                            <td class="table-active text-left">
                                <a href="<?php echo IP_SERVER."usuarios/usuariosdesactivar/".$u->usuario_id; ?>" type="button" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="Desactivar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg></a>
                            </td>
                          </tr>
                        <?php } ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card">
                  <!-- Modal-->
                  <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Agregar Usuario</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" id="usuario_crear" enctype="multipart/form-data">
                            <div class="usuario_nombre">
                              <br>
                              <label>Nombres</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                              <div class="input-group">
                                <input type="text" class="form-control" require name="usuario_nombre">
                              </div>
                            </div>
                            <div class="usuario_apellidos">
                              <br>
                              <label>Apellidos</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                              <div class="input-group">
                                <input type="text" class="form-control" require name="usuario_apellidos">
                              </div>
                            </div>
                            <div class="usuario_usuario">
                              <br>
                              <label>Usuario</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                              <div class="input-group">
                                <input type="text" class="form-control" require name="usuario_usuario" maxlength="50" minlength="5">
                              </div>
                            </div>
                            <div class="usuario_correo">
                              <br>
                              <label>Correo</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                              <div class="input-group">
                                <input type="email" class="form-control" require name="usuario_correo">
                              </div>
                            </div>
                            <div class="usuario_contrasena">
                              <br>
                              <label>Contraseña</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                              <div class="input-group">
                                <input type="password" class="form-control" require name="usuario_contrasena">
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
                                            <option value="">-</option>
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
                                            <option value="Otra">Otra</option>
                                        </select>
                              </div>
                            </div>
                            <div class="usuario_telefono">
                              <br>
                              <label>Telefono</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                              <div class="input-group">
                                <input type="tel" class="form-control" require name="usuario_telefono" id="usuario_telefono" maxlength="13" minlength="7">
                              </div>
                            </div>
                            <div class="usuario_rol_id">
                              <br>
                              <label>Rol</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                              <div class="input-group">
                                <select class="form-control" id="usuario_rol_id" name="usuario_rol_id">
                                  <?php foreach ($roles as $r){ ?>
                                      <option value="<?php echo $r->rol_id; ?>"><?php echo $r->rol_nombre; ?></option>
                                  <?php } ?>
                                  </select>
                              </div>
                            </div>
                            <br>
                            <div class="modal-footer">
                              <div id="leyenda">(<span data-title="Campo obligatorio" class="obligatorio" style="color:red;">*</span>) Campos obligatorios.</div>
                              <button type="button" data-dismiss="modal" class="btn btn-secondary">Cerrar</button>
                              <input type="submit" id="usuarioc" name="usuarioc" value="Crear Usuario" class="btn btn-primary">
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
              </div>
        </div>
      </section>
      <div>
        <script src="<?php echo IP_SERVER ?>assets/js/usuarios/usuarios.js"></script>
    </div>
