<?php 
if ($idRoles == 3 && $totalempleadosac[0]->cantidad == 0 && $totalempleadosinac[0]->cantidad == 0) {
  $datac = [
    'teinac' => $totalempleadosinac[0]->cantidad,
    'teac' => $totalempleadosac[0]->cantidad,
    'toinac' =>$totalobrasinac[0]->cantidad,
    'toac' => $totalobrasac[0]->cantidad,
    'peina' => 0,
    'peac' => 0,
    'poinac' => 0,
    'poac' => number_format($totalobrasac[0]->cantidad*100/$totalobras[0]->cantidad,1)
  ];

}else{
  $datac = [
    'teinac' => $totalempleadosinac[0]->cantidad,
    'teac' => $totalempleadosac[0]->cantidad,
    'toinac' =>$totalobrasinac[0]->cantidad,
    'toac' => $totalobrasac[0]->cantidad,
    'peina' => number_format($totalempleadosinac[0]->cantidad*100/$totalempleados[0]->cantidad,1),
    'peac' => number_format($totalempleadosac[0]->cantidad*100/$totalempleados[0]->cantidad,1),
    'poinac' => number_format($totalobrasinac[0]->cantidad*100/$totalobras[0]->cantidad,1),
    'poac' => number_format($totalobrasac[0]->cantidad*100/$totalobras[0]->cantidad,1)
  ];
}
?>
<!-- Counts Section -->
<section class="dashboard-counts section-padding">
        <div class="container-fluid">
          <div class="row">
            <!-- Count item widget-->
            <div class="col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16"><path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/><path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/><path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/></svg></div>
                <div class="name"><strong class="text-uppercase">Total Empleados Asociados</strong>
                  <div class="count-number"><?php echo $totalempleados[0]->cantidad;?></div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <div class="col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-page"></i></div>
                <div class="name"><strong class="text-uppercase">Total Obras Asociadas</strong>
                  <div class="count-number"><?php echo $totalobras[0]->cantidad;?></div>
                </div>
              </div>
            </div>
            <!-- Count item widget-->
            <!-- <div class="col-xl-4 col-md-4 col-6">
              <div class="wrapper count-title d-flex">
                <div class="icon"><i class="icon-padnote"></i></div>
                <div class="name"><strong class="text-uppercase">Solicitudes Epp Asociadas</strong>
                  <div class="count-number">342</div>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </section>
      <!-- Header Section-->
      <section class="dashboard-header section-padding">
        <div class="container-fluid">
          <div class="row d-flex align-items-md-stretch">          
            <!-- Pie Chart-->
            <div class="col-6">
              <div class="card project-progress">
                <h2 class="display h4">Empleados</h2>
                <p> Cantidad de empleados.</p>
                <div class="pie-chart">
                  <canvas id="pieChart" width="300" height="300"> </canvas>
                </div>
              </div>
            </div>
            <!-- Pie Chart-->
            <div class="col-6">
              <div class="card project-progress">
                <h2 class="display h4">Obras</h2>
                <p> Cantidad de obras.</p>
                <div class="pie-chart">
                  <canvas id="pieChart2" width="300" height="300"> </canvas>
                </div>
              </div>
            </div>
            <!-- Pie Chart-->
            <!-- <div class="col-xl-4 col-md-4 col-6">
              <div class="card project-progress">
                <h2 class="display h4">Epp</h2>
                <p> Cantidad de Solicitudes Epp.</p>
                <div class="pie-chart">
                  <canvas id="pieChart3" width="300" height="300"> </canvas>
                </div>
              </div>
            </div> -->
          </div>
        </div>
      </section>
<script>
  $(document).ready(function () {

'use strict';

// Main Template Color
var brandPrimary = '#33b35a';

// Variables traidas de PHP
var teinac = <?=$datac['teinac']?>;
var teac = <?=$datac['teac']?>;
var toinac = <?=$datac['toinac']?>;
var toac = <?=$datac['toac']?>;
var peina = <?= $datac['peina'];?>;
var peac = <?= $datac['peac'];?>;
var poinac = <?= $datac['poinac'];?>;
var poac = <?= $datac['poac'];?>;

// ------------------------------------------------------- //
// Pie Chart - Empleados
// ------------------------------------------------------ //
var PIECHART = $('#pieChart');

var myPieChart = new Chart(PIECHART, {
    type: 'doughnut',
    data: {
        labels: [
            "Activos".concat(' ',peac,'%'),
            "Inactivos".concat(' ',peina,'%'),
        ],
        datasets: [
            {
                data: [teac, teinac],
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
// Pie Chart2 - Obras
// ------------------------------------------------------ //
var PIECHART2 = $('#pieChart2');
var myPieChart2 = new Chart(PIECHART2, {
    type: 'doughnut',
    data: {
        labels: [
            "Activas".concat(' ',poac,'%'),
            "Inactivas".concat(' ',poinac,'%'),
        ],
        datasets: [
            {
                data: [toac, toinac],
                borderWidth: [1, 1],
                backgroundColor: [
                    brandPrimary,
                    "rgba(255,45,0,1)",
                    "#FF2D00"
                ],
                hoverBackgroundColor: [
                    brandPrimary,
                    "rgba(255,45,0,1)",
                    "#FF2D00"
                ]
            }]
    }
});

// ------------------------------------------------------- //
// Pie Chart3 - Epps
// ------------------------------------------------------ //
var PIECHART3 = $('#pieChart3');
var myPieChart3 = new Chart(PIECHART3, {
    type: 'doughnut',
    data: {
        labels: [
            "Solicitudes",
            "Remisiones"
        ],
        datasets: [
            {
                data: [180, 162],
                borderWidth: [1, 1],
                backgroundColor: [
                    brandPrimary,
                    "rgba(251,255,0,1)",
                    "#FBFF00"
                ],
                hoverBackgroundColor: [
                    brandPrimary,
                    "rgba(251,255,0,1)",
                    "#FBFF00"
                ]
            }]
    }
});

});

</script>