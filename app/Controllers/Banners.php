<?php

namespace App\Controllers;
use App\Models\Usuarios_model;
use App\Models\Banner_model;
use App\Models\Otros_model;
use App\Models\Auditoria_model;

class Banners extends BaseController{

    // Función: Mostrar los banner activos, con y sin filtros de fechas
   public function bannersactivos(){
        $session=session();
        if($session->get('login')){
            echo view('includes/admin/pagina/head');
            $fechaini=$this->request->getPost('fechaini');
            $fechafin=$this->request->getPost('fechafin');
            if (($session->get('usuario_rol_id')==1)){
                echo view('includes/admin/menus/super_admin');
            }
            $bannerModel = new Banner_model();
            if($fechaini && $fechafin){
                $data['banners'] = $bannerModel->getBanersFechas($fechaini,$fechafin,1);
                $data['fechaini'] = $fechaini;
                $data['fechafin'] = $fechafin;
                echo view('includes/admin/banners/bannersactivos',$data);
            }else{
                $data['banners'] = $bannerModel->getBaners(1);
                echo view('includes/admin/banners/bannersactivos',$data);
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
   public function bannersinactivos(){
        $session=session();
        if($session->get('login')){
            echo view('includes/admin/pagina/head');
            $fechaini=$this->request->getPost('fechaini');
            $fechafin=$this->request->getPost('fechafin');
            if (($session->get('usuario_rol_id')==1)){
                echo view('includes/admin/menus/super_admin');
            }
            $bannerModel = new Banner_model();
            if($fechaini && $fechafin){
                $data['banners'] = $bannerModel->getBanersFechas($fechaini,$fechafin,2);
                $data['fechaini'] = $fechaini;
                $data['fechafin'] = $fechafin;
                echo view('includes/admin/banners/bannersinactivos',$data);
            }else{
                $data['banners'] = $bannerModel->getBaners(2);
                echo view('includes/admin/banners/bannersinactivos',$data);
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
    // Función para crear un banner nuevo
   public function bannerscrear(){
    $session=session();
    if($session->get('login')){
        // Obtener la data del banner
        $banner_path = $this->request->getFile("banner_path");
        if($_FILES["banner_path"]["error"] == 0){
            // genrar nombre random para el banner
            $bannername = $banner_path->getRandomName();
            // Array de datos que se agregaran en la BD
            $datos=([
                'banner_nombre'             =>$this->request->getPost('banner_nombre'),
                'banner_ipublicacion'       =>$this->request->getPost('banner_ipublicacion'),
                'banner_fpublicacion'       =>$this->request->getPost('banner_fpublicacion'),
                'banner_path'               =>'writable/uploads/images/banners/'.$bannername,
                'banner_descripcion'        =>$this->request->getPost('banner_descripcion'),
                'banner_usuario_id'         =>$session->get('usuario_id'),
                'banner_contenido_id'       =>$this->request->getPost('banner_contenido_id'),
                'create_at'                 =>TIMESTAMP

            ]);
            // Llamado a la funcion de Otrod para subir foto en ruta del servidor
            $foto = new Otros();
            if(!empty($bannername)){
                $foto->cargarFoto($banner_path,$bannername,2);
            }

            $bannerModel = new Banner_model();
            $bannerModel ->setBanner($datos);
            $auditoria = [
                'auditoria_usuario_id'    =>$session->get('usuario_id'),
                'auditoria_tipo'          =>3,
                'auditoria_accion'        =>"banner_nombre: ".$this->request->getPost('banner_nombre').
                                            ", banner_ipublicacion: ".$this->request->getPost('banner_ipublicacion').
                                            ", banner_fpublicacion: ".$this->request->getPost('banner_fpublicacion').
                                            ", banner_path: writable/uploads/images/banners/".$bannername.
                                            ", banner_descripcion: ".$this->request->getPost('banner_descripcion').
                                            ", banner_contenido_id: ".$this->request->getPost('banner_contenido_id'),
                'create_at'               =>TIMESTAMP
            ];
            $auditoriaModel = new Auditoria_model();
            $auditoriaModel->registro($auditoria);

            echo "ok";
        }else{
            echo "error";
        }

    }else{
        echo view('includes/admin/pagina/head');
        echo view("includes/admin/login");
        echo view('includes/admin/pagina/scripts');
        echo view('includes/admin/pagina/footer');
    }
  }
  // Función para desactivar un banner
 public function bannersdesactivar($banner_id){
   $session=session();
    if($session->get('login')){
      // Array de datos para la BD
      $datos=([
          'banner_estado_id'      =>'2',
          'banner_usuario_id'     =>$session->get('usuario_id'),
          'update_at'             =>TIMESTAMP
      ]);

      $bannerModel = new Banner_model();
      $bannerModel ->actualizarBanner($datos,$banner_id);
      $auditoria = [
          'auditoria_usuario_id'    =>$session->get('usuario_id'),
          'auditoria_tipo'          =>6,
          'auditoria_accion'        =>"banner_id: ".$banner_id,
          'create_at'               =>TIMESTAMP
      ];
      $auditoriaModel = new Auditoria_model();
      $auditoriaModel->registro($auditoria);

      echo view('includes/admin/pagina/head');
      echo view('includes/admin/alertas/bannerdesactivar');
      echo view('includes/admin/pagina/scripts');
      echo view('includes/admin/pagina/footer');

    }else{
      echo view('includes/admin/pagina/head');
      echo view("includes/admin/login");
      echo view('includes/admin/pagina/scripts');
      echo view('includes/admin/pagina/footer');
    }
  }
  // Función para desactivar un banner
 public function bannersactivar($banner_id){
   $session=session();
    if($session->get('login')){
      // Array de datos para la BD
      $datos=([
          'banner_estado_id'      =>'1',
          'banner_usuario_id'     =>$session->get('usuario_id'),
          'update_at'             =>TIMESTAMP
      ]);

      $bannerModel = new Banner_model();
      $bannerModel ->actualizarBanner($datos,$banner_id);
      $auditoria = [
          'auditoria_usuario_id'    =>$session->get('usuario_id'),
          'auditoria_tipo'          =>5,
          'auditoria_accion'        =>"banner_id: ".$banner_id,
          'create_at'               =>TIMESTAMP
      ];
      $auditoriaModel = new Auditoria_model();
      $auditoriaModel->registro($auditoria);

      echo view('includes/admin/pagina/head');
      echo view('includes/admin/alertas/bannersactivar');
      echo view('includes/admin/pagina/scripts');
      echo view('includes/admin/pagina/footer');

    }else{
      echo view('includes/admin/pagina/head');
      echo view("includes/admin/login");
      echo view('includes/admin/pagina/scripts');
      echo view('includes/admin/pagina/footer');
    }
  }
  // Función: Mostrar para modificar Banner
 public function bannersmodificar($banner_id){
      $session=session();
      if($session->get('login')){

          echo view('includes/admin/pagina/head');

          if (($session->get('usuario_rol_id')==1)){
              echo view('includes/admin/menus/super_admin');
          }

          $bannerModel = new Banner_model();
          $datos['Baner'] = $bannerModel ->getBanersId($banner_id);
          $datos['banner_id'] = $banner_id;

          echo view('includes/admin/banners/bannersmodificar',$datos);
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
// Función: Actualizar la data del baner
 public function bannersactualizar(){
   $session=session();
   if($session->get('login')){

      // Obtener la data del banner
      $banner_path = $this->request->getFile("banner_path");
      $banner_id = $this->request->getPost('banner_id');

      if($_FILES["banner_path"]["error"] == 0){
          // genrar nombre random para el banner
          $bannername = $banner_path->getRandomName();

          // Array de datos que se agregaran en la BD
          $datos=([
             'banner_nombre'             =>$this->request->getPost('banner_nombre'),
             'banner_ipublicacion'       =>$this->request->getPost('banner_ipublicacion'),
             'banner_fpublicacion'       =>$this->request->getPost('banner_fpublicacion'),
             'banner_path'               =>'writable/uploads/images/banners/'.$bannername,
             'banner_descripcion'        =>$this->request->getPost('banner_descripcion'),
             'banner_usuario_id'         =>$session->get('usuario_id'),
             'banner_contenido_id'       =>$this->request->getPost('banner_contenido_id'),
             'update_at'                 =>TIMESTAMP

         ]);
         // Llamado a la funcion de Otrod para subir foto en ruta del servidor
            $foto = new Otros();
            if(!empty($bannername)){
                $foto->cargarFoto($banner_path,$bannername,2);
            }
            $auditoria = [
              'auditoria_usuario_id'    =>$session->get('usuario_id'),
              'auditoria_tipo'          =>4,
              'auditoria_accion'        =>"banner_nombre: ".$this->request->getPost('banner_nombre').
                                          ", banner_ipublicacion: ".$this->request->getPost('banner_ipublicacion').
                                          ", banner_fpublicacion: ".$this->request->getPost('banner_fpublicacion').
                                          ", banner_path: writable/uploads/images/banners/".$bannername.
                                          ", banner_descripcion: ".$this->request->getPost('banner_descripcion').
                                          ", banner_contenido_id: ".$this->request->getPost('banner_contenido_id'),
              'create_at'               =>TIMESTAMP
            ];

     }else{
       // sin foto
       // Array de datos que se actualizarán en la BD (sin foto)
       $datos=([
           'banner_nombre'             =>$this->request->getPost('banner_nombre'),
           'banner_ipublicacion'       =>$this->request->getPost('banner_ipublicacion'),
           'banner_fpublicacion'       =>$this->request->getPost('banner_fpublicacion'),
           'banner_descripcion'        =>$this->request->getPost('banner_descripcion'),
           'banner_usuario_id'         =>$session->get('usuario_id'),
           'banner_contenido_id'       =>$this->request->getPost('banner_contenido_id'),
           'update_at'                 =>TIMESTAMP
       ]);
       $auditoria = [
           'auditoria_usuario_id'    =>$session->get('usuario_id'),
           'auditoria_tipo'          =>4,
           'auditoria_accion'        =>"banner_nombre: ".$this->request->getPost('banner_nombre').
                                       ", banner_ipublicacion: ".$this->request->getPost('banner_ipublicacion').
                                       ", banner_fpublicacion: ".$this->request->getPost('banner_fpublicacion').
                                       ", banner_descripcion: ".$this->request->getPost('banner_descripcion').
                                       ", banner_contenido_id: ".$this->request->getPost('banner_contenido_id'),
           'create_at'               =>TIMESTAMP
       ];
     }
       $bannerModel = new Banner_model();
       $bannerModel ->actualizarBanner($datos,$banner_id);
       $auditoriaModel = new Auditoria_model();
       $auditoriaModel->registro($auditoria);

       echo "ok";
   }
   else{
       echo "erros";
   }
 }
 // Función: Mostrar para crear Banner
public function bannersnuevo(){
     $session=session();
     if($session->get('login')){

         echo view('includes/admin/pagina/head');

         if (($session->get('usuario_rol_id')==1)){
             echo view('includes/admin/menus/super_admin');
         }

         echo view('includes/admin/banners/bannersnuevo');
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
