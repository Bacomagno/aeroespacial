<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo IP_SERVER ?>adm">Inicio</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>alactivos">Aliados Activos</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>alactivos"><?php echo $aliado_id?></a></li>
        </ul>
    </div>
</div>
<section>
    <div class="col-12">
        <div class="col-lg-10 offset-1">
          <br>
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4>Modificar Aliado     </h4>
                </div>
                <br>
                <div class="form-group-material">
                  <img src="<?php echo IP_SERVER.$aliado[0]->aliado_foto; ?>" alt="" class="img-banner">
                </div>
                <hr><br>
                <form id="aliado_actualizar" method="post" enctype="multipart/form-data">
                  <div class="col-sm-12">
                    <div class="form-group-material">
                        <input id="aliado_id" readonly type="text" name="aliado_id" value="<?php echo $aliado[0]->aliado_id;?>" required class="input-material" style="color: #2b90d9;" >
                        <label for="aliado_id" class="label-material">id Aliado</label>
                    </div>
                    <div class="aliado_nombres">
                      <label for="aliado_nombres" class="label-material" style="color: #2b90d9;" >Nombres</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                        <textarea id="aliado_nombres" class="form-control form-control-has-validation" placeholder="Nombres del Aliado" name="aliado_nombres" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $aliado[0]->aliado_nombres;?></textarea>
                    </div>
                    <div class="aliado_apellidos">
                      <label for="aliado_apellidos" class="label-material" style="color: #2b90d9;" >Apellidos</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                      <div class="input-group">
                        <textarea id="aliado_apellidos" class="form-control form-control-has-validation" placeholder="Apellidos del Aliado" name="aliado_apellidos" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $aliado[0]->aliado_apellidos;?></textarea>
                      </div>
                    </div>
                    <div class="aliado_titulo">
                      <label for="aliado_titulo" class="label-material" style="color: #2b90d9;" >Titulación</label>
                      <div class="input-group">
                        <textarea id="aliado_titulo" class="form-control form-control-has-validation" placeholder="Titulación oficial del Aliado" name="aliado_titulo" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $aliado[0]->aliado_titulo;?></textarea>
                      </div>
                    </div>
                    <div class="aliado_descripcion">
                      <label for="aliado_descripcion" class="label-material" style="color: #2b90d9;" >Perfil</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                      <div class="input-group">
                        <textarea id="aliado_descripcion" class="form-control form-control-has-validation" placeholder="Perfil, descripción y/o información reelevante del Aliado" name="aliado_descripcion" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $aliado[0]->aliado_descripcion;?></textarea>
                      </div>
                    </div>
                    <div class="aliado_email">
                      <label for="aliado_email" class="label-material" style="color: #2b90d9;" >Correo</label>
                      <div class="input-group">
                        <textarea id="aliado_email" class="form-control form-control-has-validation" placeholder="Dirección De Correo Electronico del Aliado" name="aliado_email" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $aliado[0]->aliado_email;?></textarea>
                      </div>
                    </div>
                    <div class="aliado_pagina">
                      <label for="aliado_pagina" class="label-material" style="color: #2b90d9;" >Pagina Web Propia</label>
                      <div class="input-group">
                        <textarea id="aliado_pagina" class="form-control form-control-has-validation" placeholder="Dirección URL de la pagina del Aliado" name="aliado_pagina" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $aliado[0]->aliado_pagina;?></textarea>
                      </div>
                    </div>
                    <div class="aliado_facebook">
                      <label for="aliado_facebook" class="label-material" style="color: #2b90d9;" >Facebook</label>
                      <div class="input-group">
                          <textarea id="aliado_facebook" class="form-control form-control-has-validation" placeholder="Dirección URL del perfil de Facebook del Aliado" name="aliado_facebook" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $aliado[0]->aliado_facebook;?></textarea>
                      </div>
                    </div>
                    <div class="aliado_twitter">
                      <label for="aliado_twitter" class="label-material" style="color: #2b90d9;" >Twitter</label>
                      <div class="input-group">
                          <textarea id="aliado_twitter" class="form-control form-control-has-validation" placeholder="Dirección URL del perfil de Twitter del Aliado" name="aliado_twitter" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $aliado[0]->aliado_twitter;?></textarea>
                      </div>
                    </div>
                    <div class="aliado_instagram">
                      <label for="aliado_instagram" class="label-material" style="color: #2b90d9;" >Instagram</label>
                      <div class="input-group">
                        <textarea id="aliado_instagram" class="form-control form-control-has-validation" placeholder="Dirección URL del perfil de Instagram del Aliado" name="aliado_instagram" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $aliado[0]->aliado_instagram;?></textarea>
                      </div>
                    </div>
                    <div class="aliado_youtube">
                      <label for="aliado_youtube" class="label-material" style="color: #2b90d9;" >Youtube</label>
                      <div class="input-group">
                          <textarea id="aliado_youtube" class="form-control form-control-has-validation" placeholder="Dirección URL del perfil de Youtube del Aliado" name="aliado_youtube" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $aliado[0]->aliado_youtube;?></textarea>
                      </div>
                    </div>
                    <div class="aliado_linkedin">
                      <label for="aliado_linkedin" class="label-material" style="color: #2b90d9;" >LinkedIn</label>
                      <div class="input-group">
                        <textarea id="aliado_linkedin" class="form-control form-control-has-validation" placeholder="Dirección URL del perfil de LinkedIn del Aliado" name="aliado_linkedin" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $aliado[0]->aliado_linkedin;?></textarea>
                      </div>
                    </div>
                    <div class="aliado_foto">
                      <br>
                      <label for="aliado_foto" class="label-material" style="color: #2b90d9;" >Foto</label>
                      <div class="input-group">
                        <input type="file" require class="form-control" name="aliado_foto" id="aliado_foto" >
                      </div>
                    </div>
                    <br>
                    <div class="form-group-material">
                      <div id="leyenda">(<span data-title="Campo obligatorio" class="obligatorio" style="color:red;">*</span>) Campos obligatorios.</div>
                        <input type="submit" id="actualizaral" name="actualizaral" value="Actualizar Aliado" class="btn btn-primary">
                        <a type="button" href="<? echo IP_SERVER."alactivos"?>" class="btn btn-secondary">Cerrar</a>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo IP_SERVER ?>assets/js/aliados/aliadosactualizar.js"></script>
<script>
    tinymce.init({
      selector: '#aliado_descripcion',
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
