<?php

namespace App\Controllers;

class Otros extends BaseController
{
    // Función para subir archivos en ruta interna del servidor y el proyecto
   public function cargarFoto($foto=null, $fotoname, $tipo){
       // 1: foto perfil, 2: banner, 4: eventos, 5: noticias, 7: profesores, 8: aliados
        $session=session();
        if($session->get('login')){
                if($foto->isValid()){
                    if ($tipo == 1){
                        $foto->move(WRITEPATH."uploads/images/perfil",$fotoname);
                    }else if ($tipo==2){
                        $foto->move(WRITEPATH."uploads/images/banners",$fotoname);
                    }else if ($tipo==4){
                        $foto->move(WRITEPATH."uploads/images/eventos",$fotoname);
                    }else if ($tipo==5){
                        $foto->move(WRITEPATH."uploads/images/noticias",$fotoname);
                    }else if ($tipo==7){
                        $foto->move(WRITEPATH."uploads/images/profesores",$fotoname);
                    }else if ($tipo==8){
                        $foto->move(WRITEPATH."uploads/images/aliados",$fotoname);
                    }
                }else{
                    echo view("");
                }
        }
        else{
            echo view("errors/html/error_404");
        }
    }


    public function sendmail($prospecto, $cursoInteres){

        $this->email = \Config\Services::email();
        $subject = "Nuevo Estudiante Registrado - Escuela Aeroespacial";
        $message =  '<p>Cordial Saludo,</p>
                    <p>&nbsp;</p>
                    <p>Se gener&oacute; un nuevo registro de un estudiante para la escuela aeroespacial, los datos del estudiante son:</p>
                    <p><em><strong>Nombre:</strong></em>'.$prospecto->prospecto_nombre1.' '.$prospecto->prospecto_nombre2.' '.$prospecto->prospecto_apellido1.' '.$prospecto->prospecto_apellido2.'
                    </p><p><em><strong>Correo Electronico: </strong></em>'.$prospecto->prospecto_correo.'
                    </p><p><em><strong>Telefono:&nbsp;</strong></em>'.$prospecto->prospecto_telefono.'
                    </p><p><em><strong>Ciudad:</strong></em>'.$prospecto->prospecto_ciudad.'
                    </p><p><em><strong>Cursos De Interes:</strong></em>
                    <p><ul>';
                    foreach ($cursoInteres as $c) {
                          $message .= '<li>'.$c['curso_nombre'].'</li>';
                      };
                    $message.= '</ul></p>
                    </p><p>&nbsp;</p>
                    <p>Inicie session en el m&oacute;dulo de Administraci&oacute;n, en el siguiente Link para validar el nuevo registro.</p>
                    <p>&nbsp;</p>
                    <p>Cordialmente</p>
                    <p><strong>Escuela Aeroespacial - Unihorizonte</strong></p>
                    <p><img src="https://nasa.solucionesvalsan.com/assets/images/logo.png" width="357" height="107" /></p>';

        $this->email->setTo("gabriel_aguilera20201@unihorizonte.edu.co");
        $this->email->setCC($prospecto->prospecto_correo);
        $this->email->setFrom("gabriel_aguilera20201@unihorizonte.edu.co", "Contacto Escuela Aeroesoacial");
        $this->email->setSubject($subject);
        $this->email->setMessage($message);

        if ($this->email->send())
        	{
        		$data = [
        			'msg'	=> 'Email enviado correctamente'
        		];
        	}
        	else
        	{
        		$data = [
        			'msg'	=> 'Email No enviado'
        		];
        	}

          return $data;

    }



}
