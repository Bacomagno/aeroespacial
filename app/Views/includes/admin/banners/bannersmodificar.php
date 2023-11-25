<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo IP_SERVER ?>adm">Inicio</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>bactivos">Banners Activos</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>bactivos"><?php echo $banner_id?></a></li>
        </ul>
    </div>
</div>
<section>
    <div class="col-12">
        <div class="col-lg-10 offset-1">
          <br>
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4>Modificar Banner     </h4>
                </div>
                <br>
                <div class="form-group-material">
                  <img src="<?php echo IP_SERVER.$Baner[0]->banner_path; ?>" alt="banner_path" class="img-banner">
                </div>
                <hr><br>
                <form id="banner_actualizar" method="post" enctype="multipart/form-data">
                  <div class="col-sm-12">
                    <div class="form-group-material">
                        <input id="banner_id" readonly type="text" name="banner_id" value="<?php echo $Baner[0]->banner_id;?>" required class="input-material" style="color: #2b90d9;" >
                        <label for="" class="label-material">id Banner</label>
                    </div>
                    <div class="form-group-material">
                      <label for="banner_nombre" class="label-material" style="color: #2b90d9;" >Nombre / Titulo</label>
                      <textarea id="banner_nombre" class="label-material" required name="banner_nombre" ><?php echo $Baner[0]->banner_nombre;?></textarea>
                    </div>
                    <div class="form-group-material">
                        <input id="banner_ipublicacion" name="banner_ipublicacion" type="date" value="<?php echo date('Y-m-d', strtotime($Baner[0]->banner_ipublicacion));?>" required class="input-material" >
                        <label for="" class="label-material">Fecha inicio de publicación</label>
                    </div>
                    <div class="form-group-material">
                        <input id="banner_fpublicacion" name="banner_fpublicacion" type="date" value="<?php echo date('Y-m-d', strtotime($Baner[0]->banner_fpublicacion));?>" required class="input-material" >
                        <label for="" class="label-material">Fecha fin de publicación</label>
                    </div>
                    <div class="form-group-material">
                      <label for="banner_descripcion" style="color: #2b90d9;" class="label-material">Descripción Corta</label>
                        <textarea id="banner_descripcion" name="banner_descripcion" required class="form-control" ><?php echo $Baner[0]->banner_descripcion;?></textarea>
                    </div>
                    <div class="banner_contenido_id">
                      <label>Ubicación</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                      <div class="input-group">
                      <select class="form-control" name="banner_contenido_id">
                        <option value="1" <?php if($Baner[0]->banner_contenido_id == 1){echo "selected";}?>>Banner Principal</option>
                        <option value="2" <?php if($Baner[0]->banner_contenido_id == 2){echo "selected";}?>>Banner Secundario</option>
                      </select>
                      </div>
                    </div>
                    <div class="form-group-material">
                        <label for="banner_path" style="color: #2b90d9;" class="label-material">Imagen</label>
                        <input type="file" require class="form-control" name="banner_path" id="banner_file" >
                    </div>
                    <hr>
                    <div class="form-group-material">
                        <input type="submit" id="actualizarb" name="actualizarb" value="Actualizar Banner" class="btn btn-primary">
                        <a type="button" href="<? echo IP_SERVER."bactivos"?>" class="btn btn-secondary">Cerrar</a>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo IP_SERVER ?>/assets/js/banners/bannersactualizar.js"></script>
<script>
    tinymce.init({
      selector: '#banner_descripcion',
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
      selector: '#banner_nombre',
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
