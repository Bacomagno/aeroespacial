<?php

namespace App\Controllers\web;
use App\Controllers\BaseController;
use App\Models\Profesores_model;

class ProfesoresController extends BaseController
{

  public function index(){
    echo view('includes/web/head');
    echo view('includes/web/navbar');
    echo view('includes/web/docentes');
    echo view('includes/web/footer');
  }
  /**
  * funcion de consulta de informacion de los profesores
  * Create by Sebastina diaz
  */
  public function getProfesores(){

    $objModel = new Profesores_model();
    $resultado = $objModel->getInfoProfesores();
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
    echo view('includes/web/profesores');
    echo view('includes/web/footer');
  }

  public function getMoreInfoProfesor(){
    $id = $this->request->getPost('id');
    $objModel = new Profesores_model();
    $resultado = $objModel->getMoreInfo($id);
    return json_encode($resultado);

  }

}
 ?>
