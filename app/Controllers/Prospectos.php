<?php

namespace App\Controllers;
use App\Models\Usuarios_model;
use App\Models\Cursos_model;
use App\Models\ProspectosCursos_model;
use App\Models\Prospectos_model;
use App\Models\Identificacion_model;

class Prospectos extends BaseController{

  // Función: Mostrar las prospectos con y sin filtros de fechas de registro
 public function prospectos(){
      $session=session();
      if($session->get('login')){

          echo view('includes/admin/pagina/head');
          $fechaini=$this->request->getPost('fechaini');
          $fechafin=$this->request->getPost('fechafin');

          if (($session->get('usuario_rol_id')==1)){
              echo view('includes/admin/menus/super_admin');
          }

          $ProspectosModel = new Prospectos_model();
          $IdentificacionModel = new Identificacion_model();

          if($fechaini && $fechafin){
            $data['prospectos'] = $ProspectosModel->getProspectosFecha($fechaini,$fechafin,1);
            $data['fechaini'] = $fechaini;
            $data['fechafin'] = $fechafin;
          }else{
            $data['prospectos'] = $ProspectosModel->getProspectos(1);
          }

          $data['cursos'] = $ProspectosModel->getProspectosCursos(1);
          $data['identificación'] = $IdentificacionModel->getIdentificacion();

          echo view('includes/admin/prospectos/prospectos',$data);
          echo view('includes/admin/pagina/scripts');
          echo view('includes/admin/pagina/footer');
      }
      else{
          echo view('includes/admin/pagina/head');
          echo view("includes/admin/login");
          echo view('includes/admin/pagina/scripts');
          echo view('includes/admin/pagina/footer');
      }
  }


  }
