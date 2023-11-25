<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo IP_SERVER ?>adm">Inicio</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>usinactivos">Usuarios Inactivos</a></li>
        </ul>
    </div>
</div>
<section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header>
            <h1 class="h3 display">Usuarios Inactivos            </h1>
          </header>
          <div class="form-group row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <p>En esta sección encuentra en listado de Usuarios Inactivos             </p>
                  </div>
                </div>
          </div>
          <form action="<?php echo IP_SERVER?>usinactivos" method="POST" id="usuarios_fechas" enctype="multipart/form-data">
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
                                  <button type="reset" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="Limpiar" id="limpiarfechai"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eraser" viewBox="0 0 16 16"><path d="M8.086 2.207a2 2 0 0 1 2.828 0l3.879 3.879a2 2 0 0 1 0 2.828l-5.5 5.5A2 2 0 0 1 7.879 15H5.12a2 2 0 0 1-1.414-.586l-2.5-2.5a2 2 0 0 1 0-2.828l6.879-6.879zm2.121.707a1 1 0 0 0-1.414 0L4.16 7.547l5.293 5.293 4.633-4.633a1 1 0 0 0 0-1.414l-3.879-3.879zM8.746 13.547 3.453 8.254 1.914 9.793a1 1 0 0 0 0 1.414l2.5 2.5a1 1 0 0 0 .707.293H7.88a1 1 0 0 0 .707-.293l.16-.16z"/></svg></button>
                              </form>
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
                              <table class="table table-striped" id="usuariosinactivos">
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
                            <th>Activar</th>
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
                              <a href="<?php echo IP_SERVER."Usuarios/Usuariosactivar/".$u->usuario_id; ?>" type="button" class="btn btn-outline-success" data-toggle="tooltip" data-placement="bottom" title="Activar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
                                <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"></path>
                                <path d="M10.97 4.97a.75.75 0 0 1 1.071 1.05l-3.992 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.235.235 0 0 1 .02-.022z"></path>
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
        </div>
      </section>
      <div>
        <script src="<?php echo IP_SERVER ?>assets/js/usuarios/usuarios.js"></script>
    </div>
