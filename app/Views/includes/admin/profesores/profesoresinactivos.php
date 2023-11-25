<base href="<?php IP_SERVER ?>">
<!-- Breadcrumb-->
<div class="breadcrumb-holder">
    <div class="container-fluid">
        <ul class="breadcrumb">
        <li class="breadcrumb-item"><a href="<?php echo IP_SERVER ?>adm">Inicio</a></li>
          <li class="breadcrumb-item active"><a href="<?php echo IP_SERVER ?>prinactivos">Profesores Activos</a></li>
        </ul>
    </div>
</div>
<section>
        <div class="container-fluid">
          <!-- Page Header-->
          <header>
            <h1 class="h3 display">Profesores Inactivos            </h1>
          </header>
          <div class="form-group row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <p>En esta sección encuentra en listado de Profesores Inactivos             </p>
                  </div>
                </div>
          </div>
          <div class="row">
            <div class="col-lg-12">
              <div class="card">
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-striped" id="profesoresinactivos">
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
                            <th>Pagina</th>
                            <th>Facebook</th>
                            <th>Instagram</th>
                            <th>Youtube</th>
                            <th>LinkedIn</th>
                            <th>Activar</th>
                        </tr>
                      </thead>
                      <tbody id="tabla">
                        <?php foreach ($profesores as $pr){ ?>
                            <tr class="text-center">
                              <td class="table-active" scope="row"><?php echo $pr->profesor_id; ?></th>
                              <td class="table-active"><img src="<?php echo $pr->profesor_foto; ?>" alt="<?php echo $pr->profesor_foto; ?>" style="height: 60px;"></td>
                              <td class="table-active"><div class="nombre"><?php echo $pr->profesor_nombres; ?><div></td>
                              <td class="table-active"><div class="nombre"><?php echo $pr->profesor_apellidos; ?><div></td>
                              <td class="table-active"><div class="nombre"><?php echo $pr->profesor_titulo; ?><div></td>
                              <td class="table-active"><div class="nombre"><?php echo $pr->profesor_puestoactual; ?><div></td>
                              <td class="table-active"><div class="nombre"><?php echo $pr->profesor_educacion; ?><div></td>
                              <td class="table-active"><div class="descripcion"><?php echo $pr->profesor_descripcion; ?><div></td>
                              <td class="table-active"><div class="descripcion"><?php echo $pr->profesor_pagina; ?><div></td>
                              <td class="table-active"><div class="nombre"><?php echo $pr->profesor_facebook; ?><div></td>
                              <td class="table-active"><div class="nombre"><?php echo $pr->profesor_instagram; ?><div></td>
                              <td class="table-active"><div class="nombre"><?php echo $pr->profesor_youtube; ?><div></td>
                              <td class="table-active"><div class="nombre"><?php echo $pr->profesor_linkedin; ?><div></td>
                              <td class="table-active text-left">
                                  <a href="<?php echo IP_SERVER."Profesores/profesoresactivar/".$pr->profesor_id; ?>" type="button" class="btn btn-outline-success" data-toggle="tooltip" data-placement="bottom" title="Activar"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-square" viewBox="0 0 16 16">
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
        <script src="<?php echo IP_SERVER ?>assets/js/profesores/profesores.js"></script>
    </div>
