<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo IP_SERVER ?>adm">Inicio</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>nactivas">eventos Activos</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>nactivas"><?php echo $evento_id?></a></li>
        </ul>
    </div>
</div>
<section>
    <div class="col-12">
        <div class="col-lg-10 offset-1">
          <br>
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4>Modificar evento     </h4>
                </div>
                <br>
                <div class="form-group-material">
                  <img src="<?php echo IP_SERVER.$evento[0]->evento_adjunto; ?>" alt="" class="img-banner">
                </div>
                <hr><br>
                <form id="evento_actualizar" method="post" enctype="multipart/form-data">
                  <div class="col-sm-12">
                    <div class="form-group-material">
                        <input id="evento_id" readonly type="text" name="evento_id" value="<?php echo $evento[0]->evento_id;?>" required class="input-material" style="color: #2b90d9;" >
                        <label for="" class="label-material">id Evento</label>
                    </div>
                    <div class="form-group-material">
                      <label for="evento_nombre" class="label-material" style="color: #2b90d9;" >Nombre / Titulo</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                      <textarea id="evento_nombre" class="form-control form-control-has-validation" placeholder="Nombre promocional del evento " name="evento_nombre" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $evento[0]->evento_nombre;?></textarea>
                    </div>
                    <div class="form-group-material">
                      <label for="evento_descripcion" class="label-material" style="color: #2b90d9;" >Contenido</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                      <textarea id="evento_descripcion" class="form-control form-control-has-validation" placeholder="Descripción clara del evento" name="evento_descripcion" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $evento[0]->evento_descripcion;?></textarea>
                    </div>
                    <div class="form-group-material">
                      <label for="evento_link" class="label-material" style="color: #2b90d9;" >Link</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                      <textarea id="evento_link" class="form-control form-control-has-validation" placeholder="Dirección URL / Link del evento (Teams - Zoom - Meet)" name="evento_link" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $evento[0]->evento_link;?></textarea>
                    </div>
                    <div class="form-group-material">
                        <input id="evento_finicio" name="evento_finicio" type="date" value="<?php echo date('Y-m-d', strtotime($evento[0]->evento_finicio));?>" required class="input-material" >
                        <input id="evento_hinicio" name="evento_hinicio" type="time" value="<?php echo date('G:i', strtotime($evento[0]->evento_hinicio));?>" required class="input-material" >
                        <label for="" class="label-material">Fecha inicio del evento</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                    </div>
                    <div class="form-group-material">
                      <input id="evento_fin" name="evento_fin" type="date" value="<?php echo date('Y-m-d', strtotime($evento[0]->evento_fin));?>" required class="input-material" >
                      <input id="evento_hfin" name="evento_hfin" type="time" value="<?php echo date('G:i', strtotime($evento[0]->evento_hfin));?>" required class="input-material" >
                        <label for="" class="label-material">Fecha finalización del evento</label>
                    </div>
                    <div class="form-group-material">
                      <label for="evento_contenido" style="color: #2b90d9;" class="label-material">Sponsor / Encargado</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                        <textarea id="evento_encargado" name="evento_encargado" required class="form-control" ><?php echo $evento[0]->evento_encargado;?></textarea>
                    </div>
                    <div class="form-group-material">
                        <label for="evento_adjunto" style="color: #2b90d9;" class="label-material">Imagen</label>
                        <input type="file" require class="form-control" name="evento_adjunto" id="evento_adjunto" >
                    </div>
                    <div class="form-group-material">
                      <label for="evento_video" style="color: #2b90d9;" class="label-material">Video</label>
                        <textarea id="evento_video" name="evento_video" required class="form-control" ><?php echo $evento[0]->evento_video;?></textarea>
                    </div>
                    <hr>
                    <div class="form-group-material">
                      <div id="leyenda">(<span data-title="Campo obligatorio" class="obligatorio" style="color:red;">*</span>) Campos obligatorios.</div>
                        <input type="submit" id="actualizarev" name="actualizarev" value="Actualizar evento" class="btn btn-primary">
                        <a type="button" href="<? echo IP_SERVER."evactivos"?>" class="btn btn-secondary">Cerrar</a>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo IP_SERVER ?>assets/js/eventos/eventosactualizar.js"></script>
<script>
    tinymce.init({
      selector: '#evento_descripcion',
      height: "480",
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
