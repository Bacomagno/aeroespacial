<?php

namespace App\Controllers;
use App\Models\Usuarios_model;
use App\Models\Roles_model;
use App\Controllers\Otros;
use App\Models\Auditoria_model;

class Perfil extends BaseController
{

    // Función que carga la pantalla login
    public function perfil()
    {
        $session=session();
        if($session->get('login')){
            echo view('includes/admin/pagina/head');

            $usuarioModel = new Usuarios_model();
            $data['usuario'] = $usuarioModel->getPerfil($session->get('usuario_id'));
            $rolesModel = new Roles_model();
            $data['roles'] = $rolesModel->getRoles(1);

            if (($session->get('usuario_rol_id')==1)){
                echo view('includes/admin/menus/super_admin');
            }

            echo view('includes/admin/perfil/perfil',$data);
            echo view('includes/admin/pagina/scripts');
            echo view('includes/admin/pagina/footer');
        }else{
            echo view('includes/admin/pagina/head');
            echo view("includes/admin/login");
            echo view('includes/admin/pagina/scripts');
        }
    }

    // Funcion para la transición de la actualziación de los usuarios
    public function actualizarperfil()
    {
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
                  'usuario_telefono'          =>$this->request->getPost('usuario_telefono'),
                  'usuario_correo'            =>$this->request->getPost('usuario_correo'),
                  'usuario_ciudad'            =>$this->request->getPost('usuario_ciudad'),
                  'usuario_rol_id'            =>$this->request->getPost('usuario_rol_id'),
                  'usuario_foto'              =>'writable/uploads/images/perfil/'.$usuarioname,
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
                'auditoria_accion'        =>"usuario_telefono: ".$this->request->getPost('usuario_telefono').
                                            ", usuario_correo: ".$this->request->getPost('usuario_correo').
                                            ", usuario_ciudad: ".$this->request->getPost('usuario_ciudad').
                                            ", usuario_foto: writable/uploads/images/perfil/".$usuarioname.
                                            ", usuario_rol_id: ".$this->request->getPost('usuario_rol_id'),
                'create_at'               =>TIMESTAMP
              ];
          }else{
            $datos=([
                'usuario_telefono'          =>$this->request->getPost('usuario_telefono'),
                'usuario_correo'            =>$this->request->getPost('usuario_correo'),
                'usuario_ciudad'            =>$this->request->getPost('usuario_ciudad'),
                'usuario_rol_id'            =>$this->request->getPost('usuario_rol_id'),
                'usuario_usuarios_id'       =>$session->get('usuario_id'),
                'update_at'                 =>TIMESTAMP
            ]);
            $auditoria = [
              'auditoria_usuario_id'    =>$session->get('usuario_id'),
              'auditoria_tipo'          =>4,
              'auditoria_accion'        =>"usuario_telefono: ".$this->request->getPost('usuario_telefono').
                                          ", usuario_correo: ".$this->request->getPost('usuario_correo').
                                          ", usuario_ciudad: ".$this->request->getPost('usuario_ciudad').
                                          ", usuario_rol_id: ".$this->request->getPost('usuario_rol_id'),
              'create_at'               =>TIMESTAMP
            ];
          }

          $usuario_id = $session->get('usuario_id');
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

    //Funcion para actualizar la contraseña del usuario
    public function actualizarperfilcontrasena()
    {
        $session=session();
        if($session->get('login')){

          $usuario_id=$session->get('usuario_id');
            //Obtener los datos enviados por el post
            $datos=([
                'usuario_contrasena'  =>md5($this->request->getPost('usuario_contrasena')),
                'update_at' => TIMESTAMP
            ]);

            //
            $usuarioModel = new Usuarios_model();
            $usuarioModel->actualizarUsuario($datos,$usuario_id);

        }else{
            echo view('includes/admin/pagina/head');
            echo view("includes/admin/login");
            echo view('includes/admin/pagina/scripts');
        }
    }



}
