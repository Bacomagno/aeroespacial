<?php

namespace App\Controllers;
use App\Models\Usuarios_model;
use App\Models\Roles_model;
use App\Models\Otros_model;
use App\Models\Auditoria_model;

class Usuarios extends BaseController{

  // Función: Mostrar los usuarios activos, con y sin filtros de fechas
public function usuariosactivos(){
    $session=session();
    if($session->get('login')){

        echo view('includes/admin/pagina/head');
        $fechaini=$this->request->getPost('fechaini');
        $fechafin=$this->request->getPost('fechafin');

        if (($session->get('usuario_rol_id')==1)){
            echo view('includes/admin/menus/super_admin');
        }

        $usuariosModel = new Usuarios_model();
        $rolesModel = new Roles_model();

        if($fechaini && $fechafin){
            $data['usuarios'] = $usuariosModel->getUsuariosFechas($fechaini,$fechafin,1);
            $data['fechaini'] = $fechaini;
            $data['fechafin'] = $fechafin;
        }else{
            $data['usuarios'] = $usuariosModel->getUsuarios(1);
        }

        $data['roles'] = $rolesModel->getRoles(1);
        echo view('includes/admin/usuarios/usuariosactivos',$data);
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
   public function usuarioscrear(){
    $session=session();
    if($session->get('login')){
        // Obtener la data de la foto
        $usuario_foto = $this->request->getFile("usuario_foto");
        // Crear Contraseña
        $usuario_contrasena = $this->request->getPost('usuario_contrasena');

        // POST con foto
        if($_FILES["usuario_foto"]["error"] == 0){
            // genrar nombre random para la foto del usuario
            $usuarioname = $usuario_foto->getRandomName();

            // Array de datos que se agregaran en la BD
            $datos=([
                'usuario_nombre'            =>$this->request->getPost('usuario_nombre'),
                'usuario_apellidos'         =>$this->request->getPost('usuario_apellidos'),
                'usuario_usuario'           =>$this->request->getPost('usuario_usuario'),
                'usuario_correo'            =>$this->request->getPost('usuario_correo'),
                'usuario_contrasena'        =>md5($usuario_contrasena),
                'usuario_foto'              =>'writable/uploads/images/perfil/'.$usuarioname,
                'usuario_estado_id'         =>1,
                'usuario_rol_id'            =>$this->request->getPost('usuario_rol_id'),
                'usuario_ciudad'            =>$this->request->getPost('usuario_ciudad'),
                'usuario_telefono'          =>$this->request->getPost('usuario_telefono'),
                'usuario_usuarios_id'       =>$session->get('usuario_id'),
                'create_at'                 =>TIMESTAMP
            ]);

            $foto = new Otros();
            if(!empty($usuarioname)){
                $foto->cargarFoto($usuario_foto,$usuarioname,1);
            }
            $auditoria = [
              'auditoria_usuario_id'    =>$session->get('usuario_id'),
              'auditoria_tipo'          =>3,
              'auditoria_accion'        =>"usuario_nombre: ".$this->request->getPost('usuario_nombre').
                                          ", usuario_apellidos: ".$this->request->getPost('usuario_apellidos').
                                          ", usuario_usuario: ".$this->request->getPost('usuario_usuario').
                                          ", usuario_correo: ".$this->request->getPost('usuario_correo').
                                          ", usuario_contrasena sin encripciín: ".$usuario_contrasena.
                                          ", usuario_contrasena: ".md5($usuario_contrasena).
                                          ", usuario_rol_id: ".$this->request->getPost('usuario_rol_id').
                                          ", usuario_foto: writable/uploads/images/perfil/".$usuarioname.
                                          ", usuario_ciudad: ".$this->request->getPost('usuario_ciudad').
                                          ", usuario_telefono: ".$this->request->getPost('usuario_telefono'),
              'create_at'               =>TIMESTAMP
            ];
            echo "ok con foto";
        }else{
          $datos=([
              'usuario_nombre'            =>$this->request->getPost('usuario_nombre'),
              'usuario_apellidos'         =>$this->request->getPost('usuario_apellidos'),
              'usuario_usuario'           =>$this->request->getPost('usuario_usuario'),
              'usuario_correo'            =>$this->request->getPost('usuario_correo'),
              'usuario_contrasena'        =>md5($usuario_contrasena),
              'usuario_estado_id'         =>1,
              'usuario_rol_id'            =>$this->request->getPost('usuario_rol_id'),
              'usuario_ciudad'            =>$this->request->getPost('usuario_ciudad'),
              'usuario_telefono'          =>$this->request->getPost('usuario_telefono'),
              'usuario_usuarios_id'       =>$session->get('usuario_id'),
              'create_at'                 =>TIMESTAMP
          ]);
          $auditoria = [
            'auditoria_usuario_id'    =>$session->get('usuario_id'),
            'auditoria_tipo'          =>3,
            'auditoria_accion'        =>"usuario_nombre: ".$this->request->getPost('usuario_nombre').
                                        ", usuario_apellidos: ".$this->request->getPost('usuario_apellidos').
                                        ", usuario_usuario: ".$this->request->getPost('usuario_usuario').
                                        ", usuario_correo: ".$this->request->getPost('usuario_correo').
                                        ", usuario_contrasena sin encripciín: ".$usuario_contrasena.
                                        ", usuario_contrasena: ".md5($usuario_contrasena).
                                        ", usuario_rol_id: ".$this->request->getPost('usuario_rol_id').
                                        ", usuario_ciudad: ".$this->request->getPost('usuario_ciudad').
                                        ", usuario_telefono: ".$this->request->getPost('usuario_telefono'),
            'create_at'               =>TIMESTAMP
          ];
            echo "ok sin foto";
        }

        $usuariosModel = new Usuarios_model();
        $usuariosModel ->setUsuarios($datos);
        $auditoriaModel = new Auditoria_model();
        $auditoriaModel->registro($auditoria);

    }else{
        echo view('includes/admin/pagina/head');
        echo view("includes/admin/login");
        echo view('includes/admin/pagina/scripts');
        echo view('includes/admin/pagina/footer');
    }
  }

   // Función para desactivar un usuarios
   public function usuariosdesactivar($usuario_id){
     $session=session();
      if($session->get('login')){
        // Array de datos para la BD
        $datos=([
            'usuario_estado_id'      =>'2',
            'usuario_usuarios_id'     =>$session->get('usuario_id'),
            'update_at'             =>TIMESTAMP
        ]);

        $usuarioModel = new Usuarios_model();
        $usuarioModel ->actualizarUsuario($datos,$usuario_id);
        $auditoria = [
            'auditoria_usuario_id'    =>$session->get('usuario_id'),
            'auditoria_tipo'          =>6,
            'auditoria_accion'        =>"usuario_id: ".$usuario_id,
            'create_at'               =>TIMESTAMP
        ];
        $auditoriaModel = new Auditoria_model();
        $auditoriaModel->registro($auditoria);

        echo view('includes/admin/pagina/head');
        echo view('includes/admin/alertas/usuariosdesactivar');
        echo view('includes/admin/pagina/scripts');
        echo view('includes/admin/pagina/footer');

      }else{
        echo view('includes/admin/pagina/head');
        echo view("includes/admin/login");
        echo view('includes/admin/pagina/scripts');
        echo view('includes/admin/pagina/footer');
      }
    }

    // Función para activar un usuarios
    public function usuariosactivar($usuario_id){
      $session=session();
       if($session->get('login')){
         // Array de datos para la BD
         $datos=([
             'usuario_estado_id'      =>'1',
             'usuario_usuarios_id'     =>$session->get('usuario_id'),
             'update_at'             =>TIMESTAMP
         ]);

         $usuarioModel = new Usuarios_model();
         $usuarioModel ->actualizarUsuario($datos,$usuario_id);
         $auditoria = [
             'auditoria_usuario_id'    =>$session->get('usuario_id'),
             'auditoria_tipo'          =>5,
             'auditoria_accion'        =>"usuario_id: ".$usuario_id,
             'create_at'               =>TIMESTAMP
         ];
         $auditoriaModel = new Auditoria_model();
         $auditoriaModel->registro($auditoria);

         echo view('includes/admin/pagina/head');
         echo view('includes/admin/alertas/usuariosactivar');
         echo view('includes/admin/pagina/scripts');
         echo view('includes/admin/pagina/footer');

       }else{
         echo view('includes/admin/pagina/head');
         echo view("includes/admin/login");
         echo view('includes/admin/pagina/scripts');
         echo view('includes/admin/pagina/footer');
       }
     }

     // Función: Mostrar los usuarios inactivos, con y sin filtros de fechas
   public function usuariosinactivos(){
       $session=session();
       if($session->get('login')){

           echo view('includes/admin/pagina/head');
           $fechaini=$this->request->getPost('fechaini');
           $fechafin=$this->request->getPost('fechafin');

           if (($session->get('usuario_rol_id')==1)){
               echo view('includes/admin/menus/super_admin');
           }

           $usuariosModel = new Usuarios_model();
           $rolesModel = new Roles_model();

           if($fechaini && $fechafin){
               $data['usuarios'] = $usuariosModel->getUsuariosFechas($fechaini,$fechafin,2);
               $data['fechaini'] = $fechaini;
               $data['fechafin'] = $fechafin;
           }else{
               $data['usuarios'] = $usuariosModel->getUsuarios(2);
           }

           echo view('includes/admin/usuarios/usuariosinactivos',$data);
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

   // Función: Mostrar para modificar Usuario
  public function usuariosmodificar($usuario_id){
       $session=session();
       if($session->get('login')){

           echo view('includes/admin/pagina/head');

           if (($session->get('usuario_rol_id')==1)){
               echo view('includes/admin/menus/super_admin');
           }

           $usuarioModel = new Usuarios_model();
           $rolesModel = new Roles_model();
           $datos['usuario'] = $usuarioModel ->getPerfil($usuario_id);
           $datos['usuario_id'] = $usuario_id;
           $datos['roles'] = $rolesModel->getRoles(1);

           echo view('includes/admin/usuarios/usuariosmodificar',$datos);
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

  // Función: Actualizar Usuario
  public function usuariosactualizar(){
    $session=session();
    if($session->get('login')){
        // Obtener la data de la foto
        $usuario_foto = $this->request->getFile("usuario_foto");

        // POST con foto
        if($_FILES["usuario_foto"]["error"] == 0){
            // genrar nombre random para la foto del usuario
            $usuarioname = $usuario_foto->getRandomName();

            // Array de datos que se agregaran en la BD
            $datos=([
                'usuario_nombre'            =>$this->request->getPost('usuario_nombre'),
                'usuario_apellidos'         =>$this->request->getPost('usuario_apellidos'),
                'usuario_correo'            =>$this->request->getPost('usuario_correo'),
                'usuario_foto'              =>'writable/uploads/images/perfil/'.$usuarioname,
                'usuario_rol_id'            =>$this->request->getPost('usuario_rol_id'),
                'usuario_ciudad'            =>$this->request->getPost('usuario_ciudad'),
                'usuario_telefono'          =>$this->request->getPost('usuario_telefono'),
                'usuario_usuarios_id'       =>$session->get('usuario_id'),
                'update_at'                 =>TIMESTAMP
            ]);

            $foto = new Otros();
            if(!empty($usuarioname)){
                $foto->cargarFoto($usuario_foto,$usuarioname,1);
            }
            $auditoria = [
              'auditoria_usuario_id'    =>$session->get('usuario_id'),
              'auditoria_tipo'          =>4,
              'auditoria_accion'        =>"usuario_nombre: ".$this->request->getPost('usuario_nombre').
                                          ", usuario_apellidos: ".$this->request->getPost('usuario_apellidos').
                                          ", usuario_correo: ".$this->request->getPost('usuario_correo').
                                          ", usuario_rol_id: ".$this->request->getPost('usuario_rol_id').
                                          ", usuario_foto: writable/uploads/images/perfil/".$usuarioname.
                                          ", usuario_ciudad: ".$this->request->getPost('usuario_ciudad').
                                          ", usuario_telefono: ".$this->request->getPost('usuario_telefono'),
              'create_at'               =>TIMESTAMP
            ];
            // echo "ok con foto";
        }else{
          $datos=([
              'usuario_nombre'            =>$this->request->getPost('usuario_nombre'),
              'usuario_apellidos'         =>$this->request->getPost('usuario_apellidos'),
              'usuario_correo'            =>$this->request->getPost('usuario_correo'),
              'usuario_rol_id'            =>$this->request->getPost('usuario_rol_id'),
              'usuario_ciudad'            =>$this->request->getPost('usuario_ciudad'),
              'usuario_telefono'          =>$this->request->getPost('usuario_telefono'),
              'usuario_usuarios_id'       =>$session->get('usuario_id'),
              'update_at'                 =>TIMESTAMP
          ]);
          $auditoria = [
            'auditoria_usuario_id'    =>$session->get('usuario_id'),
            'auditoria_tipo'          =>4,
            'auditoria_accion'        =>"usuario_nombre: ".$this->request->getPost('usuario_nombre').
                                        ", usuario_apellidos: ".$this->request->getPost('usuario_apellidos').
                                        ", usuario_correo: ".$this->request->getPost('usuario_correo').
                                        ", usuario_rol_id: ".$this->request->getPost('usuario_rol_id').
                                        ", usuario_ciudad: ".$this->request->getPost('usuario_ciudad').
                                        ", usuario_telefono: ".$this->request->getPost('usuario_telefono'),
            'create_at'               =>TIMESTAMP
          ];
            // echo "ok sin foto";
        }

        $usuario_id = $this->request->getPost('usuario_id');
        $usuariosModel = new Usuarios_model();
        $usuariosModel ->actualizarUsuario($datos,$usuario_id);

        $auditoriaModel = new Auditoria_model();
        $auditoriaModel->registro($auditoria);

    }else{
        echo view('includes/admin/pagina/head');
        echo view("includes/admin/login");
        echo view('includes/admin/pagina/scripts');
        echo view('includes/admin/pagina/footer');
    }
  }

}
