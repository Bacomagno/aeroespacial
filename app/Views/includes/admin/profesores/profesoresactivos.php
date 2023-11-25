<base href="<?php IP_SERVER ?>">
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo IP_SERVER ?>adm">Inicio</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>practivos">Profesores Activos</a></li>
        </ul>
    </div>
</div>
<section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header>
            <h1 class="h3 display">Profesores Activos            </h1>
          </header>
          <div class="form-group row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <p>En esta sección encuentra en listado de Profesores Activos             </p>
                  </div>
                </div>
                <span  data-toggle="modal" data-target="#myModal" style="  border: 2px solid #4CAF50;">
                  <a type="button" class="btn btn btn-success text-white" data-toggle="tooltip" data-placement="bottom" title="Crear"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16"><path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/><path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/></svg></a>
                </span>
                <br>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="profesoresactivos">
                      <thead class="thead-dark">
                        <tr class="text-center">
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nombres</th>
                            <th>Apellidos</th>
                            <th>Titulo</th>
                            <th>Puesto Actual</th>
                            <th>Educación</th>
                            <th>Perfil</th>
                            <th>Correo</th>
                            <th>Pagina</th>
                            <th>Facebook</th>
                            <th>Twitter</th>
                            <th>Instagram</th>
                            <th>Youtube</th>
                            <th>LinkedIn</th>
                            <th>Modificar</th>
                            <th>Desactivar</th>
                        </tr>
                      </thead>
                      <tbody id="tabla">
                      <?php foreach ($profesores as $pr){
                          if ($pr->profesor_id != 1){
                        ?>
                            <tr class="text-center">
                            <td class="table-active" scope="row"><?php echo $pr->profesor_id; ?></th>
                            <td class="table-active"><img src="<?php echo $pr->profesor_foto; ?>" alt="<?php echo $pr->profesor_foto; ?>" style="height: 60px;"></td>
                            <td class="table-active"><div class="nombre"><?php echo $pr->profesor_nombres; ?><div></td>
                            <td class="table-active"><div class="nombre"><?php echo $pr->profesor_apellidos; ?><div></td>
                            <td class="table-active"><div class="nombre"><?php echo $pr->profesor_titulo; ?><div></td>
                            <td class="table-active"><div class="nombre"><?php echo $pr->profesor_puestoactual; ?><div></td>
                            <td class="table-active"><div class="nombre"><?php echo $pr->profesor_educacion; ?><div></td>
                            <td class="table-active"><div class="descripcion"><?php echo $pr->profesor_descripcion; ?><div></td>
                            <td class="table-active"><div class="descripcion"><?php echo $pr->profesor_email; ?><div></td>
                            <td class="table-active"><div class="descripcion"><?php echo $pr->profesor_pagina; ?><div></td>
                            <td class="table-active"><div class="nombre"><?php echo $pr->profesor_facebook; ?><div></td>
                            <td class="table-active"><div class="nombre"><?php echo $pr->profesor_twitter; ?><div></td>
                            <td class="table-active"><div class="nombre"><?php echo $pr->profesor_instagram; ?><div></td>
                            <td class="table-active"><div class="nombre"><?php echo $pr->profesor_youtube; ?><div></td>
                            <td class="table-active"><div class="nombre"><?php echo $pr->profesor_linkedin; ?><div></td>
                            <td class="table-active text-left">
                            <a href="<?php echo IP_SERVER."profesores/profesoresmodificar/".$pr->profesor_id; ?>" type="button " class="btn btn-outline-success" data-toggle="tooltip" data-placement="bottom" title="Modificar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                  <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                  <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg></a>
                            </td>
                            <td class="table-active text-left">
                                <a href="<?php echo IP_SERVER."profesores/profesoresdesactivar/".$pr->profesor_id; ?>" type="button" class="btn btn-outline-danger" data-toggle="tooltip" data-placement="bottom" title="Desactivar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                                  <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                                </svg></a>
                            </td>
                          </tr>
                        <?php }} ?>
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
                          <h5 id="exampleModalLabel" class="modal-title">Agregar Porfesor</h5>
                          <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                          <form method="POST" id="profesor_crear" enctype="multipart/form-data">
                            <div class="profesor_nombres">
                              <label>Nombres</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                              <div class="input-group">
                                <textarea id="profesor_nombres" class="form-control form-control-has-validation" placeholder="Nombres del Profesor" name="profesor_nombres" data-constraints="" cols="30" rows="10" style="height: 100px;" ></textarea>
                              </div>
                            </div>
                            <div class="profesor_apellidos">
                              <label>Apellidos</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                              <div class="input-group">
                                <textarea id="profesor_apellidos" class="form-control form-control-has-validation" placeholder="Apellidos del Profesor" name="profesor_apellidos" data-constraints="" cols="30" rows="10" style="height: 100px;" ></textarea>
                              </div>
                            </div>
                            <div class="profesor_titulo">
                              <label>Titulación</label>
                              <div class="input-group">
                                <textarea id="profesor_titulo" class="form-control form-control-has-validation" placeholder="Titulación oficial del Profesor" name="profesor_titulo" data-constraints="" cols="30" rows="10" style="height: 100px;" ></textarea>
                              </div>
                            </div>
                            <div class="profesor_puestoactual">
                              <label>Puesto Actual</label>
                              <div class="input-group">
                                <textarea id="profesor_puestoactual" class="form-control form-control-has-validation" placeholder="Puesto Actual del Profesor" name="profesor_puestoactual" data-constraints="" cols="30" rows="10" style="height: 100px;" ></textarea>
                              </div>
                            </div>
                            <div class="profesor_educacion">
                              <label>Titulación Academica</label>
                              <div class="input-group">
                                <textarea id="profesor_educacion" class="form-control form-control-has-validation" placeholder="Titulación académica del Profesor" name="profesor_educacion" data-constraints="" cols="30" rows="10" style="height: 100px;" ></textarea>
                              </div>
                            </div>
                            <div class="profesor_descripcion">
                              <label>Perfil</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                              <div class="input-group">
                                <textarea id="profesor_descripcion" class="form-control form-control-has-validation" placeholder="Perfil, descripción y/o información reelevante del Profesor" name="profesor_descripcion" data-constraints="" cols="30" rows="10" style="height: 100px;" ></textarea>
                              </div>
                            </div>
                            <div class="profesor_email">
                              <label>Correo</label>
                              <div class="input-group">
                                <textarea id="profesor_email" class="form-control form-control-has-validation" placeholder="Dirección De Correo Electronico del Profesor" name="profesor_email" data-constraints="" cols="30" rows="10" style="height: 100px;" ></textarea>
                              </div>
                            </div>
                            <div class="profesor_pagina">
                              <label>Pagina Web Propia</label>
                              <div class="input-group">
                                <textarea id="profesor_pagina" class="form-control form-control-has-validation" placeholder="Dirección URL de la pagina del Profesor" name="profesor_pagina" data-constraints="" cols="30" rows="10" style="height: 100px;" ></textarea>
                              </div>
                            </div>
                            <div class="profesor_facebook">
                              <label>Facebook</label>
                              <div class="input-group">
                                  <textarea id="profesor_facebook" class="form-control form-control-has-validation" placeholder="Dirección URL del perfil de Facebook del Profesor" name="profesor_facebook" data-constraints="" cols="30" rows="10" style="height: 100px;" ></textarea>
                              </div>
                            </div>
                            <div class="profesor_twitter">
                              <label>Twitter</label>
                              <div class="input-group">
                                  <textarea id="profesor_twitter" class="form-control form-control-has-validation" placeholder="Dirección URL del perfil de Twitter del Profesor" name="profesor_twitter" data-constraints="" cols="30" rows="10" style="height: 100px;" ></textarea>
                              </div>
                            </div>
                            <div class="profesor_instagram">
                              <label>Instagram</label>
                              <div class="input-group">
                                <textarea id="profesor_instagram" class="form-control form-control-has-validation" placeholder="Dirección URL del perfil de Instagram del Profesor" name="profesor_instagram" data-constraints="" cols="30" rows="10" style="height: 100px;" ></textarea>
                              </div>
                            </div>
                            <div class="profesor_youtube">
                              <label>Youtube</label>
                              <div class="input-group">
                                  <textarea id="profesor_youtube" class="form-control form-control-has-validation" placeholder="Dirección URL del perfil de Youtube del Profesor" name="profesor_youtube" data-constraints="" cols="30" rows="10" style="height: 100px;" ></textarea>
                              </div>
                            </div>
                            <div class="profesor_linkedin">
                              <label>LinkedIn</label>
                              <div class="input-group">
                                <textarea id="profesor_linkedin" class="form-control form-control-has-validation" placeholder="Dirección URL del perfil de LinkedIn del Profesor" name="profesor_linkedin" data-constraints="" cols="30" rows="10" style="height: 100px;" ></textarea>
                              </div>
                            </div>
                            <div class="profesor_foto">
                              <br>
                              <label>Foto</label>
                              <div class="input-group">
                                <input type="file" require class="form-control" name="profesor_foto" id="profesor_foto" >
                              </div>
                            </div>
                            <br>
                            <div class="modal-footer">
                              <div id="leyenda">(<span data-title="Campo obligatorio" class="obligatorio" style="color:red;">*</span>) Campos obligatorios.</div>
                              <button type="button" data-dismiss="modal" class="btn btn-secondary">Cerrar</button>
                              <input type="submit" id="profesorc" name="profesorc" value="Crear Profesor" class="btn btn-primary">
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
        <script src="<?php echo IP_SERVER ?>assets/js/profesores/profesores.js"></script>
        <script>
            tinymce.init({
              selector: '#profesor_descripcion',
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
