<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo IP_SERVER ?>adm">Inicio</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>eactivos">Eventos Activos</a></li>
        </ul>
    </div>
</div>
<section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header>
            <h1 class="h3 display">Eventos Activos            </h1>
          </header>
          <div class="form-group row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <p>En esta sección encuentra en listado de Eventos Activos             </p>
                  </div>
                </div>
          </div>
          <form action="<?php echo IP_SERVER?>evactivos " method="POST" id="eventos_fechas" enctype="multipart/form-data">
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
                    <table class="table table-striped" id="eventosactivas">
                        <?php if(!empty($_POST)){
                            if(!empty($fechaini) && !empty($fechafin)){
                        ?>
                        <div>
                            <label for="eventos-activas" class="label-material">Fecha Inicio: <?php echo $fechaini;?> - Fecha Fin: <?php echo $fechaini;?></label>
                        </div>
                        <?php }}?>
                      <thead class="thead-dark">
                        <tr class="text-center">
                            <th>#</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Link</th>
                            <th><div class="Fechas">Fecha inicio</div></th>
                            <th><div class="Fechas">Hora inicio</div></th>
                            <th><div class="Fechas">Fecha Finalización</div></th>
                            <th><div class="Fechas">Hora Finalización</div></th>
                            <th>Encargado</th>
                            <th>Adjunto</th>
                            <th><div class="Fechas">Video</div></th>
                            <th>Modificar</th>
                            <th>Desactivar</th>
                        </tr>
                      </thead>
                      <tbody id="tabla">
                      <?php foreach ($eventos as $ev){ ?>
                          <tr class="text-center">
                            <td class="table-active" scope="row"><?php echo $ev->evento_id; ?></th>
                            <td class="table-active"><div class="nombre"><?php echo $ev->evento_nombre; ?><div></td>
                            <td class="table-active"><div class="descripcion"><?php echo $ev->evento_descripcion; ?><div></td>
                            <td class="table-active"><div class="nombre"><?php echo $ev->evento_link; ?><div></td>
                            <td class="table-active datepicker"><?php $fecha = new DateTime($ev->evento_finicio); echo $fecha->format("d-m-Y");?></td>
                            <td class="table-active datepicker"><?php $fecha = new DateTime($ev->evento_hinicio); echo $fecha->format("h:i A");?></td>
                            <td class="table-active datepicker"><?php $fecha = new DateTime($ev->evento_fin); echo $fecha->format("d-m-Y"); ?></td>
                            <td class="table-active datepicker"><?php $fecha = new DateTime($ev->evento_hfin); echo $fecha->format("h:i A");?></td>
                            <td class="table-active"><div class="nombre"><?php echo $ev->evento_encargado; ?><div></td>
                            <td class="table-active"><img src="<?php echo IP_SERVER.$ev->evento_adjunto; ?>" alt="<?php echo $ev->evento_adjunto; ?>" style="height: 60px;"></td>
                            <td class="table-active"><?php echo $ev->evento_video; ?></td>
                            <td class="table-active text-left">
                            <a href="<?php echo IP_SERVER."eventos/eventosmodificar/".$ev->evento_id; ?>" type="button " class="btn btn-outline-success" data-toggle="tooltip" data-placement="bottom" title="Modificar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg></a>
                            </td>
                            <td class="table-active text-left">
                                <a href="<?php echo IP_SERVER."eventos/eventosdesactivar/".$ev->evento_id; ?>" type="button" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="Desactivar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
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
                          <h5 id="exampleModalLabel" class="modal-title">Agregar Evento</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" id="evento_crear" enctype="multipart/form-data">
                            <div class="evento_nombre">
                              <label>Nombre / Titulo </label>&nbsp;&nbsp;<span style="color:red;">*</span>
                              <div class="input-group">
                                <textarea id="evento_nombre" class="form-control form-control-has-validation" placeholder="Nombre promocional del evento " name="evento_nombre" data-constraints="" cols="30" rows="10" style="height: 100px;" ></textarea>
                              </div>
                            </div>
                            <div class="evento_descripcion">
                              <br>
                              <label>Contenido</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                              <div class="input-group">
                                <textarea id="evento_descripcion" class="form-control form-control-has-validation" placeholder="Descripción clara del evento" name="evento_descripcion" data-constraints="" cols="30" rows="10" style="height: 100px;" ></textarea>
                              </div>
                            </div>
                            <div class="evento_link">
                              <br>
                              <label>Link</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                              <div class="input-group">
                                <textarea id="evento_link" class="form-control form-control-has-validation" placeholder="Dirección URL / Link del evento (Teams - Zoom - Meet)" name="evento_link" data-constraints="" cols="30" rows="10" style="height: 100px;" ></textarea>
                              </div>
                            </div>
                            <div class="evento_finicio">
                              <br>
                              <label>Fecha inicio del evento</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                              <div class="input-group">
                                <input type="date" class="form-control" name="evento_finicio" id="evento_finicio">
                                <input type="time" class="form-control" name="evento_hinicio" id="evento_hinicio">
                              </div>
                            </div>
                            <div class="evento_fin">
                              <br>
                              <label>Fecha fin del evento</label>
                              <div class="input-group">
                                <input type="date" class="form-control" name="evento_fin" id="evento_fin" >
                                <input type="time" class="form-control" name="evento_hfin" id="evento_hfin">
                              </div>
                            </div>
                            <div class="evento_encargado">
                              <br>
                              <label>Sponsor / Encargado</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                              <div class="input-group">
                                <textarea id="evento_encargado" class="form-control form-control-has-validation" placeholder="Nombre de la persona encargada del evento." name="evento_encargado" data-constraints="" cols="30" rows="10" style="height: 100px;" ></textarea>
                              </div>
                            </div>
                            <div class="evento_adjunto">
                              <br>
                              <label>Imagen Adjunto</label>
                              <div class="input-group">
                                <input type="file" require class="form-control" name="evento_adjunto" id="evento_adjunto" >
                              </div>
                            </div>
                            <div class="evento_video">
                              <br>
                              <label>Video</label>
                              <div class="input-group">
                                <textarea id="evento_video" class="form-control form-control-has-validation" placeholder="URL Video Youtube, Vimeo, Facebook, etc" name="evento_video" data-constraints="" cols="30" rows="10" style="height: 100px;" ></textarea>
                              </div>
                            </div>
                            <br>
                            <div class="modal-footer">
                              <div id="leyenda">(<span data-title="Campo obligatorio" class="obligatorio" style="color:red;">*</span>) Campos obligatorios.</div>
                              <button type="button" data-dismiss="modal" class="btn btn-secondary">Cerrar</button>
                              <input type="submit" id="eventoc" name="eventoc" value="Crear Evento" class="btn btn-primary">
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
        <script src="<?php echo IP_SERVER ?>assets/js/eventos/eventos.js"></script>
        <script>
            tinymce.init({
              selector: '#evento_descripcion',
              height : "480",
              width: "480",
              plugins: [
                'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
                'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
                'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
              ],
              toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
                'alignleft aligncenter alignright alignjustify | ' +
                'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
            });
          </script>
    </div>
