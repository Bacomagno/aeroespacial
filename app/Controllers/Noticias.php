<?php

namespace App\Controllers;
use App\Models\Usuarios_model;
use App\Models\Noticias_model;
use App\Models\Otros_model;
use App\Models\Auditoria_model;

class Noticias extends BaseController{

    // Función: Mostrar las notivias activos, con y sin filtros de fechas
   public function noticiasactivas(){
        $session=session();
        if($session->get('login')){

            echo view('includes/admin/pagina/head');
            $fechaini=$this->request->getPost('fechaini');
            $fechafin=$this->request->getPost('fechafin');

            if (($session->get('usuario_rol_id')==1)){
                echo view('includes/admin/menus/super_admin');
            }

            $noticiasModel = new Noticias_model();

            if($fechaini && $fechafin){
                $data['noticias'] = $noticiasModel->getNoticiasFechas($fechaini,$fechafin,1);
                $data['fechaini'] = $fechaini;
                $data['fechafin'] = $fechafin;
                echo view('includes/admin/noticias/noticiasactivas',$data);
            }else{
                $data['noticias'] = $noticiasModel->getNoticias(1);
                echo view('includes/admin/noticias/noticiasactivas',$data);
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

    // Función: Mostrar los banner inactivos, con y sin filtros de fechas
   public function noticiasinactivas(){
        $session=session();
        if($session->get('login')){

            echo view('includes/admin/pagina/head');
            $fechaini=$this->request->getPost('fechaini');
            $fechafin=$this->request->getPost('fechafin');

            if (($session->get('usuario_rol_id')==1)){
                echo view('includes/admin/menus/super_admin');
            }

            $noticiasModel = new Noticias_model();

            if($fechaini && $fechafin){
                $data['noticias'] = $noticiasModel->getNoticiasFechas($fechaini,$fechafin,2);
                $data['fechaini'] = $fechaini;
                $data['fechafin'] = $fechafin;
                echo view('includes/admin/noticias/noticiasinactivas',$data);
            }else{
                $data['noticias'] = $noticiasModel->getNoticias(2);
                echo view('includes/admin/noticias/noticiasinactivas',$data);
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

    // Función para crear un Noticia nueva
   public function noticiascrear(){
    $session=session();
    if($session->get('login')){
        // Obtener la data del adjunto
        $noticia_adjunto = $this->request->getFile("noticia_adjunto");
        // Si trae el Adjunto
        if($_FILES["noticia_adjunto"]["error"] == 0){
            // genrar nombre random para el adjunto
            $noticianame = $noticia_adjunto->getRandomName();

            // Array de datos que se agregaran en la BD
            $datos=([
                'noticia_titulo'              =>$this->request->getPost('noticia_titulo'),
                'noticia_contenido'           =>$this->request->getPost('noticia_contenido'),
                'noticia_ipublicacion'        =>$this->request->getPost('noticia_ipublicacion'),
                'noticia_fpublicacion'        =>$this->request->getPost('noticia_fpublicacion'),
                'noticia_adjunto'             =>'writable/uploads/images/noticias/'.$noticianame,
                'noticia_video'               =>$this->request->getPost('noticia_video'),
                'noticia_usuario_id'           =>$session->get('usuario_id'),
                'noticia_contenido_id'         =>$this->request->getPost('noticia_contenido_id'),
                'create_at'                   =>TIMESTAMP

            ]);
            // Llamado a la funcion de Otrod para subir foto en ruta del servidor
            $foto = new Otros();
            if(!empty($noticianame)){
                $foto->cargarFoto($noticia_adjunto,$noticianame,5);
            }
            $auditoria = [
                'auditoria_usuario_id'    =>$session->get('usuario_id'),
                'auditoria_tipo'          =>3,
                'auditoria_accion'        =>"noticia_titulo: ".$this->request->getPost('noticia_titulo').
                                            ", noticia_contenido: ".$this->request->getPost('noticia_contenido').
                                            ", noticia_ipublicacion: ".$this->request->getPost('noticia_ipublicacion').
                                            ", noticia_fpublicacion: ".$this->request->getPost('noticia_fpublicacion').
                                            ", noticia_adjunto: writable/uploads/images/noticias/".$noticianame.
                                            ", noticia_video: ".$this->request->getPost('noticia_video').
                                            ", noticia_contenido_id: ".$this->request->getPost('noticia_contenido_id'),
                'create_at'               =>TIMESTAMP
            ];

            echo "ok";
        }else{
          $datos=([
              'noticia_titulo'              =>$this->request->getPost('noticia_titulo'),
              'noticia_contenido'           =>$this->request->getPost('noticia_contenido'),
              'noticia_ipublicacion'        =>$this->request->getPost('noticia_ipublicacion'),
              'noticia_fpublicacion'        =>$this->request->getPost('noticia_fpublicacion'),
              'noticia_video'               =>$this->request->getPost('noticia_video'),
              'noticia_usuario_id'           =>$session->get('usuario_id'),
              'noticia_contenido_id'         =>$this->request->getPost('noticia_contenido_id'),
              'create_at'                   =>TIMESTAMP

          ]);
          $auditoria = [
              'auditoria_usuario_id'    =>$session->get('usuario_id'),
              'auditoria_tipo'          =>3,
              'auditoria_accion'        =>"noticia_titulo: ".$this->request->getPost('noticia_titulo').
                                          ", noticia_contenido: ".$this->request->getPost('noticia_contenido').
                                          ", noticia_ipublicacion: ".$this->request->getPost('noticia_ipublicacion').
                                          ", noticia_fpublicacion: ".$this->request->getPost('noticia_fpublicacion').
                                          ", noticia_video: ".$this->request->getPost('noticia_video').
                                          ", noticia_contenido_id: ".$this->request->getPost('noticia_contenido_id'),
              'create_at'               =>TIMESTAMP
          ];
        }


                    $NoticiaModel = new Noticias_model();
                    $NoticiaModel ->setNoticia($datos);
                    $auditoriaModel = new Auditoria_model();
                    $auditoriaModel->registro($auditoria);

    }else{
        echo view('includes/admin/pagina/head');
        echo view("includes/admin/login");
        echo view('includes/admin/pagina/scripts');
        echo view('includes/admin/pagina/footer');
    }
  }


  // Función para desactivar una noticia
 public function noticiasdesactivar($noticia_id){
   $session=session();
    if($session->get('login')){
      // Array de datos para la BD
      $datos=([
          'noticia_estado_id'      =>'2',
          'noticia_usuario_id'     =>$session->get('usuario_id'),
          'update_at'             =>TIMESTAMP
      ]);

      $noticiaModel = new Noticias_model();
      $noticiaModel ->actualizarNoticia($datos,$noticia_id);
      $auditoria = [
          'auditoria_usuario_id'    =>$session->get('usuario_id'),
          'auditoria_tipo'          =>6,
          'auditoria_accion'        =>"noticia_id: ".$noticia_id,
          'create_at'               =>TIMESTAMP
      ];
      $auditoriaModel = new Auditoria_model();
      $auditoriaModel->registro($auditoria);

      echo view('includes/admin/pagina/head');
      echo view('includes/admin/alertas/noticiasdesactivar');
      echo view('includes/admin/pagina/scripts');
      echo view('includes/admin/pagina/footer');

    }else{
      echo view('includes/admin/pagina/head');
      echo view("includes/admin/login");
      echo view('includes/admin/pagina/scripts');
      echo view('includes/admin/pagina/footer');
    }
  }

  // Función para desactivar una noticia
 public function noticiasactivar($noticia_id){
   $session=session();
    if($session->get('login')){

      // Array de datos para la BD
      $datos=([
        'noticia_estado_id'      =>'1',
        'noticia_usuario_id'     =>$session->get('usuario_id'),
        'update_at'             =>TIMESTAMP
      ]);

      $noticiaModel = new Noticias_model();
      $noticiaModel ->actualizarNoticia($datos,$noticia_id);
      $auditoria = [
          'auditoria_usuario_id'    =>$session->get('usuario_id'),
          'auditoria_tipo'          =>5,
          'auditoria_accion'        =>"noticia_id: ".$noticia_id,
          'create_at'               =>TIMESTAMP
      ];
      $auditoriaModel = new Auditoria_model();
      $auditoriaModel->registro($auditoria);

      echo view('includes/admin/pagina/head');
      echo view('includes/admin/alertas/noticiasactivar');
      echo view('includes/admin/pagina/scripts');
      echo view('includes/admin/pagina/footer');

    }else{
      echo view('includes/admin/pagina/head');
      echo view("includes/admin/login");
      echo view('includes/admin/pagina/scripts');
      echo view('includes/admin/pagina/footer');
    }
  }

  // Función: Mostrar para modificar Noticia
 public function noticiasmodificar($noticia_id){
      $session=session();
      if($session->get('login')){

          echo view('includes/admin/pagina/head');

          if (($session->get('usuario_rol_id')==1)){
              echo view('includes/admin/menus/super_admin');
          }

          $noticiasModel = new Noticias_model();
          $datos['noticia'] = $noticiasModel ->getNoticiasId($noticia_id);
          $datos['noticia_id'] = $noticia_id;

          echo view('includes/admin/noticias/noticiasmodificar',$datos);
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

 public function noticiasactualizar(){
   $session=session();
   if($session->get('login')){

      // Obtener la data del adjunto
      $noticia_adjunto = $this->request->getFile("noticia_adjunto");
      $noticia_id = $this->request->getPost('noticia_id');
      // Si trae el Adjunto
      if($_FILES["noticia_adjunto"]["error"] == 0){
          // genrar nombre random para el adjunto
          $noticianame = $noticia_adjunto->getRandomName();

          // Array de datos que se agregaran en la BD
          $datos=([
              'noticia_titulo'              =>$this->request->getPost('noticia_titulo'),
              'noticia_contenido'           =>$this->request->getPost('noticia_contenido'),
              'noticia_ipublicacion'        =>$this->request->getPost('noticia_ipublicacion'),
              'noticia_fpublicacion'        =>$this->request->getPost('noticia_fpublicacion'),
              'noticia_adjunto'             =>'writable/uploads/images/noticias/'.$noticianame,
              'noticia_video'               =>$this->request->getPost('noticia_video'),
              'noticia_usuario_id'           =>$session->get('usuario_id'),
              'noticia_contenido_id'         =>$this->request->getPost('noticia_contenido_id'),
              'update_at'                   =>TIMESTAMP

          ]);
          // Llamado a la funcion de Otrod para subir foto en ruta del servidor
          $foto = new Otros();
          if(!empty($noticianame)){
              $foto->cargarFoto($noticia_adjunto,$noticianame,5);
          }
          $auditoria = [
              'auditoria_usuario_id'    =>$session->get('usuario_id'),
              'auditoria_tipo'          =>4,
              'auditoria_accion'        =>"noticia_titulo: ".$this->request->getPost('noticia_titulo').
                                          ", noticia_contenido: ".$this->request->getPost('noticia_contenido').
                                          ", noticia_ipublicacion: ".$this->request->getPost('noticia_ipublicacion').
                                          ", noticia_fpublicacion: ".$this->request->getPost('noticia_fpublicacion').
                                          ", noticia_adjunto: writable/uploads/images/noticias/".$noticianame.
                                          ", noticia_video: ".$this->request->getPost('noticia_video').
                                          ", noticia_contenido_id: ".$this->request->getPost('noticia_contenido_id'),
              'create_at'               =>TIMESTAMP
          ];
     }else{
       // sin foto
       $datos=([
           'noticia_titulo'              =>$this->request->getPost('noticia_titulo'),
           'noticia_contenido'           =>$this->request->getPost('noticia_contenido'),
           'noticia_ipublicacion'        =>$this->request->getPost('noticia_ipublicacion'),
           'noticia_fpublicacion'        =>$this->request->getPost('noticia_fpublicacion'),
           'noticia_video'               =>$this->request->getPost('noticia_video'),
           'noticia_usuario_id'           =>$session->get('usuario_id'),
           'noticia_contenido_id'         =>$this->request->getPost('noticia_contenido_id'),
           'update_at'                   =>TIMESTAMP

       ]);
       $auditoria = [
           'auditoria_usuario_id'    =>$session->get('usuario_id'),
           'auditoria_tipo'          =>4,
           'auditoria_accion'        =>"noticia_titulo: ".$this->request->getPost('noticia_titulo').
                                       ", noticia_contenido: ".$this->request->getPost('noticia_contenido').
                                       ", noticia_ipublicacion: ".$this->request->getPost('noticia_ipublicacion').
                                       ", noticia_fpublicacion: ".$this->request->getPost('noticia_fpublicacion').
                                       ", noticia_video: ".$this->request->getPost('noticia_video').
                                       ", noticia_contenido_id: ".$this->request->getPost('noticia_contenido_id'),
           'create_at'               =>TIMESTAMP
       ];
     }
     $NoticiaModel = new Noticias_model();
     $NoticiaModel ->actualizarNoticia($datos,$noticia_id);
     $auditoriaModel = new Auditoria_model();
     $auditoriaModel->registro($auditoria);

     echo "ok";
   }
   else{
       echo "erros";
   }
 }

}
