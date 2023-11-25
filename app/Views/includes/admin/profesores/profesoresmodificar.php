<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo IP_SERVER ?>adm">Inicio</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>practivos">Profesores Activos</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>practivos"><?php echo $profesor_id?></a></li>
        </ul>
    </div>
</div>
<section>
    <div class="col-12">
        <div class="col-lg-10 offset-1">
          <br>
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4>Modificar Profesor     </h4>
                </div>
                <br>
                <div class="form-group-material">
                  <img src="<?php echo IP_SERVER.$profesor[0]->profesor_foto; ?>" alt="" class="img-banner">
                </div>
                <hr><br>
                <form id="profesor_actualizar" method="post" enctype="multipart/form-data">
                  <div class="col-sm-12">
                    <div class="form-group-material">
                        <input id="profesor_id" readonly type="text" name="profesor_id" value="<?php echo $profesor[0]->profesor_id;?>" required class="input-material" style="color: #2b90d9;" >
                        <label for="profesor_id" class="label-material">id Profesor</label>
                    </div>
                    <div class="profesor_nombres">
                      <label for="profesor_nombres" class="label-material" style="color: #2b90d9;" >Nombres</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                        <textarea id="profesor_nombres" class="form-control form-control-has-validation" placeholder="Nombres del Profesor" name="profesor_nombres" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $profesor[0]->profesor_nombres;?></textarea>
                    </div>
                    <div class="profesor_apellidos">
                      <label for="profesor_apellidos" class="label-material" style="color: #2b90d9;" >Apellidos</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                      <div class="input-group">
                        <textarea id="profesor_apellidos" class="form-control form-control-has-validation" placeholder="Apellidos del Profesor" name="profesor_apellidos" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $profesor[0]->profesor_apellidos;?></textarea>
                      </div>
                    </div>
                    <div class="profesor_titulo">
                      <label for="profesor_titulo" class="label-material" style="color: #2b90d9;" >Titulación</label>
                      <div class="input-group">
                        <textarea id="profesor_titulo" class="form-control form-control-has-validation" placeholder="Titulación oficial del Profesor" name="profesor_titulo" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $profesor[0]->profesor_titulo;?></textarea>
                      </div>
                    </div>
                    <div class="profesor_puestoactual">
                      <label for="profesor_puestoactual" class="label-material" style="color: #2b90d9;" >Puesto Actual</label>
                      <div class="input-group">
                        <textarea id="profesor_puestoactual" class="form-control form-control-has-validation" placeholder="Puesto Actual del Profesor" name="profesor_puestoactual" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $profesor[0]->profesor_puestoactual;?></textarea>
                      </div>
                    </div>
                    <div class="profesor_educacion">
                      <label for="profesor_educacion" class="label-material" style="color: #2b90d9;" >Titulación Academica</label>
                      <div class="input-group">
                        <textarea id="profesor_educacion" class="form-control form-control-has-validation" placeholder="Titulación académica del Profesor" name="profesor_educacion" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $profesor[0]->profesor_educacion;?></textarea>
                      </div>
                    </div>
                    <div class="profesor_descripcion">
                      <label for="profesor_descripcion" class="label-material" style="color: #2b90d9;" >Perfil</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                      <div class="input-group">
                        <textarea id="profesor_descripcion" class="form-control form-control-has-validation" placeholder="Perfil, descripción y/o información reelevante del Profesor" name="profesor_descripcion" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $profesor[0]->profesor_descripcion;?></textarea>
                      </div>
                    </div>
                    <div class="profesor_email">
                      <label for="profesor_email" class="label-material" style="color: #2b90d9;" >Correo</label>
                      <div class="input-group">
                        <textarea id="profesor_email" class="form-control form-control-has-validation" placeholder="Dirección De Correo Electronico del Profesor" name="profesor_email" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $profesor[0]->profesor_email;?></textarea>
                      </div>
                    </div>
                    <div class="profesor_pagina">
                      <label for="profesor_pagina" class="label-material" style="color: #2b90d9;" >Pagina Web Propia</label>
                      <div class="input-group">
                        <textarea id="profesor_pagina" class="form-control form-control-has-validation" placeholder="Dirección URL de la pagina del Profesor" name="profesor_pagina" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $profesor[0]->profesor_pagina;?></textarea>
                      </div>
                    </div>
                    <div class="profesor_facebook">
                      <label for="profesor_facebook" class="label-material" style="color: #2b90d9;" >Facebook</label>
                      <div class="input-group">
                          <textarea id="profesor_facebook" class="form-control form-control-has-validation" placeholder="Dirección URL del perfil de Facebook del Profesor" name="profesor_facebook" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $profesor[0]->profesor_facebook;?></textarea>
                      </div>
                    </div>
                    <div class="profesor_twitter">
                      <label for="profesor_twitter" class="label-material" style="color: #2b90d9;" >Twitter</label>
                      <div class="input-group">
                          <textarea id="profesor_twitter" class="form-control form-control-has-validation" placeholder="Dirección URL del perfil de Twitter del Profesor" name="profesor_twitter" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $profesor[0]->profesor_twitter;?></textarea>
                      </div>
                    </div>
                    <div class="profesor_instagram">
                      <label for="profesor_instagram" class="label-material" style="color: #2b90d9;" >Instagram</label>
                      <div class="input-group">
                        <textarea id="profesor_instagram" class="form-control form-control-has-validation" placeholder="Dirección URL del perfil de Instagram del Profesor" name="profesor_instagram" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $profesor[0]->profesor_instagram;?></textarea>
                      </div>
                    </div>
                    <div class="profesor_youtube">
                      <label for="profesor_youtube" class="label-material" style="color: #2b90d9;" >Youtube</label>
                      <div class="input-group">
                          <textarea id="profesor_youtube" class="form-control form-control-has-validation" placeholder="Dirección URL del perfil de Youtube del Profesor" name="profesor_youtube" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $profesor[0]->profesor_youtube;?></textarea>
                      </div>
                    </div>
                    <div class="profesor_linkedin">
                      <label for="profesor_linkedin" class="label-material" style="color: #2b90d9;" >LinkedIn</label>
                      <div class="input-group">
                        <textarea id="profesor_linkedin" class="form-control form-control-has-validation" placeholder="Dirección URL del perfil de LinkedIn del Profesor" name="profesor_linkedin" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $profesor[0]->profesor_linkedin;?></textarea>
                      </div>
                    </div>
                    <div class="profesor_foto">
                      <br>
                      <label for="profesor_foto" class="label-material" style="color: #2b90d9;" >Foto</label>
                      <div class="input-group">
                        <input type="file" require class="form-control" name="profesor_foto" id="profesor_foto" >
                      </div>
                    </div>
                    <br>
                    <div class="form-group-material">
                      <div id="leyenda">(<span data-title="Campo obligatorio" class="obligatorio" style="color:red;">*</span>) Campos obligatorios.</div>
                        <input type="submit" id="actualizarpr" name="actualizarpr" value="Actualizar Profesor" class="btn btn-primary">
                        <a type="button" href="<? echo IP_SERVER."practivos"?>" class="btn btn-secondary">Cerrar</a>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo IP_SERVER ?>assets/js/profesores/profesoresactualizar.js"></script>
<script>
    tinymce.init({
      selector: '#profesor_descripcion',
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
