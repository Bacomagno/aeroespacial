<?php

namespace App\Controllers\web;
use App\Controllers\BaseController;
use App\Models\Eventos_model;
use App\Models\Cursos_model;
use App\Models\Profesores_model;
use App\Models\Prospectos_model;
use App\Controllers\Otros;

class Home extends BaseController
{
    public function index()
    {

        echo view('includes/web/head');
        echo view('includes/web/loader');
        echo view('includes/web/navbar');
        echo view('includes/web/pantalla');
        echo view('includes/web/footer');
    }
    public function nosotros()
    {
        echo view('includes/web/head');
        echo view('includes/web/loader');
        echo view('includes/web/navbar');
        echo view('includes/web/info');
        echo view('includes/web/footer');
    }
    public function cursos()
    {
        echo view('includes/web/head');
        echo view('includes/web/loader');
        echo view('includes/web/navbar');
        echo view('includes/web/cursos');
        echo view('includes/web/footer');
    }

    public function enConstruccion()
    {
        echo view('includes/web/head');
        echo view('includes/web/loader');
        echo view('includes/web/navbar');
        echo view('includes/web/enConstruccion');
        echo view('includes/web/footer');
    }
    //
    /**
    * METODO PARA CONSULTAR LOS EVENTOS DISPONIBLES PARA MOSTRAR EN CALENDARIO
    */
    public function getEventosHome(){
      $objEvento = new Eventos_model();

      $resp = $objEvento->getEventos(1);
      if (!empty($resp)) {
        foreach ($resp as $evento) {
          $info= array(
            'id' => $evento->evento_id,
            'title' => $evento->evento_nombre,
            'start' => date('Y-m-d', strtotime($evento->evento_finicio)).'T'.$evento->evento_hinicio,
            'end' => date('Y-m-d', strtotime($evento->evento_fin)).'T'.$evento->evento_hfin,
            'link' => $evento->evento_link ,
            'descripcion'=> $evento->evento_descripcion,
            'adjunto'=> $evento->evento_adjunto,
            'video'=> $evento->evento_video,
           );
          $data[]= (object) $info;
        }
      }
      return json_encode($data);
    }

    /**
    * METODO PARA CONSULTR LOS CURSOS VIGENTES
    */
    public function getCursos(){
      $objModel = new Cursos_model();
      $resp = $objModel->getCursos();
      return json_encode($resp);
    }


    public function saveProspect()
    {

      $prospecto = array(
        'prospecto_nombre1' =>$this->request->getPost('prospecto_nombre1'),
        'prospecto_nombre2' =>$this->request->getPost('prospecto_nombre2'),
        'prospecto_apellido1' =>$this->request->getPost('prospecto_apellido1'),
        'prospecto_apellido2' =>$this->request->getPost('prospecto_apellido2'),
        'prospecto_correo' =>$this->request->getPost('prospecto_correo'),
        'prospecto_telefono' =>$this->request->getPost('prospecto_telefono'),
        'prospecto_identificacion' =>$this->request->getPost('prospecto_identificacion'),
        'prospecto_ciudad' =>$this->request->getPost('usuario_ciudad'),
        'prospecto_estado_id' => 1,
        'prospecto_identificacion_id' =>$this->request->getPost('prospecto_identificacion_id'),
      );

      $cursoInteres = $this->request->getPost('cursos');
      $objModel = new Cursos_model();
      $otroscontroller = new Otros();
      $data = (object) $prospecto;
      $resultado['email'] = $otroscontroller->sendmail($data, $cursoInteres);
      $resultado['data'] = $objModel->saveProspectCuro($prospecto, $cursoInteres);



      return json_encode($resultado);



    }


    public function countProspectos()
    {
      $objModel = new Prospectos_model();

      $resp = $objModel->countProspectos(1);
      return json_encode($resp);
    }

    public function countDocentes()
    {
      $objModel = new Profesores_model();
      $resp = $objModel->countProfesores(1);
      return json_encode($resp);
    }
}
