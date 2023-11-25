<?php

namespace App\Controllers\web;
use App\Controllers\BaseController;
use App\Models\Aliados_model;

class AliadosController extends BaseController
{

  public function index()
  {
      echo view('includes/web/head');
      echo view('includes/web/loader');
      echo view('includes/web/navbar');
      echo view('includes/web/aliadoInternacional');
      echo view('includes/web/footer');
  }
  /**
  * funcion de consulta de informacion de los profesores
  * Create by Sebastina diaz
  */
  public function getAliados(){

    $objModel = new Aliados_model();
    $resultado = $objModel->getInfoAliados();
    return json_encode($resultado);

  }
  /**
  * Funcion que llama la vista de mas informacion de los profesores
  * Create by Sebastan Diaz
  * @return view|mixed
  */
  public function moreInfo(){
    echo view('includes/web/head');
    echo view('includes/web/navbar');
    echo view('includes/web/aliados');
    echo view('includes/web/footer');
  }

  public function getMoreInfoAliado(){
    $id = $this->request->getPost('id');
    $objModel = new Aliados_model();
    $resultado = $objModel->getMoreInfo($id);
    return json_encode($resultado);
  }

}
 ?>
