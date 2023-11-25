<?php

namespace App\Controllers;
use App\Models\Usuarios_model;
use App\Models\Cursos_model;
use App\Models\Profesores_model;
use App\Models\Otros_model;
use App\Models\ProfesoresCursos_model;
use App\Models\Auditoria_model;

class Cursos extends BaseController{

  // Función: Mostrar las cursos activos, con y sin filtros de fechas
   public function cursosactivos(){
        $session=session();
        if($session->get('login')){

            echo view('includes/admin/pagina/head');
            $fechaini=$this->request->getPost('fechaini');
            $fechafin=$this->request->getPost('fechafin');

            if (($session->get('usuario_rol_id')==1)){
                echo view('includes/admin/menus/super_admin');
            }

            $cursosModel = new Cursos_model();
            $profesorescursos = new ProfesoresCursos_model();

            if($fechaini && $fechafin){
                $data['cursos']=$profesorescursos->getProfesoresCursosFechas(1,$fechaini,$fechafin);
                $data['fechaini'] = $fechaini;
                $data['fechafin'] = $fechafin;
            }else{
                $data['cursos']=$profesorescursos->getProfesoresCursos(1);
            }

            $profesoresModel = new Profesores_Model;
            $data['profesores'] = $profesoresModel->getProfesores(1);

            echo view('includes/admin/cursos/cursosactivos',$data);
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


    // Función para crear un curso nuevo
   public function cursoscrear(){
    $session=session();
    if($session->get('login')){
        // Obtener la data del adjunto

          $datos=([
            'curso_nombre'               =>$this->request->getPost('curso_nombre'),
            'curso_link'                 =>$this->request->getPost('curso_link'),
            'curso_descripcion'          =>$this->request->getPost('curso_descripcion'),
            'curso_finicio'              =>$this->request->getPost('curso_finicio'),
            'curso_fin'                  =>$this->request->getPost('curso_fin'),
            'curso_tipomodulo'           =>$this->request->getPost('curso_tipomodulo'),
            'curso_usuario_id'           =>$session->get('usuario_id'),
            'create_at'                   =>TIMESTAMP
          ]);

          $profesor_id=$this->request->getPost('curso_profesor');

          $cursosModel = new cursos_model();
          $profesorescursos = new ProfesoresCursos_model();
          $curso_id=$cursosModel->setCursos($datos);
          $profesorescursos->setProfesoresCursos($profesor_id,$curso_id);
          $auditoria = [
              'auditoria_usuario_id'    =>$session->get('usuario_id'),
              'auditoria_tipo'          =>3,
              'auditoria_accion'        =>"curso_nombre: ".$this->request->getPost('curso_nombre').
                                          ", curso_link: ".$this->request->getPost('curso_link').
                                          ", curso_descripcion: ".$this->request->getPost('curso_descripcion').
                                          ", curso_finicio: ".$this->request->getPost('curso_finicio').
                                          ", curso_fin: ".$this->request->getPost('curso_fin').
                                          ", curso_tipomodulo".$this->request->getPost('curso_tipomodulo'),
              'create_at'               =>TIMESTAMP
          ];
          $auditoriaModel = new Auditoria_model();
          $auditoriaModel->registro($auditoria);

    }else{
        echo view('includes/admin/pagina/head');
        echo view("includes/admin/login");
        echo view('includes/admin/pagina/scripts');
        echo view('includes/admin/pagina/footer');
    }
  }


  // Función: Mostrar para modificar un curso
 public function cursosmodificar($curso_id){
      $session=session();
      if($session->get('login')){

          echo view('includes/admin/pagina/head');

          if (($session->get('usuario_rol_id')==1)){
              echo view('includes/admin/menus/super_admin');
          }

          $profesorescursos = new ProfesoresCursos_model();
          $profesoresModel = new Profesores_Model;
          $datos['profesores'] = $profesoresModel->getProfesores(1);
          $datos['curso'] = $profesorescursos ->getProfesoresCursosId($curso_id);
          $datos['curso_id'] = $curso_id;

          echo view('includes/admin/cursos/cursosmodificar',$datos);
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



// Función: actualiza curso en BD
   public function cursosactualizar(){
     $session=session();
     if($session->get('login')){

        $curso_id = $this->request->getPost('curso_id');
        $datos=([
          'curso_nombre'               =>$this->request->getPost('curso_nombre'),
          'curso_link'                 =>$this->request->getPost('curso_link'),
          'curso_descripcion'          =>$this->request->getPost('curso_descripcion'),
          'curso_finicio'              =>$this->request->getPost('curso_finicio'),
          'curso_fin'                  =>$this->request->getPost('curso_fin'),
          'curso_tipomodulo'           =>$this->request->getPost('curso_tipomodulo'),
          'curso_usuario_id'           =>$session->get('usuario_id'),
          'update_at'                  =>TIMESTAMP
        ]);
        $profesores_profesor_id=([
          'profesores_profesor_id'     =>$this->request->getPost('curso_profesor')]
        );

       $cursosModel       = new cursos_model();
       $profesorescursos  = new ProfesoresCursos_model();
       $cursosModel       ->actualizarCurso($datos,$curso_id);
       $profesorescursos  ->actualizarProfesoresCursos($profesores_profesor_id,$curso_id);
       $auditoria = [
           'auditoria_usuario_id'    =>$session->get('usuario_id'),
           'auditoria_tipo'          =>4,
           'auditoria_accion'        =>"curso_nombre: ".$this->request->getPost('curso_nombre').
                                       ", curso_link: ".$this->request->getPost('curso_link').
                                       ", curso_descripcion: ".$this->request->getPost('curso_descripcion').
                                       ", curso_finicio: ".$this->request->getPost('curso_finicio').
                                       ", curso_fin: ".$this->request->getPost('curso_fin').
                                       ", curso_tipomodulo".$this->request->getPost('curso_tipomodulo'),
           'create_at'               =>TIMESTAMP
       ];
       $auditoriaModel = new Auditoria_model();
       $auditoriaModel->registro($auditoria);

       echo "ok";
     }
     else{
         echo "erros";
     }
   }



  // Función para desactivar un curso
 public function cursosdesactivar($curso_id){
   $session=session();
    if($session->get('login')){
      // Array de datos para la BD
      $datos=([
          'curso_estado_id'      =>'2',
          'curso_usuario_id'     =>$session->get('usuario_id'),
          'update_at'             =>TIMESTAMP
      ]);

      $cursosModel = new cursos_model();
      $cursosModel ->actualizarCurso($datos,$curso_id);
      $auditoria = [
          'auditoria_usuario_id'    =>$session->get('usuario_id'),
          'auditoria_tipo'          =>6,
          'auditoria_accion'        =>"curso_id: ".$curso_id,
          'create_at'               =>TIMESTAMP
      ];
      $auditoriaModel = new Auditoria_model();
      $auditoriaModel->registro($auditoria);

      echo view('includes/admin/pagina/head');
      echo view('includes/admin/alertas/cursosdesactivar');
      echo view('includes/admin/pagina/scripts');
      echo view('includes/admin/pagina/footer');

    }else{
      echo view('includes/admin/pagina/head');
      echo view("includes/admin/login");
      echo view('includes/admin/pagina/scripts');
      echo view('includes/admin/pagina/footer');
    }
  }



    // Función: Mostrar los cursos inactivos, con y sin filtros de fechas
   public function cursosinactivos(){
        $session=session();
        if($session->get('login')){

            echo view('includes/admin/pagina/head');
            $fechaini=$this->request->getPost('fechaini');
            $fechafin=$this->request->getPost('fechafin');

            if (($session->get('usuario_rol_id')==1)){
                echo view('includes/admin/menus/super_admin');
            }

            $cursosModel = new Cursos_model();
            $profesorescursos = new ProfesoresCursos_model();

            if($fechaini && $fechafin){
                $data['cursos']=$profesorescursos->getProfesoresCursosFechas(2,$fechaini,$fechafin);
                $data['fechaini'] = $fechaini;
                $data['fechafin'] = $fechafin;
            }else{
                $data['cursos']=$profesorescursos->getProfesoresCursos(2);
            }

            $profesoresModel = new Profesores_Model;
            $data['profesores'] = $profesoresModel->getProfesores(1);

            echo view('includes/admin/cursos/cursosinactivos',$data);
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

    // Función para actiavr un curso
public function cursosactivar($curso_id){
 $session=session();
  if($session->get('login')){
    // Array de datos para la BD
    $datos=([
        'curso_estado_id'      =>'1',
        'curso_usuario_id'     =>$session->get('usuario_id'),
        'update_at'             =>TIMESTAMP
    ]);

    $cursosModel = new cursos_model();
    $cursosModel ->actualizarCurso($datos,$curso_id);
    $auditoria = [
        'auditoria_usuario_id'    =>$session->get('usuario_id'),
        'auditoria_tipo'          =>5,
        'auditoria_accion'        =>"curso_id: ".$curso_id,
        'create_at'               =>TIMESTAMP
    ];
    $auditoriaModel = new Auditoria_model();
    $auditoriaModel->registro($auditoria);

    echo view('includes/admin/pagina/head');
    echo view('includes/admin/alertas/cursosactivar');
    echo view('includes/admin/pagina/scripts');
    echo view('includes/admin/pagina/footer');

  }else{
    echo view('includes/admin/pagina/head');
    echo view("includes/admin/login");
    echo view('includes/admin/pagina/scripts');
    echo view('includes/admin/pagina/footer');
  }
}





  }
