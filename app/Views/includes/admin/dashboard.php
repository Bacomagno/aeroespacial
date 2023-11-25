<?php
// Conteo Total De Banners
$btotal=$bactivos+$binactivos;
if ($bactivos == 0){
    $bpactivos = 0;
}else{
  $bpactivos=number_format(($bactivos*100)/$btotal,2);
}
if ($binactivos == 0){
  $bpinactivos = 0;
}else{
  $bpinactivos=number_format(($binactivos*100)/$btotal,2);
}
// Conteo Total De Noticias
$ntotal=$nactivas+$ninactivas;
if ($nactivas==0){
    $npactivas = 0;
}else{
  $npactivas=number_format(($nactivas*100)/$ntotal,2);
}
if ($ninactivas==0){
    $npinactivas = 0;
}else{
  $npinactivas=number_format(($ninactivas*100)/$ntotal,2);
}
// Conteo Total De Eventos
$evtotal=$evactivos+$evinactivos;
if ($evactivos == 0){
  $evpactivos  = 0;
}else{
  $evpactivos=number_format(($evactivos*100)/$evtotal,2);
}
if ($evinactivos == 0){
    $evpinactivos = 0;
}else{
  $evpinactivos=number_format(($evinactivos*100)/$evtotal,2);
}
// Conteo Total De Profesores
$prtotal=$practivos+$prinactivos;
if ($practivos == 0){
    $prpactivos = 0;
}else{
  $prpactivos=number_format(($practivos*100)/$prtotal,2);
}
if ($prinactivos == 0){
  $prpinactivos = 0;
}else{
  $prpinactivos=number_format(($prinactivos*100)/$prtotal,2);
}
// Conteo Total De Cursos
$crtotal=$cractivos+$crinactivos;
if ($cractivos == 0){
    $crpactivos = 0;
}else{
  $crpactivos=number_format(($cractivos*100)/$crtotal,2);
}
if ($crinactivos == 0){
    $crpinactivos = 0;
}else{
  $crpinactivos=number_format(($crinactivos*100)/$crtotal,2);
}
// Prospectos Cursos
$prospectos = $prosactivos;
// Conteo Total De aliados
$altotal=$alactivos+$alinactivos;
if ($alactivos == 0){
    $alpactivos = 0;
}else{
  $alpactivos=number_format(($alactivos*100)/$altotal,2);
}
if ($alinactivos == 0){
    $alpinactivos = 0;
}else{
  $alpinactivos=number_format(($alinactivos*100)/$altotal,2);
}

?>
<script src="<?php echo IP_SERVER ?>assets/vendor/chart.js/Chart.min.js"></script>
<section class="dashboard-counts section-padding">
      <div class="container-fluid">
        <div class="row">
          <!-- Count item widget-->
          <div class="col-12">
            <div class="wrapper count-title d-flex">
              <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16"><path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"/></svg></div>
              <div class="name"><strong class="text-uppercase">Total Estudiantes</strong>
                <div class="count-number"><?php echo $prospectos;?></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <section class="dashboard-counts section-padding">
        <div class="container-fluid">
          <div class="row">
            <!-- Count item widget-->
            <div class="col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-aspect-ratio" viewBox="0 0 16 16"><path d="M0 3.5A1.5 1.5 0 0 1 1.5 2h13A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-13A1.5 1.5 0 0 1 0 12.5v-9zM1.5 3a.5.5 0 0 0-.5.5v9a.5.5 0 0 0 .5.5h13a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-13z"></path><path d="M2 4.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1H3v2.5a.5.5 0 0 1-1 0v-3zm12 7a.5.5 0 0 1-.5.5h-3a.5.5 0 0 1 0-1H13V8.5a.5.5 0 0 1 1 0v3z"></path></svg></div>
                <div class="name"><strong class="text-uppercase">Total Banners</strong>
                  <div class="count-number"><?php echo $btotal;?></div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-newspaper" viewBox="0 0 16 16"><path d="M0 2.5A1.5 1.5 0 0 1 1.5 1h11A1.5 1.5 0 0 1 14 2.5v10.528c0 .3-.05.654-.238.972h.738a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 1 1 0v9a1.5 1.5 0 0 1-1.5 1.5H1.497A1.497 1.497 0 0 1 0 13.5v-11zM12 14c.37 0 .654-.211.853-.441.092-.106.147-.279.147-.531V2.5a.5.5 0 0 0-.5-.5h-11a.5.5 0 0 0-.5.5v11c0 .278.223.5.497.5H12z"></path><path d="M2 3h10v2H2V3zm0 3h4v3H2V6zm0 4h4v1H2v-1zm0 2h4v1H2v-1zm5-6h2v1H7V6zm3 0h2v1h-2V6zM7 8h2v1H7V8zm3 0h2v1h-2V8zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1zm-3 2h2v1H7v-1zm3 0h2v1h-2v-1z"></path></svg></div>
                <div class="name"><strong class="text-uppercase">Total Noticias</strong>
                  <div class="count-number"><?php echo $ntotal;?></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- Header Section-->
      <section class="dashboard-header section-padding">
        <div class="container-fluid">
          <div class="row d-flex align-items-md-stretch">
            <!-- Pie Chart Banners-->
            <div class="col-6">
              <div class="card project-progress">
                <h2 class="display h4">Banners</h2>
                <p> Cantidad de Banners.</p>
                <div class="pie-chart">
                  <canvas id="piebanners" width="300" height="300"> </canvas>
                </div>
              </div>
            </div>
            <!-- Pie Chart Noticias-->
            <div class="col-6">
              <div class="card project-progress">
                <h2 class="display h4">Noticias</h2>
                <p> Cantidad de Noticias.</p>
                <div class="pie-chart">
                  <canvas id="pienoticias" width="300" height="300"> </canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class="dashboard-counts section-padding">
            <div class="container-fluid">
              <div class="row">
                <!-- Count item widget-->
                <div class="col-6">
                  <div class="wrapper count-title d-flex">
                    <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-calendar-week" viewBox="0 0 16 16"><path d="M11 6.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm-5 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1zm3 0a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1z"></path><path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"></path></svg></div>
                    <div class="name"><strong class="text-uppercase">Total Eventos</strong>
                      <div class="count-number"><?php echo $evtotal;?></div>
                    </div>
                  </div>
                </div>
                <!-- Count item widget-->
                <div class="col-6">
                  <div class="wrapper count-title d-flex">
                    <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16"><path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"></path></svg></div>
                    <div class="name"><strong class="text-uppercase">Total Profesores</strong>
                      <div class="count-number"><?php echo $prtotal;?></div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>
          <!-- Header Section-->
          <section class="dashboard-header section-padding">
            <div class="container-fluid">
              <div class="row d-flex align-items-md-stretch">
                <!-- Pie Chart Eventos-->
                <div class="col-6">
                  <div class="card project-progress">
                    <h2 class="display h4">Eventos</h2>
                    <p> Cantidad de Eventos.</p>
                    <div class="pie-chart">
                      <canvas id="pieventos" width="300" height="300"> </canvas>
                    </div>
                  </div>
                </div>
                <!-- Pie Chart Profesores-->
                <div class="col-6">
                  <div class="card project-progress">
                    <h2 class="display h4">Profesores</h2>
                    <p> Cantidad de Profesores.</p>
                    <div class="pie-chart">
                      <canvas id="pieprofesores" width="300" height="300"> </canvas>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>

          <section class="dashboard-counts section-padding">
                <div class="container-fluid">
                  <div class="row">
                    <!-- Count item widget-->
                    <div class="col-6">
                      <div class="wrapper count-title d-flex">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-book" viewBox="0 0 16 16"><path d="M1 2.828c.885-.37 2.154-.769 3.388-.893 1.33-.134 2.458.063 3.112.752v9.746c-.935-.53-2.12-.603-3.213-.493-1.18.12-2.37.461-3.287.811V2.828zm7.5-.141c.654-.689 1.782-.886 3.112-.752 1.234.124 2.503.523 3.388.893v9.923c-.918-.35-2.107-.692-3.287-.81-1.094-.111-2.278-.039-3.213.492V2.687zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"></path></svg></div>
                        <div class="name"><strong class="text-uppercase">Total Cursos</strong>
                          <div class="count-number"><?php echo $crtotal;?></div>
                        </div>
                      </div>
                    </div>
                    <!-- Count item widget-->
                    <div class="col-6">
                      <div class="wrapper count-title d-flex">
                        <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-boxes" viewBox="0 0 16 16"><path d="M7.752.066a.5.5 0 0 1 .496 0l3.75 2.143a.5.5 0 0 1 .252.434v3.995l3.498 2A.5.5 0 0 1 16 9.07v4.286a.5.5 0 0 1-.252.434l-3.75 2.143a.5.5 0 0 1-.496 0l-3.502-2-3.502 2.001a.5.5 0 0 1-.496 0l-3.75-2.143A.5.5 0 0 1 0 13.357V9.071a.5.5 0 0 1 .252-.434L3.75 6.638V2.643a.5.5 0 0 1 .252-.434L7.752.066ZM4.25 7.504 1.508 9.071l2.742 1.567 2.742-1.567L4.25 7.504ZM7.5 9.933l-2.75 1.571v3.134l2.75-1.571V9.933Zm1 3.134 2.75 1.571v-3.134L8.5 9.933v3.134Zm.508-3.996 2.742 1.567 2.742-1.567-2.742-1.567-2.742 1.567Zm2.242-2.433V3.504L8.5 5.076V8.21l2.75-1.572ZM7.5 8.21V5.076L4.75 3.504v3.134L7.5 8.21ZM5.258 2.643 8 4.21l2.742-1.567L8 1.076 5.258 2.643ZM15 9.933l-2.75 1.571v3.134L15 13.067V9.933ZM3.75 14.638v-3.134L1 9.933v3.134l2.75 1.571Z"/></svg></div>
                        <div class="name"><strong class="text-uppercase">Total Aliados</strong>
                          <div class="count-number"><?php echo $prtotal;?></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>
              <!-- Header Section-->
              <section class="dashboard-header section-padding">
                <div class="container-fluid">
                  <div class="row d-flex align-items-md-stretch">
                    <!-- Pie Chart Cursos-->
                    <div class="col-6">
                      <div class="card project-progress">
                        <h2 class="display h4">Cursos</h2>
                        <p> Cantidad de Cursos.</p>
                        <div class="pie-chart">
                          <canvas id="piecursos" width="300" height="300"> </canvas>
                        </div>
                      </div>
                    </div>
                    <!-- Pie Chart Aliados-->
                    <div class="col-6">
                      <div class="card project-progress">
                        <h2 class="display h4">Aliados</h2>
                        <p> Cantidad de Aliados.</p>
                        <div class="pie-chart">
                          <canvas id="piealiados" width="300" height="300"> </canvas>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </section>


<script src="<?php echo IP_SERVER ?>assets/js/charts/dashboard.js"></script>
<script type="text/javascript">
      $(document).ready(function () {

      'use strict';

      // Main Template Color
      var brandPrimary = '#33b35a';

      // Variables traidas de PHP
      //Banners
      var bpactivos = '<?=$bpactivos?>';
      var bpinactivos = '<?=$bpinactivos?>';
      var bactivos = '<?=$bactivos?>';
      var binactivos = '<?=$binactivos?>';
      //Noticias
      var npactivas = '<?=$npactivas?>';
      var npinactivas = '<?=$npinactivas?>';
      var nactivas = '<?=$nactivas?>';
      var ninactivas = '<?=$ninactivas?>';
      //Eventos
      var evpactivos = '<?=$evpactivos?>';
      var evpinactivos = '<?=$evpinactivos?>';
      var evactivos = '<?=$evactivos?>';
      var evinactivos = '<?=$evinactivos?>';
      //Profesores
      var prpactivos = '<?=$prpactivos?>';
      var prpinactivos = '<?=$prpinactivos?>';
      var practivos = '<?=$practivos?>';
      var prinactivos = '<?=$prinactivos?>';
      //Cursos
      var crpactivos = '<?=$crpactivos?>';
      var crpinactivos = '<?=$crpinactivos?>';
      var cractivos = '<?=$cractivos?>';
      var crinactivos = '<?=$crinactivos?>';
      //Prospectos
      var prospectos = '<?=json_encode($prospectos)?>'
      //Prospectos
      var alpactivos = '<?=$alpactivos?>';
      var alpinactivos = '<?=$alpinactivos?>';
      var alactivos = '<?=$alactivos?>';
      var alinactivos = '<?=$alinactivos?>';


      // ------------------------------------------------------- //
      // Pie Chart - Banners
      // ------------------------------------------------------ //
      var PIEBANNERS = $('#piebanners');
      var myPieChart = new Chart(PIEBANNERS, {
        type: 'doughnut',
        data: {
            labels: [
                "Activos".concat(' ',bpactivos,'%'),
                "Inactivos".concat(' ',bpinactivos,'%'),
            ],
            datasets: [
                {
                    data: [bactivos, binactivos],
                    borderWidth: [1, 1],
                    backgroundColor: [
                        brandPrimary,
                        "rgba(255,185,0,1)",
                        "#FFB900"
                    ],
                    hoverBackgroundColor: [
                        brandPrimary,
                        "rgba(255,185,0,1)",
                        "#FFB900"
                    ]
                }]
        }
      });
      // ------------------------------------------------------- //
      // Pie Chart - Noticias
      // ------------------------------------------------------ //
      var PIENOTICIAS = $('#pienoticias');
      var myPieChart = new Chart(PIENOTICIAS, {
        type: 'doughnut',
        data: {
            labels: [
                "Activos".concat(' ',npactivas,'%'),
                "Inactivos".concat(' ',npinactivas,'%'),
            ],
            datasets: [
                {
                    data: [nactivas, ninactivas],
                    borderWidth: [1, 1],
                    backgroundColor: [
                        brandPrimary,
                        "rgba(232,46,0,1)",
                        "#e82e00"
                    ],
                    hoverBackgroundColor: [
                        brandPrimary,
                        "rgba(232,46,0,1)",
                        "#e82e00"
                    ]
                }]
        }
      });
      // ------------------------------------------------------- //
      // Pie Chart - Eventos
      // ------------------------------------------------------ //
      var PIEEVENTOS = $('#pieventos');
      var myPieChart = new Chart(PIEEVENTOS, {
        type: 'doughnut',
        data: {
            labels: [
                "Activos".concat(' ',evpactivos,'%'),
                "Inactivos".concat(' ',evpinactivos,'%'),
            ],
            datasets: [
                {
                    data: [evactivos, evinactivos],
                    borderWidth: [1, 1],
                    backgroundColor: [
                        brandPrimary,
                        "rgba(191,0,77,1)",
                        "#bf004d"
                    ],
                    hoverBackgroundColor: [
                        brandPrimary,
                        "rgba(191,0,77,1)",
                        "#bf004d"
                    ]
                }]
        }
      });
      // ------------------------------------------------------- //
      // Pie Chart - Profesores
      // ------------------------------------------------------ //
      var PIEPROFESORES = $('#pieprofesores');
      var myPieChart = new Chart(PIEPROFESORES, {
        type: 'doughnut',
        data: {
            labels: [
                "Activos".concat(' ',prpactivos,'%'),
                "Inactivos".concat(' ',prpinactivos,'%'),
            ],
            datasets: [
                {
                    data: [practivos, prinactivos],
                    borderWidth: [1, 1],
                    backgroundColor: [
                        brandPrimary,
                        "rgba(162,49,182,1)",
                        "#A231B6"
                    ],
                    hoverBackgroundColor: [
                        brandPrimary,
                        "rgba(162,49,182,1)",
                        "#A231B6"
                    ]
                }]
        }
      });
      // ------------------------------------------------------- //
      // Pie Chart - Cursos
      // ------------------------------------------------------ //
      var PIECURSOS = $('#piecursos');
      var myPieChart = new Chart(PIECURSOS, {
        type: 'doughnut',
        data: {
            labels: [
                "Activos".concat(' ',crpactivos,'%'),
                "Inactivos".concat(' ',crpinactivos,'%'),
            ],
            datasets: [
                {
                    data: [cractivos, crinactivos],
                    borderWidth: [1, 1],
                    backgroundColor: [
                        brandPrimary,
                        "rgba(255,87,51,1)",
                        "#FF5733"
                    ],
                    hoverBackgroundColor: [
                        brandPrimary,
                        "rgba(255,87,51,1)",
                        "#FF5733"
                    ]
                }]
        }
      });
      // ------------------------------------------------------- //
      // Bar Chart - Aliado
      // ------------------------------------------------------ //
      var PIALIADOS = $('#piealiados');
      var myPieChart = new Chart(PIALIADOS, {
        type: 'doughnut',
        data: {
            labels: [
                "Activos".concat(' ',alpactivos,'%'),
                "Inactivos".concat(' ',alpinactivos,'%'),
            ],
            datasets: [
                {
                    data: [alactivos, alinactivos],
                    borderWidth: [1, 1],
                    backgroundColor: [
                        brandPrimary,
                        "rgba(255,87,51,1)",
                        "#FF5733"
                    ],
                    hoverBackgroundColor: [
                        brandPrimary,
                        "rgba(255,87,51,1)",
                        "#FF5733"
                    ]
                }]
        }
      });
      // ------------------------------------------------------- //


      });
      </script>
