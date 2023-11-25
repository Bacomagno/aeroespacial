<?php

namespace App\Controllers\web;
use App\Controllers\BaseController;
use App\Models\Banner_model;

class BannerControllerHome extends BaseController
{

  public function getBannerActivo(){
    $date = date('Y-m-d');

    $bannerModel = new Banner_model();
    $resultado = $bannerModel->getBannerVigentes($date, 1);
    return json_encode($resultado);
  }

  /**
  *
  */
  public function getBannerSecundario(){
    $date = date('Y-m-d');
    $bannerModel = new Banner_model();
    $resultado = $bannerModel->getBannerVigentes($date, 2);
    return json_encode($resultado);
  }

}
 ?>
