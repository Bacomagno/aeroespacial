<?php

namespace App\Controllers;
use App\Models\Usuarios_model;
use App\Models\Aliados_model;
use App\Models\Otros_model;
use App\Models\Auditoria_model;

class Aliados extends BaseController{

  // Función: Mostrar las aliados activos, con y sin filtros de fechas
   public function aliadosactivos(){
        $session=session();
        if($session->get('login')){

            echo view('includes/admin/pagina/head');

            if (($session->get('usuario_rol_id')==1)){
                echo view('includes/admin/menus/super_admin');
            }

            $aliadosModel = new Aliados_model();

            $data['aliados'] = $aliadosModel->getAliados(1);
            echo view('includes/admin/aliados/aliadosactivos',$data);

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
   public function aliadoscrear(){
     $session=session();
     if($session->get('login')){
         // Obtener la data del adjunto
         $aliado_foto = $this->request->getFile("aliado_foto");
         // Si trae el Adjunto
         if($_FILES["aliado_foto"]["error"] == 0){
             // genrar nombre random para el adjunto
             $fotoname = $aliado_foto->getRandomName();

             echo "<pre> Fotoname ".print_r($fotoname,1)."</pre>";

             // Array de datos que se agregaran en la BD
             $datos=([
                 'aliado_nombres'                =>$this->request->getPost('aliado_nombres'),
                 'aliado_apellidos'              =>$this->request->getPost('aliado_apellidos'),
                 'aliado_titulo'                 =>$this->request->getPost('aliado_titulo'),
                 'aliado_descripcion'            =>$this->request->getPost('aliado_descripcion'),
                 'aliado_email'                  =>$this->request->getPost('aliado_email'),
                 'aliado_pagina'                 =>$this->request->getPost('aliado_pagina'),
                 'aliado_facebook'               =>$this->request->getPost('aliado_facebook'),
                 'aliado_twitter'                =>$this->request->getPost('aliado_twitter'),
                 'aliado_instagram'              =>$this->request->getPost('aliado_instagram'),
                 'aliado_youtube'                =>$this->request->getPost('aliado_youtube'),
                 'aliado_linkedin'               =>$this->request->getPost('aliado_linkedin'),
                 'aliado_foto'                   =>'writable/uploads/images/aliados/'.$fotoname,
                 'aliado_usuario_id'             =>$session->get('usuario_id'),
                 'create_at'                     =>TIMESTAMP
             ]);
             $auditoria = [
                 'auditoria_usuario_id'    =>$session->get('usuario_id'),
                 'auditoria_tipo'          =>3,
                 'auditoria_accion'        =>"aliado_nombres: ".$this->request->getPost('aliado_nombres').
                                             ", aliado_apellidos: ".$this->request->getPost('aliado_apellidos').
                                             ", aliado_titulo: ".$this->request->getPost('aliado_titulo').
                                             ", aliado_descripcion: ".$this->request->getPost('aliado_descripcion').
                                             ", aliado_email: ".$this->request->getPost('aliado_email').
                                             ", aliado_pagina: ".$this->request->getPost('aliado_pagina').
                                             ", aliado_facebook: ".$this->request->getPost('aliado_facebook').
                                             ", aliado_twitter: ".$this->request->getPost('aliado_twitter').
                                             ", aliado_instagram: ".$this->request->getPost('aliado_instagram').
                                             ", aliado_youtube: ".$this->request->getPost('aliado_youtube').
                                             ", aliado_linkedin: ".$this->request->getPost('aliado_linkedin').
                                             ", aliado_foto: writable/uploads/images/aliados/".$aliado_foto,
                 'create_at'               =>TIMESTAMP
             ];

             // Llamado a la funcion de Otrod para subir foto en ruta del servidor
             $foto = new Otros();
             if(!empty($fotoname)){
                 $foto->cargarFoto($aliado_foto,$fotoname,8);
             }
             echo "ok";
             echo "<pre> datos".print_r($datos,1)."</pre>";
         }else{
           // Array de datos que se agregaran en la BD
           $datos=([
                 'aliado_nombres'                =>$this->request->getPost('aliado_nombres'),
                 'aliado_apellidos'              =>$this->request->getPost('aliado_apellidos'),
                 'aliado_titulo'                 =>$this->request->getPost('aliado_titulo'),
                 'aliado_descripcion'            =>$this->request->getPost('aliado_descripcion'),
                 'aliado_email'                  =>$this->request->getPost('aliado_email'),
                 'aliado_pagina'                 =>$this->request->getPost('aliado_pagina'),
                 'aliado_facebook'               =>$this->request->getPost('aliado_facebook'),
                 'aliado_twitter'                =>$this->request->getPost('aliado_twitter'),
                 'aliado_instagram'              =>$this->request->getPost('aliado_instagram'),
                 'aliado_youtube'                =>$this->request->getPost('aliado_youtube'),
                 'aliado_linkedin'               =>$this->request->getPost('aliado_linkedin'),
                 'aliado_usuario_id'             =>$session->get('usuario_id'),
                 'create_at'                     =>TIMESTAMP
           ]);
           $auditoria = [
               'auditoria_usuario_id'    =>$session->get('usuario_id'),
               'auditoria_tipo'          =>3,
               'auditoria_accion'        =>"aliado_nombres: ".$this->request->getPost('aliado_nombres').
                                             ", aliado_apellidos: ".$this->request->getPost('aliado_apellidos').
                                             ", aliado_titulo: ".$this->request->getPost('aliado_titulo').
                                             ", aliado_descripcion: ".$this->request->getPost('aliado_descripcion').
                                             ", aliado_email: ".$this->request->getPost('aliado_email').
                                             ", aliado_pagina: ".$this->request->getPost('aliado_pagina').
                                             ", aliado_facebook: ".$this->request->getPost('aliado_facebook').
                                             ", aliado_twitter: ".$this->request->getPost('aliado_twitter').
                                             ", aliado_instagram: ".$this->request->getPost('aliado_instagram').
                                             ", aliado_youtube: ".$this->request->getPost('aliado_youtube').
                                             ", aliado_linkedin: ".$this->request->getPost('aliado_linkedin').
                                             ", aliado_foto: writable/uploads/images/aliados/".$aliado_foto,
                 'create_at'               =>TIMESTAMP
           ];
           echo "<pre> datos".print_r($datos,1)."</pre>";
         }

                     $aliadosModel = new Aliados_model();
                     $aliadosModel ->setAliados($datos);
                     $auditoriaModel = new Auditoria_model();
                     $auditoriaModel->registro($auditoria);

     }else{
         echo view('includes/admin/pagina/head');
         echo view("includes/admin/login");
         echo view('includes/admin/pagina/scripts');
         echo view('includes/admin/pagina/footer');
     }
   }

 // Función: Mostrar para modificar un Aliado
   public function aliadosmodificar($aliado_id){
       $session=session();
       if($session->get('login')){

           echo view('includes/admin/pagina/head');

           if (($session->get('usuario_rol_id')==1)){
               echo view('includes/admin/menus/super_admin');
           }

           $aliadosModel = new aliados_model();
           $datos['aliado'] = $aliadosModel ->getAliadoId($aliado_id);
           $datos['aliado_id'] = $aliado_id;

           echo view('includes/admin/aliados/aliadosmodificar',$datos);
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
   public function aliadosactualizar(){
        $session=session();
        if($session->get('login')){

           // Obtener la data del adjunto
           $aliado_foto = $this->request->getFile("aliado_foto");
           $aliado_id = $this->request->getPost('aliado_id');

           if($_FILES["aliado_foto"]["error"] == 0){
               // genrar nombre random para el adjunto
               $fotoname = $aliado_foto->getRandomName();

               echo "<pre> Fotoname ".print_r($fotoname,1)."</pre>";

                // Array de datos que se agregaran en la BD
                $datos=([
                    'aliado_nombres'                =>$this->request->getPost('aliado_nombres'),
                    'aliado_apellidos'              =>$this->request->getPost('aliado_apellidos'),
                    'aliado_titulo'                 =>$this->request->getPost('aliado_titulo'),
                    'aliado_descripcion'            =>$this->request->getPost('aliado_descripcion'),
                    'aliado_email'                  =>$this->request->getPost('aliado_email'),
                    'aliado_pagina'                 =>$this->request->getPost('aliado_pagina'),
                    'aliado_facebook'               =>$this->request->getPost('aliado_facebook'),
                    'aliado_twitter'                =>$this->request->getPost('aliado_twitter'),
                    'aliado_instagram'              =>$this->request->getPost('aliado_instagram'),
                    'aliado_youtube'                =>$this->request->getPost('aliado_youtube'),
                    'aliado_linkedin'               =>$this->request->getPost('aliado_linkedin'),
                    'aliado_foto'                   =>'writable/uploads/images/aliados/'.$fotoname,
                    'aliado_usuario_id'             =>$session->get('usuario_id'),
                    'create_at'                     =>TIMESTAMP
                ]);
                $auditoria = [
                    'auditoria_usuario_id'    =>$session->get('usuario_id'),
                    'auditoria_tipo'          =>4,
                    'auditoria_accion'        =>"aliado_nombres: ".$this->request->getPost('aliado_nombres').
                                                ", aliado_apellidos: ".$this->request->getPost('aliado_apellidos').
                                                ", aliado_titulo: ".$this->request->getPost('aliado_titulo').
                                                ", aliado_descripcion: ".$this->request->getPost('aliado_descripcion').
                                                ", aliado_email: ".$this->request->getPost('aliado_email').
                                                ", aliado_pagina: ".$this->request->getPost('aliado_pagina').
                                                ", aliado_facebook: ".$this->request->getPost('aliado_facebook').
                                                ", aliado_twitter: ".$this->request->getPost('aliado_twitter').
                                                ", aliado_instagram: ".$this->request->getPost('aliado_instagram').
                                                ", aliado_youtube: ".$this->request->getPost('aliado_youtube').
                                                ", aliado_linkedin: ".$this->request->getPost('aliado_linkedin').
                                                ", aliado_foto: writable/uploads/images/aliados/".$aliado_foto,
                    'create_at'               =>TIMESTAMP
                ];

                // Llamado a la funcion de Otrod para subir foto en ruta del servidor
                $foto = new Otros();
                if(!empty($fotoname)){
                    $foto->cargarFoto($aliado_foto,$fotoname,8);
                }
                echo "ok";
                echo "<pre> datos".print_r($datos,1)."</pre>";

          }else{
            // Array de datos que se agregaran en la BD
              $datos=([
                    'aliado_nombres'                =>$this->request->getPost('aliado_nombres'),
                    'aliado_apellidos'              =>$this->request->getPost('aliado_apellidos'),
                    'aliado_titulo'                 =>$this->request->getPost('aliado_titulo'),
                    'aliado_descripcion'            =>$this->request->getPost('aliado_descripcion'),
                    'aliado_email'                  =>$this->request->getPost('aliado_email'),
                    'aliado_pagina'                 =>$this->request->getPost('aliado_pagina'),
                    'aliado_facebook'               =>$this->request->getPost('aliado_facebook'),
                    'aliado_twitter'                =>$this->request->getPost('aliado_twitter'),
                    'aliado_instagram'              =>$this->request->getPost('aliado_instagram'),
                    'aliado_youtube'                =>$this->request->getPost('aliado_youtube'),
                    'aliado_linkedin'               =>$this->request->getPost('aliado_linkedin'),
                    'aliado_usuario_id'             =>$session->get('usuario_id'),
                    'create_at'                     =>TIMESTAMP
              ]);
              $auditoria = [
                  'auditoria_usuario_id'    =>$session->get('usuario_id'),
                  'auditoria_tipo'          =>4,
                  'auditoria_accion'        =>"aliado_nombres: ".$this->request->getPost('aliado_nombres').
                                                ", aliado_apellidos: ".$this->request->getPost('aliado_apellidos').
                                                ", aliado_titulo: ".$this->request->getPost('aliado_titulo').
                                                ", aliado_descripcion: ".$this->request->getPost('aliado_descripcion').
                                                ", aliado_email: ".$this->request->getPost('aliado_email').
                                                ", aliado_pagina: ".$this->request->getPost('aliado_pagina').
                                                ", aliado_facebook: ".$this->request->getPost('aliado_facebook').
                                                ", aliado_twitter: ".$this->request->getPost('aliado_twitter').
                                                ", aliado_instagram: ".$this->request->getPost('aliado_instagram').
                                                ", aliado_youtube: ".$this->request->getPost('aliado_youtube').
                                                ", aliado_linkedin: ".$this->request->getPost('aliado_linkedin').
                                                ", aliado_foto: writable/uploads/images/aliados/".$aliado_foto,
                    'create_at'               =>TIMESTAMP
              ];
              echo "<pre> datos".print_r($datos,1)."</pre>";
          }
          $aliadosModel = new aliados_model();
          $aliadosModel ->actualizarAliado($datos,$aliado_id);
          $auditoriaModel = new Auditoria_model();
          $auditoriaModel->registro($auditoria);

        }
        else{
            echo "erros";
        }
      }

 // Función para actiavr un aliado
   public function aliadosdesactivar($aliado_id){
       $session=session();
        if($session->get('login')){

          // Array de datos para la BD
          $datos=([
            'aliado_estado_id'      =>'2',
            'aliado_usuario_id'     =>$session->get('usuario_id'),
            'update_at'             =>TIMESTAMP
          ]);

          $aliadosModel = new aliados_model();
          $aliadosModel ->actualizarAliado($datos,$aliado_id);
          $auditoria = [
              'auditoria_usuario_id'    =>$session->get('usuario_id'),
              'auditoria_tipo'          =>5,
              'auditoria_accion'        =>"aliado_id: ".$aliado_id,
              'create_at'               =>TIMESTAMP
          ];
          $auditoriaModel = new Auditoria_model();
          $auditoriaModel->registro($auditoria);

          echo view('includes/admin/pagina/head');
          echo view('includes/admin/alertas/aliadosdesactivar');
          echo view('includes/admin/pagina/scripts');
          echo view('includes/admin/pagina/footer');

        }else{
          echo view('includes/admin/pagina/head');
          echo view("includes/admin/login");
          echo view('includes/admin/pagina/scripts');
          echo view('includes/admin/pagina/footer');
        }
      }

  // Función: Mostrar los aliados inactivos, con y sin filtros de fechas
   public function aliadosinactivos(){
        $session=session();
        if($session->get('login')){

            echo view('includes/admin/pagina/head');

            if (($session->get('usuario_rol_id')==1)){
                echo view('includes/admin/menus/super_admin');
            }

            $aliadosModel = new aliados_model();

            $data['aliados'] = $aliadosModel->getaliados(2);
            echo view('includes/admin/aliados/aliadosinactivos',$data);

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

  // Función para actiavr un aliado
    public function aliadosactivar($aliado_id){
        $session=session();
         if($session->get('login')){

           // Array de datos para la BD
           $datos=([
             'aliado_estado_id'      =>'1',
             'aliado_usuario_id'     =>$session->get('usuario_id'),
             'update_at'             =>TIMESTAMP
           ]);

           $aliadosModel = new aliados_model();
           $aliadosModel ->actualizarAliado($datos,$aliado_id);
           $auditoria = [
               'auditoria_usuario_id'    =>$session->get('usuario_id'),
               'auditoria_tipo'          =>5,
               'auditoria_accion'        =>"aliado_id: ".$aliado_id,
               'create_at'               =>TIMESTAMP
           ];
           $auditoriaModel = new Auditoria_model();
           $auditoriaModel->registro($auditoria);

           echo view('includes/admin/pagina/head');
           echo view('includes/admin/alertas/aliadosactivar');
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
