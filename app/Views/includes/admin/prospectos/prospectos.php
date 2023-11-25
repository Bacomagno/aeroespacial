<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo IP_SERVER ?>adm">Inicio</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>prospectos">Prospectos</a></li>
        </ul>
    </div>
</div>
<section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header>
            <h1 class="h3 display">Prospectos            </h1>
          </header>
          <div class="form-group row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <p>En esta sección encuentra en listado de Prospectos             </p>
                  </div>
                </div>
          </div>
          <form action="<?php echo IP_SERVER?>prospectos " method="POST" id="prospectos_fechas" enctype="multipart/form-data">
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
                    <table class="table table-striped" id="prospectos">
                        <?php if(!empty($_POST)){
                            if(!empty($fechaini) && !empty($fechafin)){
                        ?>
                        <div>
                            <label for="eventos-activas" class="label-material">Fecha Inicio: <?php echo $fechaini;?> - Fecha Fin: <?php echo $fechafin;?></label>
                        </div>
                        <?php }}?>
                      <thead class="thead-dark">
                        <tr class="text-center">
                            <th>#</th>
                            <th>Primer Nombre</th>
                            <th>Segundo Nombre</th>
                            <th>Primer Apellido</th>
                            <th>Segundo Apellido</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Ciudad</th>
                            <th>Tipo Identificación</div></th>
                            <th># Identificación</div></th>
                            <th><div class="Fechas">Fecha Registro</div></th>
                            <th>Detalles</th>
                        </tr>
                      </thead>
                      <tbody id="tabla">
                      <?php foreach ($prospectos as $p){ ?>
                          <tr class="text-center">
                            <td scope="row"><?php echo $p->prospecto_id; ?></th>
                            <td><div class="nombre"><?php echo $p->prospecto_nombre1; ?><div></td>
                            <td><div class="nombre"><?php echo $p->prospecto_nombre2; ?><div></td>
                            <td><div class="nombre"><?php echo $p->prospecto_apellido1; ?><div></td>
                            <td><div class="nombre"><?php echo $p->prospecto_apellido2; ?><div></td>
                            <td><div class="nombre"><?php echo $p->prospecto_correo; ?><div></td>
                            <td><div class="nombre"><?php echo $p->prospecto_telefono; ?><div></td>
                            <td><div class="nombre"><?php echo $p->prospecto_ciudad; ?><div></td>
                            <td><div class="nombre"><?php echo $p->identificacion_nombre; ?><div></td>
                            <td><div class="nombre"><?php echo $p->prospecto_identificacion; ?><div></td>
                            <td><?php $fecha = new DateTime($p->create_at);echo $fecha->format("d-m-Y h:ia"); ?></td>
                            <td>
                                <span  data-toggle="modal" data-target="#myModal<?php echo $p->prospecto_id;?>" style="  border: 2px solid #4CAF50;">
                                <a type="button" class="btn btn btn-success text-white" data-toggle="tooltip" data-placement="bottom" title="Detalle"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                                <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                                </svg></a></span>
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
                  <?php foreach ($prospectos as $p){ ?>
                  <div id="myModal<?php echo $p->prospecto_id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                    <div role="document" class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 id="exampleModalLabel" class="modal-title">Detalle<?php echo " ".$p->prospecto_nombre1." ".$p->prospecto_apellido1; ?> </h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                          <div>
                            <label>Nombres   </label>
                            <div class="input-group">
                              <p><?php echo $p->prospecto_nombre1." ".$p->prospecto_nombre2;?></p>
                            </div>
                          </div>
                          <div>
                            <label>Apellidos   </label>
                            <div class="input-group">
                              <p><?php echo $p->prospecto_apellido1." ".$p->prospecto_apellido2;?></p>
                            </div>
                          </div>
                          <div>
                            <label>Telefono   </label>
                            <div class="input-group">
                              <p><?php echo $p->prospecto_telefono;?></p>
                            </div>
                          </div>
                          <div>
                            <label>Correo   </label>
                            <div class="input-group">
                              <p><?php echo $p->prospecto_correo;?></p>
                            </div>
                          </div>
                          <div>
                            <label>Identificación   </label>
                            <div class="input-group">
                              <p><?php echo $p->identificacion_nombre.": ".$p->prospecto_identificacion;?></p>
                            </div>
                          </div>
                          <div>
                            <label>Ciudad   </label>
                            <div class="input-group">
                              <p><?php echo $p->prospecto_ciudad;?></p>
                            </div>
                          </div>
                          <div>
                            <label>Fecha Pre Inscripcion   </label>
                            <div class="input-group">
                              <p><?php $fecha = new DateTime($p->create_at);echo $fecha->format("d-m-Y h:ia");?></p>
                            </div>
                          </div>
                            <div >
                              <label>Cursos   </label>
                              <div class="input-group">
                                <p><ul>
                                  <?php foreach ($cursos as $c) {
                                    if ($c->prospecto_id ==  $p->prospecto_id){
                                      echo "<li>".$c->curso_nombre."</li>";
                                    }
                                  }?>
                                </ul></p>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" data-dismiss="modal" class="btn btn-secondary">Cerrar</button>
                            </div>
                        </div>
                      </div>
                    </div>
                  </div>
                <?php }?>
              </div>
        </div>
      </section>
      <div>
        <script src="<?php echo IP_SERVER ?>assets/js/prospectos/prospectos.js"></script>
    </div>
