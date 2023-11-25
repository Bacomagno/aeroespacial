<head>
  <script>
      tinymce.init({
        selector: '#noticia_titulo',
        plugins: [
          'a11ychecker','advlist','advcode','advtable','autolink','checklist','export',
          'lists','link','image','charmap','preview','anchor','searchreplace','visualblocks',
          'powerpaste','fullscreen','formatpainter','insertdatetime','media','table','help','wordcount'
        ],
        toolbar: 'undo redo | formatpainter casechange blocks | bold italic backcolor | ' +
          'alignleft aligncenter alignright alignjustify | ' +
          'bullist numlist checklist outdent indent | removeformat | a11ycheck code table help'
      });
      tinymce.init({
        selector: '#noticia_contenido',
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
</head>
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo IP_SERVER ?>adm">Inicio</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>nactivas">Noticias Activos</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>nactivas"><?php echo $noticia_id?></a></li>
        </ul>
    </div>
</div>
<section>
    <div class="col-12">
        <div class="col-lg-10 offset-1">
          <br>
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4>Modificar Noticia     </h4>
                </div>
                <br>
                <div class="form-group-material">
                  <img src="<?php echo IP_SERVER.$noticia[0]->noticia_adjunto; ?>" alt="noticia_adjunto" class="img-banner">
                </div>
                <hr><br>
                <form id="noticia_actualizar" method="post" enctype="multipart/form-data">
                  <div class="col-sm-12">
                    <div class="form-group-material">
                        <input id="noticia_id" readonly type="text" name="noticia_id" value="<?php echo $noticia[0]->noticia_id;?>" required class="input-material" style="color: #2b90d9;" >
                        <label for="" class="label-material">id Banner</label>
                    </div>
                    <div class="form-group-material">
                      <label for="noticia_titulo" class="label-material" style="color: #2b90d9;" >Nombre / Titulo</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                      <textarea id="noticia_titulo" class="form-control form-control-has-validation" placeholder="Banner 1" name="noticia_titulo" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $noticia[0]->noticia_titulo;?></textarea>
                    </div>
                    <div class="form-group-material">
                        <input id="noticia_ipublicacion" name="noticia_ipublicacion" type="date" value="<?php echo date('Y-m-d', strtotime($noticia[0]->noticia_ipublicacion));?>" required class="input-material" >
                        <label for="" class="label-material">Fecha inicio de publicación</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                    </div>
                    <div class="form-group-material">
                        <input id="noticia_fpublicacion" name="noticia_fpublicacion" type="date" value="<?php echo date('Y-m-d', strtotime($noticia[0]->noticia_fpublicacion));?>" required class="input-material" >
                        <label for="" class="label-material">Fecha fin de publicación</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                    </div>
                    <div class="form-group-material">
                      <label for="noticia_contenido" style="color: #2b90d9;" class="label-material">Descripción Corta</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                        <textarea id="noticia_contenido" name="noticia_contenido" required class="form-control" ><?php echo $noticia[0]->noticia_contenido;?></textarea>
                    </div>
                    <div class="noticia_contenido_id">
                      <label style="color: #2b90d9;" class="label-material">Ubicación</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                      <div class="input-group">
                      <select class="form-control" name="noticia_contenido_id">
                        <option value="5" <?php if($noticia[0]->noticia_contenido_id==5){echo "selected";}?>>Noticias</option>
                        <option value="6"  <?php if($noticia[0]->noticia_contenido_id==6){echo "selected";}?>>Novedades</option>
                      </select>
                      </div>
                    </div>
                    <br>
                    <div class="form-group-material">
                        <label for="noticia_adjunto" style="color: #2b90d9;" class="label-material">Imagen</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                        <input type="file" require class="form-control" name="noticia_adjunto" id="banner_file" >
                    </div>
                    <div class="form-group-material">
                      <label for="noticia_video" style="color: #2b90d9;" class="label-material">Video</label>
                        <textarea id="noticia_video" name="noticia_video" required class="form-control" ><?php echo $noticia[0]->noticia_video;?></textarea>
                    </div>
                    <hr>
                    <div class="form-group-material">
                      <div id="leyenda">(<span data-title="Campo obligatorio" class="obligatorio" style="color:red;">*</span>) Campos obligatorios.</div>
                        <input type="submit" id="actualizarn" name="actualizarn" value="Actualizar Noticia" class="btn btn-primary">
                        <a type="button" href="<? echo IP_SERVER."nactivas"?>" class="btn btn-secondary">Cerrar</a>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo IP_SERVER ?>assets/js/noticias/noticiasactualizar.js"></script>
