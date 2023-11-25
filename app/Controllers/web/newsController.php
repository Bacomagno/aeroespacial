<?php

namespace App\Controllers\web;
use App\Controllers\BaseController;
use App\Models\Noticias_model;

class newsController extends BaseController
{
  public function index($i = false)
  {
      echo view('includes/web/head');
      echo view('includes/web/loader');
      echo view('includes/web/navbar');
      echo view('includes/web/news');
      echo view('includes/web/footer');
  }
  public function novedadesIndex()
  {
      echo view('includes/web/head');
      echo view('includes/web/loader');
      echo view('includes/web/navbar');
      echo view('includes/web/novedades');
      echo view('includes/web/footer');
  }

  public function getNews()
  {
    $fecha = date_create(TIMESTAMP);
    $fechaFin = date_create(TIMESTAMP);
    date_add($fechaFin, date_interval_create_from_date_string("-1 months"));

    $row = 0;
    if(!empty($this->request->getPost('row'))){
      $row = $this->request->getPost('row');
    }
    $row = $row*1;
    // var_dump();
    // die;
    $noticiasModel = new Noticias_model();
    $resultado = $noticiasModel->getNoticiasVista(date_format($fechaFin, 'Y-m-d'), date_format($fecha, 'Y-m-d'), $row);
    return json_encode($resultado);
  }



  public function getNovedades()
  {
    $fecha = date_create(TIMESTAMP);
    $fechaFin = date_create(TIMESTAMP);
    date_add($fechaFin, date_interval_create_from_date_string("-1 months"));

    $row = 0;
    if(!empty($this->request->getPost('row'))){
      $row = $this->request->getPost('row');
    }
    $row = $row*1;
    $noticiasModel = new Noticias_model();
    $resultado = $noticiasModel->getNovedadesVista(date_format($fechaFin, 'Y-m-d'), date_format($fecha, 'Y-m-d'), $row);
    return json_encode($resultado);
  }



}
 ?>
