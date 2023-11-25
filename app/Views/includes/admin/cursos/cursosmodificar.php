
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo IP_SERVER ?>adm">Inicio</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>cractivos">Cursos Activos</a></li>
        <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>cractivos"><?php echo $curso_id?></a></li>
        </ul>
    </div>
</div>
<section>
    <div class="col-12">
        <div class="col-lg-10 offset-1">
          <br>
            <div class="card">
                <div class="card-header d-flex align-items-center">
                    <h4>Modificar Curso     </h4>
                </div><br>
                <form id="curso_actualizar" method="post" enctype="multipart/form-data">
                  <div class="col-sm-12">
                    <div class="form-group-material">
                        <input id="curso_id" readonly type="text" name="curso_id" value="<?php echo $curso[0]->curso_id;?>" required class="input-material" style="color: #2b90d9;" >
                        <label for="" class="label-material">id Curso</label>
                    </div>
                    <div class="form-group-material">
                      <label for="curso_nombre" class="label-material" style="color: #2b90d9;" >Nombre / Titulo</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                      <textarea id="curso_nombre" class="form-control form-control-has-validation" placeholder="Nombre Claro y descriptivo del curso" name="curso_nombre" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $curso[0]->curso_nombre;?></textarea>
                    </div>
                    <div class="form-group-material">
                      <label for="curso_link" class="label-material" style="color: #2b90d9;" >Link</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                      <textarea id="curso_link" class="form-control form-control-has-validation" placeholder="Link del curso en el subsistema" name="curso_link" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $curso[0]->curso_link;?></textarea>
                    </div>
                    <div class="form-group-material">
                      <label for="curso_descripcion" class="label-material" style="color: #2b90d9;" >Descripción</label>
                      <textarea id="curso_descripcion" class="form-control form-control-has-validation" placeholder="Descripción clara del curso" name="curso_descripcion" data-constraints="" cols="30" rows="10" style="height: 100px;" ><?php echo $curso[0]->curso_descripcion;?></textarea>
                    </div>
                    <div class="form-group-material">
                        <input id="curso_finicio" name="curso_finicio" type="date" value="<?php echo date('Y-m-d', strtotime($curso[0]->curso_finicio));?>" required class="input-material" >
                        <label for="" class="label-material">Fecha inicio del curso</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                    </div>
                    <div class="form-group-material">
                      <input id="curso_fin" name="curso_fin" type="date" value="<?php echo date('Y-m-d', strtotime($curso[0]->curso_fin));?>" required class="input-material" >
                        <label for="" class="label-material">Fecha finalización del curso</label>
                    </div>
                    <div class="curso_tipomodulo">
                      <br>
                      <label>Tipo Modulo</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                      <div class="input-group">
                        <select class="form-control form-control-has-validation" name="curso_tipomodulo" id="curso_tipomodulo">
                          <option value="1" <?php if($curso[0]->curso_tipomodulo==1){echo "selected";}?>>Basicos</option>
                          <option value="2" <?php if($curso[0]->curso_tipomodulo==2){echo "selected";}?>>Especializados</option>
                        </select>
                      </div>
                    </div>
                    <div class="curso_profesor">
                      <br>
                      <label>Profesor</label>&nbsp;&nbsp;<span style="color:red;">*</span>
                      <div class="input-group">
                        <select class="form-control form-control-has-validation" name="curso_profesor" id="curso_profesor">
                          <option value="NA">Seleccione ...</option>
                          <?php foreach ($profesores as $pr) {
                            ?> <option <?php if($pr->profesor_id==$curso[0]->profesor_id){ echo "selected";} ?> value="<?php echo $pr->profesor_id;?>"><?php echo $pr->profesor_nombres." ".$pr->profesor_apellidos; ?></option>
                          <?php } ?>
                        </select>
                      </div>
                    </div>
                    <hr>
                    <div class="form-group-material">
                      <div id="leyenda">(<span data-title="Campo obligatorio" class="obligatorio" style="color:red;">*</span>) Campos obligatorios.</div>
                        <input type="submit" id="actualizarcr" name="actualizarcr" value="Actualizar Curso" class="btn btn-primary">
                        <a type="button" href="<? echo IP_SERVER."cractivos"?>" class="btn btn-secondary">Cerrar</a>
                    </div>
                  </div>
                </form>
            </div>
        </div>
    </div>
</section>
<script src="<?php echo IP_SERVER ?>assets/js/cursos/cursosactualizar.js"></script>
<script>
    tinymce.init({
      selector: '#curso_nombre',
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
    tinymce.init({
      selector: '#curso_descripcion',
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
