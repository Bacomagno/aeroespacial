<?php

namespace App\Controllers;
use App\Models\Usuarios_model;
use App\Models\Profesores_model;
use App\Models\Otros_model;
use App\Models\ProfesoresCursos_model;
use App\Models\Auditoria_model;

class Profesores extends BaseController{

  // Función: Mostrar las profesores activos, con y sin filtros de fechas
   public function profesoresactivos(){
        $session=session();
        if($session->get('login')){

            echo view('includes/admin/pagina/head');
            $fechaini=$this->request->getPost('fechaini');
            $fechafin=$this->request->getPost('fechafin');

            if (($session->get('usuario_rol_id')==1)){
                echo view('includes/admin/menus/super_admin');
            }

            $ProfesoresModel = new profesores_model();

            $data['profesores'] = $ProfesoresModel->getProfesores(1);
            echo view('includes/admin/profesores/profesoresactivos',$data);

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

    // Función para crear un Evento nuevo
   public function profesorescrear(){
    $session=session();
    if($session->get('login')){
        // Obtener la data del adjunto
        $profesor_foto = $this->request->getFile("profesor_foto");
        // Si trae el Adjunto
        if($_FILES["profesor_foto"]["error"] == 0){
            // genrar nombre random para el adjunto
            $fotoname = $profesor_foto->getRandomName();

            // Array de datos que se agregaran en la BD
            $datos=([
                'profesor_nombres'                =>$this->request->getPost('profesor_nombres'),
                'profesor_apellidos'              =>$this->request->getPost('profesor_apellidos'),
                'profesor_titulo'                 =>$this->request->getPost('profesor_titulo'),
                'profesor_puestoactual'           =>$this->request->getPost('profesor_puestoactual'),
                'profesor_educacion'              =>$this->request->getPost('profesor_educacion'),
                'profesor_descripcion'            =>$this->request->getPost('profesor_descripcion'),
                'profesor_email'                  =>$this->request->getPost('profesor_email'),
                'profesor_pagina'                 =>$this->request->getPost('profesor_pagina'),
                'profesor_facebook'               =>$this->request->getPost('profesor_facebook'),
                'profesor_twitter'                =>$this->request->getPost('profesor_twitter'),
                'profesor_instagram'              =>$this->request->getPost('profesor_instagram'),
                'profesor_youtube'                =>$this->request->getPost('profesor_youtube'),
                'profesor_linkedin'               =>$this->request->getPost('profesor_linkedin'),
                'profesor_foto'                   =>'writable/uploads/images/profesores/'.$fotoname,
                'profesor_usuario_id'             =>$session->get('usuario_id'),
                'create_at'                       =>TIMESTAMP

            ]);
            $auditoria = [
                'auditoria_usuario_id'    =>$session->get('usuario_id'),
                'auditoria_tipo'          =>3,
                'auditoria_accion'        =>"profesor_nombres: ".$this->request->getPost('profesor_nombres').
                                            ", profesor_apellidos: ".$this->request->getPost('profesor_apellidos').
                                            ", profesor_titulo: ".$this->request->getPost('profesor_titulo').
                                            ", profesor_puestoactual: ".$this->request->getPost('profesor_puestoactual').
                                            ", profesor_educacion: ".$this->request->getPost('profesor_educacion').
                                            ", profesor_descripcion: ".$this->request->getPost('profesor_descripcion').
                                            ", profesor_email: ".$this->request->getPost('profesor_email').
                                            ", profesor_pagina: ".$this->request->getPost('profesor_pagina').
                                            ", profesor_facebook: ".$this->request->getPost('profesor_facebook').
                                            ", profesor_twitter: ".$this->request->getPost('profesor_twitter').
                                            ", profesor_instagram: ".$this->request->getPost('profesor_instagram').
                                            ", profesor_youtube: ".$this->request->getPost('profesor_youtube').
                                            ", profesor_linkedin: ".$this->request->getPost('profesor_linkedin').
                                            ", profesor_foto: writable/uploads/images/profesores/".$fotoname,
                'create_at'               =>TIMESTAMP
            ];

            // Llamado a la funcion de Otrod para subir foto en ruta del servidor
            $foto = new Otros();
            if(!empty($fotoname)){
                $foto->cargarFoto($profesor_foto,$fotoname,7);
            }

            echo "ok";
        }else{
          // Array de datos que se agregaran en la BD
          $datos=([
              'profesor_nombres'                 =>$this->request->getPost('profesor_nombres'),
              'profesor_apellidos'               =>$this->request->getPost('profesor_apellidos'),
              'profesor_titulo'                  =>$this->request->getPost('profesor_titulo'),
              'profesor_puestoactual'            =>$this->request->getPost('profesor_puestoactual'),
              'profesor_educacion'               =>$this->request->getPost('profesor_educacion'),
              'profesor_descripcion'             =>$this->request->getPost('profesor_descripcion'),
              'profesor_email'                  =>$this->request->getPost('profesor_email'),
              'profesor_pagina'                  =>$this->request->getPost('profesor_pagina'),
              'profesor_facebook'                =>$this->request->getPost('profesor_facebook'),
              'profesor_twitter'                =>$this->request->getPost('profesor_twitter'),
              'profesor_instagram'               =>$this->request->getPost('profesor_instagram'),
              'profesor_youtube'                 =>$this->request->getPost('profesor_youtube'),
              'profesor_linkedin'                =>$this->request->getPost('profesor_linkedin'),
              'profesor_usuario_id'              =>$session->get('usuario_id'),
              'create_at'                        =>TIMESTAMP

          ]);
          $auditoria = [
              'auditoria_usuario_id'    =>$session->get('usuario_id'),
              'auditoria_tipo'          =>3,
              'auditoria_accion'        =>"profesor_nombres: ".$this->request->getPost('profesor_nombres').
                                          ", profesor_apellidos: ".$this->request->getPost('profesor_apellidos').
                                          ", profesor_titulo: ".$this->request->getPost('profesor_titulo').
                                          ", profesor_puestoactual: ".$this->request->getPost('profesor_puestoactual').
                                          ", profesor_educacion: ".$this->request->getPost('profesor_educacion').
                                          ", profesor_descripcion: ".$this->request->getPost('profesor_descripcion').
                                          ", profesor_email: ".$this->request->getPost('profesor_email').
                                          ", profesor_pagina: ".$this->request->getPost('profesor_pagina').
                                          ", profesor_facebook: ".$this->request->getPost('profesor_facebook').
                                          ", profesor_twitter: ".$this->request->getPost('profesor_twitter').
                                          ", profesor_instagram: ".$this->request->getPost('profesor_instagram').
                                          ", profesor_youtube: ".$this->request->getPost('profesor_youtube').
                                          ", profesor_linkedin: ".$this->request->getPost('profesor_linkedin'),
              'create_at'               =>TIMESTAMP
          ];
        }


                    $ProfesoresModel = new profesores_model();
                    $ProfesoresModel ->setProfesores($datos);
                    $auditoriaModel = new Auditoria_model();
                    $auditoriaModel->registro($auditoria);

    }else{
        echo view('includes/admin/pagina/head');
        echo view("includes/admin/login");
        echo view('includes/admin/pagina/scripts');
        echo view('includes/admin/pagina/footer');
    }
  }

  // Función: Mostrar para modificar un Evento
 public function profesoresmodificar($profesor_id){
      $session=session();
      if($session->get('login')){

          echo view('includes/admin/pagina/head');

          if (($session->get('usuario_rol_id')==1)){
              echo view('includes/admin/menus/super_admin');
          }

          $ProfesoresModel = new profesores_model();
          $datos['profesor'] = $ProfesoresModel ->getProfesorId($profesor_id);
          $datos['profesor_id'] = $profesor_id;

          echo view('includes/admin/profesores/profesoresmodificar',$datos);
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

// Función: actualiza evento en BD
   public function profesoresactualizar(){
     $session=session();
     if($session->get('login')){

        // Obtener la data del adjunto
        $profesor_foto = $this->request->getFile("profesor_foto");
        $profesor_id = $this->request->getPost('profesor_id');

        if($_FILES["profesor_foto"]["error"] == 0){
            // genrar nombre random para el adjunto
            $fotoname = $profesor_foto->getRandomName();

            // Array de datos que se agregaran en la BD
            $datos=([
                'profesor_nombres'                =>$this->request->getPost('profesor_nombres'),
                'profesor_apellidos'              =>$this->request->getPost('profesor_apellidos'),
                'profesor_titulo'                 =>$this->request->getPost('profesor_titulo'),
                'profesor_puestoactual'           =>$this->request->getPost('profesor_puestoactual'),
                'profesor_educacion'              =>$this->request->getPost('profesor_educacion'),
                'profesor_descripcion'            =>$this->request->getPost('profesor_descripcion'),
                'profesor_email'                  =>$this->request->getPost('profesor_email'),
                'profesor_pagina'                 =>$this->request->getPost('profesor_pagina'),
                'profesor_facebook'               =>$this->request->getPost('profesor_facebook'),
                'profesor_twitter'                =>$this->request->getPost('profesor_twitter'),
                'profesor_instagram'              =>$this->request->getPost('profesor_instagram'),
                'profesor_youtube'                =>$this->request->getPost('profesor_youtube'),
                'profesor_linkedin'               =>$this->request->getPost('profesor_linkedin'),
                'profesor_foto'                   =>'writable/uploads/images/profesores/'.$fotoname,
                'profesor_usuario_id'             =>$session->get('usuario_id'),
                'update_at'                       =>TIMESTAMP

            ]);
            // Llamado a la funcion de Otrod para subir foto en ruta del servidor
            $foto = new Otros();
            if(!empty($fotoname)){
                $foto->cargarFoto($profesor_foto,$fotoname,7);
            }
            $auditoria = [
                'auditoria_usuario_id'    =>$session->get('usuario_id'),
                'auditoria_tipo'          =>4,
                'auditoria_accion'        =>"profesor_nombres: ".$this->request->getPost('profesor_nombres').
                                            ", profesor_apellidos: ".$this->request->getPost('profesor_apellidos').
                                            ", profesor_titulo: ".$this->request->getPost('profesor_titulo').
                                            ", profesor_puestoactual: ".$this->request->getPost('profesor_puestoactual').
                                            ", profesor_educacion: ".$this->request->getPost('profesor_educacion').
                                            ", profesor_descripcion: ".$this->request->getPost('profesor_descripcion').
                                            ", profesor_email: ".$this->request->getPost('profesor_email').
                                            ", profesor_pagina: ".$this->request->getPost('profesor_pagina').
                                            ", profesor_facebook: ".$this->request->getPost('profesor_facebook').
                                            ", profesor_twitter: ".$this->request->getPost('profesor_twitter').
                                            ", profesor_instagram: ".$this->request->getPost('profesor_instagram').
                                            ", profesor_youtube: ".$this->request->getPost('profesor_youtube').
                                            ", profesor_linkedin: ".$this->request->getPost('profesor_linkedin').
                                            ", profesor_foto: writable/uploads/images/profesores/".$fotoname,
                'create_at'               =>TIMESTAMP
            ];

       }else{
         // sin foto
         $datos=([
           'profesor_nombres'                =>$this->request->getPost('profesor_nombres'),
           'profesor_apellidos'              =>$this->request->getPost('profesor_apellidos'),
           'profesor_titulo'                 =>$this->request->getPost('profesor_titulo'),
           'profesor_puestoactual'           =>$this->request->getPost('profesor_puestoactual'),
           'profesor_educacion'              =>$this->request->getPost('profesor_educacion'),
           'profesor_descripcion'            =>$this->request->getPost('profesor_descripcion'),
           'profesor_email'                  =>$this->request->getPost('profesor_email'),
           'profesor_pagina'                 =>$this->request->getPost('profesor_pagina'),
           'profesor_facebook'               =>$this->request->getPost('profesor_facebook'),
           'profesor_twitter'                =>$this->request->getPost('profesor_twitter'),
           'profesor_instagram'              =>$this->request->getPost('profesor_instagram'),
           'profesor_youtube'                =>$this->request->getPost('profesor_youtube'),
           'profesor_linkedin'               =>$this->request->getPost('profesor_linkedin'),
           'profesor_usuario_id'             =>$session->get('usuario_id'),
           'update_at'                       =>TIMESTAMP

         ]);
         $auditoria = [
             'auditoria_usuario_id'    =>$session->get('usuario_id'),
             'auditoria_tipo'          =>4,
             'auditoria_accion'        =>"profesor_nombres: ".$this->request->getPost('profesor_nombres').
                                         ", profesor_apellidos: ".$this->request->getPost('profesor_apellidos').
                                         ", profesor_titulo: ".$this->request->getPost('profesor_titulo').
                                         ", profesor_puestoactual: ".$this->request->getPost('profesor_puestoactual').
                                         ", profesor_educacion: ".$this->request->getPost('profesor_educacion').
                                         ", profesor_descripcion: ".$this->request->getPost('profesor_descripcion').
                                         ", profesor_email: ".$this->request->getPost('profesor_email').
                                         ", profesor_pagina: ".$this->request->getPost('profesor_pagina').
                                         ", profesor_facebook: ".$this->request->getPost('profesor_facebook').
                                         ", profesor_twitter: ".$this->request->getPost('profesor_twitter').
                                         ", profesor_instagram: ".$this->request->getPost('profesor_instagram').
                                         ", profesor_youtube: ".$this->request->getPost('profesor_youtube').
                                         ", profesor_linkedin: ".$this->request->getPost('profesor_linkedin'),
             'create_at'               =>TIMESTAMP
         ];
       }
       $ProfesoresModel = new Profesores_model();
       $ProfesoresModel ->actualizarProfesor($datos,$profesor_id);
       $auditoriaModel = new Auditoria_model();
       $auditoriaModel->registro($auditoria);

       echo "ok";
     }
     else{
         echo "erros";
     }
   }

  // Función para desactivar un Evento
 public function profesoresdesactivar($profesor_id){
   $session=session();
    if($session->get('login')){
      // Validar que el profesor no tenga cursos relacionados
      $profesorescursos  = new ProfesoresCursos_model();
      $conteoactivos=$profesorescursos->contarProfesoresCursosActivos($profesor_id,1);
      $conteoinactivos=$profesorescursos->contarProfesoresCursosActivos($profesor_id,2);

      if ($conteoactivos>=1){
        $datos=([
          'estado' =>1
        ]);
          echo view('includes/admin/pagina/head');
          echo view('includes/admin/alertas/profesorescursos',$datos);
          echo view('includes/admin/pagina/scripts');
          echo view('includes/admin/pagina/footer');
      }else if($conteoinactivos>=1){
        $datos=([
          'estado' =>2
        ]);

          echo view('includes/admin/pagina/head');
          echo view('includes/admin/alertas/profesorescursos',$datos);
          echo view('includes/admin/pagina/scripts');
          echo view('includes/admin/pagina/footer');
      }else{

          // Array de datos para la BD
          $datos=([
              'profesor_estado_id'      =>'2',
              'profesor_usuario_id'     =>$session->get('usuario_id'),
              'update_at'             =>TIMESTAMP
          ]);

          $ProfesoresModel = new Profesores_model();
          $ProfesoresModel ->actualizarProfesor($datos,$profesor_id);
          $auditoria = [
              'auditoria_usuario_id'    =>$session->get('usuario_id'),
              'auditoria_tipo'          =>5,
              'auditoria_accion'        =>"profesor_id: ".$profesor_id,
              'create_at'               =>TIMESTAMP
          ];
          $auditoriaModel = new Auditoria_model();
          $auditoriaModel->registro($auditoria);

          echo view('includes/admin/pagina/head');
          echo view('includes/admin/alertas/profesoresdesactivar');
          echo view('includes/admin/pagina/scripts');
          echo view('includes/admin/pagina/footer');
        }

    }else{
      echo view('includes/admin/pagina/head');
      echo view("includes/admin/login");
      echo view('includes/admin/pagina/scripts');
      echo view('includes/admin/pagina/footer');
    }
  }

    // Función: Mostrar los profesores inactivos, con y sin filtros de fechas
   public function profesoresinactivos(){
        $session=session();
        if($session->get('login')){

            echo view('includes/admin/pagina/head');
            $fechaini=$this->request->getPost('fechaini');
            $fechafin=$this->request->getPost('fechafin');

            if (($session->get('usuario_rol_id')==1)){
                echo view('includes/admin/menus/super_admin');
            }

            $ProfesoresModel = new profesores_model();

            $data['profesores'] = $ProfesoresModel->getProfesores(2);
            echo view('includes/admin/profesores/profesoresinactivos',$data);

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



      // Función para actiavr un evento
     public function profesoresactivar($profesor_id){
       $session=session();
        if($session->get('login')){

          // Array de datos para la BD
          $datos=([
            'profesor_estado_id'      =>'1',
            'profesor_usuario_id'     =>$session->get('usuario_id'),
            'update_at'             =>TIMESTAMP
          ]);

          $ProfesoresModel = new Profesores_model();
          $ProfesoresModel ->actualizarProfesor($datos,$profesor_id);
          $auditoria = [
              'auditoria_usuario_id'    =>$session->get('usuario_id'),
              'auditoria_tipo'          =>6,
              'auditoria_accion'        =>"profesor_id: ".$profesor_id,
              'create_at'               =>TIMESTAMP
          ];
          $auditoriaModel = new Auditoria_model();
          $auditoriaModel->registro($auditoria);

          echo view('includes/admin/pagina/head');
          echo view('includes/admin/alertas/profesoresactivar');
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
