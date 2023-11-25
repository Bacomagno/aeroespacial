<?php

namespace App\Controllers;
use App\Models\Usuarios_model;
use App\Models\Auditoria_model;

class Login extends BaseController
{

    // Función que carga la pantalla login
    public function index()
    {
        $session=session();
        if($session->get('login')){
            return redirect()->to('/adm');
        }else{
            echo view('includes/admin/pagina/head');
            echo view("includes/admin/login");
            echo view('includes/admin/pagina/scripts');
            echo view('includes/admin/pagina/footer');
        }
    }

    public function iniciosesion(){
        $datos=([
            'usuario'=>$this->request->getPost('loginUsername'),
            'passwd'=>md5($this->request->getPost('loginPassword'))
        ]);
        $usuarioModel = new Usuarios_model();
        $data=$usuarioModel->getUsuario($datos);
        if (!$data){
            return $salida="false";
        }else{
             //Creación de array con los datos de la sesión
             $datases = [
                'usuario_id'             =>$data[0]->usuario_id,
                'usuario_usuario'         =>$data[0]->usuario_usuario,
                'usuario_rol_id'          =>$data[0]->usuario_rol_id,
                'login'		                => true
                        ];
            //Actualización de last login del usuario que ha iniciado sesión
            $dataup = [
              'last_login'              =>TIMESTAMP
            ];
            $usuarioModel->actualizarUsuario($dataup,$data[0]->usuario_id);
            $auditoria = [
                'auditoria_usuario_id'    =>$data[0]->usuario_id,
                'auditoria_tipo'          =>1,
                'auditoria_accion'        =>"El Usuario Inicio Sesión",
                'create_at'               =>TIMESTAMP

            ];
            $auditoriaModel = new Auditoria_model();
            $auditoriaModel->registro($auditoria);

            //Creación de sesión
            $session = session();
            $session->set($datases);
        }
    }

    // Cerrar session
    public function salir()
    {
        $session = session();
        $auditoria = [
            'auditoria_usuario_id'    =>$session->get('usuario_id'),
            'auditoria_tipo'          =>2,
            'auditoria_accion'        =>"El Usuario Cerro Sesión",
            'create_at'               =>TIMESTAMP

        ];
        $auditoriaModel = new Auditoria_model();
        $auditoriaModel->registro($auditoria);
        $session->destroy();
        return redirect()->to(IP_SERVER."login");
    }

    // Restaurar Contraseña
    public function restaurarpasswd(){

      $data['u_link'] = "u_link";
      $data['email'] = "innovasoft18@gmail.com";


       $message = "Mensaje de prueba";
       $email = \Config\Services::email();
       $email->setFrom('innovasoft18@gmail.com', 'Proyecto escuela Aeroespacial');
       $email->setTo($data['email']);
       $email->setSubject('Asunto asunto asunto | nasa');
       $email->setMessage($message);//your message here
       $email->send();
       $email->printDebugger(['headers']);
    }

}
