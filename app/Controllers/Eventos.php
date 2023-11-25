<?php

namespace App\Controllers;
use App\Models\Usuarios_model;
use App\Models\Eventos_model;
use App\Models\Otros_model;
use App\Models\Auditoria_model;

class Eventos extends BaseController{

  // Función: Mostrar las eventos activos, con y sin filtros de fechas
   public function eventosactivos(){
        $session=session();
        if($session->get('login')){

            echo view('includes/admin/pagina/head');
            $fechaini=$this->request->getPost('fechaini');
            $fechafin=$this->request->getPost('fechafin');

            if (($session->get('usuario_rol_id')==1)){
                echo view('includes/admin/menus/super_admin');
            }

            $eventosModel = new Eventos_model();

            if($fechaini && $fechafin){
                $data['eventos'] = $eventosModel->getEventosFechas($fechaini,$fechafin,1);
                $data['fechaini'] = $fechaini;
                $data['fechafin'] = $fechafin;
                echo view('includes/admin/eventos/eventosactivos',$data);
            }else{
                $data['eventos'] = $eventosModel->geteventos(1);
                echo view('includes/admin/eventos/eventosactivos',$data);
            }

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
   public function eventoscrear(){
    $session=session();
    if($session->get('login')){
        // Obtener la data del adjunto
        $evento_adjunto = $this->request->getFile("evento_adjunto");
        // Si trae el Adjunto
        if($_FILES["evento_adjunto"]["error"] == 0){
            // genrar nombre random para el adjunto
            $eventoname = $evento_adjunto->getRandomName();

            // Array de datos que se agregaran en la BD
            $datos=([
                'evento_nombre'               =>$this->request->getPost('evento_nombre'),
                'evento_descripcion'          =>$this->request->getPost('evento_descripcion'),
                'evento_link'                 =>$this->request->getPost('evento_link'),
                'evento_finicio'              =>$this->request->getPost('evento_finicio'),
                'evento_hinicio'              =>$this->request->getPost('evento_hinicio'),
                'evento_fin'                  =>$this->request->getPost('evento_fin'),
                'evento_hfin'                 =>$this->request->getPost('evento_hfin'),
                'evento_encargado'            =>$this->request->getPost('evento_encargado'),
                'evento_adjunto'             =>'writable/uploads/images/eventos/'.$eventoname,
                'evento_video'               =>$this->request->getPost('evento_video'),
                'evento_usuario_id'          =>$session->get('usuario_id'),
                'evento_contenido_id'         =>'4',
                'create_at'                   =>TIMESTAMP

            ]);
            // Llamado a la funcion de Otrod para subir foto en ruta del servidor
            $foto = new Otros();
            if(!empty($eventoname)){
                $foto->cargarFoto($evento_adjunto,$eventoname,4);
            }
            $auditoria = [
                'auditoria_usuario_id'    =>$session->get('usuario_id'),
                'auditoria_tipo'          =>3,
                'auditoria_accion'        =>"evento_nombre: ".$this->request->getPost('evento_nombre').
                                            ", evento_descripcion: ".$this->request->getPost('evento_descripcion').
                                            ", evento_link: ".$this->request->getPost('evento_link').
                                            ", evento_finicio: ".$this->request->getPost('evento_finicio').
                                            ", evento_hinicio: ".$this->request->getPost('evento_hinicio').
                                            ", evento_fin: ".$this->request->getPost('evento_fin').
                                            ", evento_hfin: ".$this->request->getPost('evento_hfin').
                                            ", evento_encargado: ".$this->request->getPost('evento_encargado').
                                            ", evento_adjunto: writable/uploads/images/eventos/".$eventoname.
                                            ", evento_contenido_id: 4
                                            , evento_video: ".$this->request->getPost('evento_video'),
                'create_at'               =>TIMESTAMP
            ];

            echo "ok";
        }else{
          $datos=([
            'evento_nombre'               =>$this->request->getPost('evento_nombre'),
            'evento_descripcion'          =>$this->request->getPost('evento_descripcion'),
            'evento_link'                 =>$this->request->getPost('evento_link'),
            'evento_finicio'              =>$this->request->getPost('evento_finicio'),
            'evento_hinicio'              =>$this->request->getPost('evento_hinicio'),
            'evento_fin'                  =>$this->request->getPost('evento_fin'),
            'evento_hfin'                 =>$this->request->getPost('evento_hfin'),
            'evento_encargado'            =>$this->request->getPost('evento_encargado'),
            'evento_video'               =>$this->request->getPost('evento_video'),
            'evento_usuario_id'          =>$session->get('usuario_id'),
            'evento_contenido_id'         =>'4',
            'create_at'                   =>TIMESTAMP

          ]);
          $auditoria = [
              'auditoria_usuario_id'    =>$session->get('usuario_id'),
              'auditoria_tipo'          =>3,
              'auditoria_accion'        =>"evento_nombre: ".$this->request->getPost('evento_nombre').
                                          ", evento_descripcion: ".$this->request->getPost('evento_descripcion').
                                          ", evento_link: ".$this->request->getPost('evento_link').
                                          ", evento_finicio: ".$this->request->getPost('evento_finicio').
                                          ", evento_hinicio: ".$this->request->getPost('evento_hinicio').
                                          ", evento_fin: ".$this->request->getPost('evento_fin').
                                          ", evento_hfin: ".$this->request->getPost('evento_hfin').
                                          ", evento_encargado: ".$this->request->getPost('evento_encargado').
                                          ", evento_contenido_id: 4
                                          , evento_video: ".$this->request->getPost('evento_video'),
              'create_at'               =>TIMESTAMP
          ];
        }


                    $eventosModel = new Eventos_model();
                    $eventosModel ->setEventos($datos);

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
 public function eventosmodificar($evento_id){
      $session=session();
      if($session->get('login')){

          echo view('includes/admin/pagina/head');

          if (($session->get('usuario_rol_id')==1)){
              echo view('includes/admin/menus/super_admin');
          }

          $eventosModel = new Eventos_model();
          $datos['evento'] = $eventosModel ->getEventoId($evento_id);
          $datos['evento_id'] = $evento_id;

          echo view('includes/admin/eventos/eventosmodificar',$datos);
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
   public function eventosactualizar(){
     $session=session();
     if($session->get('login')){

        // Obtener la data del adjunto
        $evento_adjunto = $this->request->getFile("evento_adjunto");
        $evento_id = $this->request->getPost('evento_id');
        // Si trae el Adjunto
        if($_FILES["evento_adjunto"]["error"] == 0){
            // genrar nombre random para el adjunto
            $eventoname = $evento_adjunto->getRandomName();

            // Array de datos que se agregaran en la BD
            $datos=([
              'evento_nombre'               =>$this->request->getPost('evento_nombre'),
              'evento_descripcion'          =>$this->request->getPost('evento_descripcion'),
              'evento_link'                 =>$this->request->getPost('evento_link'),
              'evento_finicio'              =>$this->request->getPost('evento_finicio'),
              'evento_hinicio'              =>$this->request->getPost('evento_hinicio'),
              'evento_fin'                  =>$this->request->getPost('evento_fin'),
              'evento_hfin'                 =>$this->request->getPost('evento_hfin'),
              'evento_encargado'            =>$this->request->getPost('evento_encargado'),
              'evento_adjunto'             =>'writable/uploads/images/eventos/'.$eventoname,
              'evento_video'               =>$this->request->getPost('evento_video'),
              'evento_usuario_id'          =>$session->get('usuario_id'),
              'evento_contenido_id'         =>'4',
                'update_at'                   =>TIMESTAMP

            ]);
            $auditoria = [
                'auditoria_usuario_id'    =>$session->get('usuario_id'),
                'auditoria_tipo'          =>4,
                'auditoria_accion'        =>"evento_nombre: ".$this->request->getPost('evento_nombre').
                                            ", evento_descripcion: ".$this->request->getPost('evento_descripcion').
                                            ", evento_link: ".$this->request->getPost('evento_link').
                                            ", evento_finicio: ".$this->request->getPost('evento_finicio').
                                            ", evento_hinicio: ".$this->request->getPost('evento_hinicio').
                                            ", evento_fin: ".$this->request->getPost('evento_fin').
                                            ", evento_hfin: ".$this->request->getPost('evento_hfin').
                                            ", evento_encargado: ".$this->request->getPost('evento_encargado').
                                            ", evento_adjunto: writable/uploads/images/eventos/".$eventoname.
                                            ", evento_contenido_id: 4
                                            , evento_video: ".$this->request->getPost('evento_video'),
                'create_at'               =>TIMESTAMP
            ];
            // Llamado a la funcion de Otrod para subir foto en ruta del servidor
            $foto = new Otros();
            if(!empty($eventoname)){
                $foto->cargarFoto($evento_adjunto,$eventoname,4);
            }


       }else{
         // sin foto
         $datos=([
           'evento_nombre'               =>$this->request->getPost('evento_nombre'),
           'evento_descripcion'          =>$this->request->getPost('evento_descripcion'),
           'evento_link'                 =>$this->request->getPost('evento_link'),
           'evento_finicio'              =>$this->request->getPost('evento_finicio'),
           'evento_hinicio'              =>$this->request->getPost('evento_hinicio'),
           'evento_fin'                  =>$this->request->getPost('evento_fin'),
           'evento_hfin'                 =>$this->request->getPost('evento_hfin'),
           'evento_encargado'            =>$this->request->getPost('evento_encargado'),
           'evento_video'               =>$this->request->getPost('evento_video'),
           'evento_usuario_id'          =>$session->get('usuario_id'),
           'evento_contenido_id'         =>'4',
            'update_at'                   =>TIMESTAMP

         ]);
         $auditoria = [
             'auditoria_usuario_id'    =>$session->get('usuario_id'),
             'auditoria_tipo'          =>4,
             'auditoria_accion'        =>"evento_nombre: ".$this->request->getPost('evento_nombre').
                                         ", evento_descripcion: ".$this->request->getPost('evento_descripcion').
                                         ", evento_link: ".$this->request->getPost('evento_link').
                                         ", evento_finicio: ".$this->request->getPost('evento_finicio').
                                         ", evento_hinicio: ".$this->request->getPost('evento_hinicio').
                                         ", evento_fin: ".$this->request->getPost('evento_fin').
                                         ", evento_hfin: ".$this->request->getPost('evento_hfin').
                                         ", evento_encargado: ".$this->request->getPost('evento_encargado').
                                         ", evento_contenido_id: 4
                                         , evento_video: ".$this->request->getPost('evento_video'),
             'create_at'               =>TIMESTAMP
         ];
       }
       $eventosModel = new Eventos_model();
       $eventosModel ->actualizarEvento($datos,$evento_id);
       $auditoriaModel = new Auditoria_model();
       $auditoriaModel->registro($auditoria);

       echo "ok";
     }
     else{
         echo "erros";
     }
   }

  // Función para desactivar un Evento
 public function eventosdesactivar($evento_id){
   $session=session();
    if($session->get('login')){
      // Array de datos para la BD
      $datos=([
          'evento_estado_id'      =>'2',
          'evento_usuario_id'     =>$session->get('usuario_id'),
          'update_at'             =>TIMESTAMP
      ]);

      $eventosModel = new Eventos_model();
      $eventosModel ->actualizarEvento($datos,$evento_id);
      $auditoria = [
          'auditoria_usuario_id'    =>$session->get('usuario_id'),
          'auditoria_tipo'          =>6,
          'auditoria_accion'        =>"evento_id: ".$evento_id,
          'create_at'               =>TIMESTAMP
      ];
      $auditoriaModel = new Auditoria_model();
      $auditoriaModel->registro($auditoria);

      echo view('includes/admin/pagina/head');
      echo view('includes/admin/alertas/eventosdesactivar');
      echo view('includes/admin/pagina/scripts');
      echo view('includes/admin/pagina/footer');

    }else{
      echo view('includes/admin/pagina/head');
      echo view("includes/admin/login");
      echo view('includes/admin/pagina/scripts');
      echo view('includes/admin/pagina/footer');
    }
  }

    // Función: Mostrar los eventos inactivos, con y sin filtros de fechas
   public function eventosinactivos(){
        $session=session();
        if($session->get('login')){

            echo view('includes/admin/pagina/head');
            $fechaini=$this->request->getPost('fechaini');
            $fechafin=$this->request->getPost('fechafin');

            if (($session->get('usuario_rol_id')==1)){
                echo view('includes/admin/menus/super_admin');
            }

            $eventosModel = new Eventos_model();

            if($fechaini && $fechafin){
                $data['eventos'] = $eventosModel->getEventosFechas($fechaini,$fechafin,2);
                $data['fechaini'] = $fechaini;
                $data['fechafin'] = $fechafin;
                echo view('includes/admin/eventos/eventosinactivos',$data);
            }else{
                $data['eventos'] = $eventosModel->getEventos(2);
                echo view('includes/admin/eventos/eventosinactivos',$data);
            }

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
     public function eventosactivar($evento_id){
       $session=session();
        if($session->get('login')){

          // Array de datos para la BD
          $datos=([
            'evento_estado_id'      =>'1',
            'evento_usuario_id'     =>$session->get('usuario_id'),
            'update_at'             =>TIMESTAMP
          ]);

          $eventosModel = new Eventos_model();
          $eventosModel ->actualizarEvento($datos,$evento_id);
          $auditoria = [
              'auditoria_usuario_id'    =>$session->get('usuario_id'),
              'auditoria_tipo'          =>5,
              'auditoria_accion'        =>"evento_id: ".$evento_id,
              'create_at'               =>TIMESTAMP
          ];
          $auditoriaModel = new Auditoria_model();
          $auditoriaModel->registro($auditoria);

          echo view('includes/admin/pagina/head');
          echo view('includes/admin/alertas/eventosactivar');
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
