<?php

namespace App\Controllers;
use App\Models\Banner_model;
use App\Models\Noticias_model;
use App\Models\Eventos_model;
use App\Models\Profesores_model;
use App\Models\Cursos_model;
use App\Models\Prospectos_model;
use App\Models\Aliados_model;


class Admin extends BaseController
{


    public function index()
    {
        $session=session();
        if($session->get('login')){
        echo view('includes/admin/pagina/head');

        if (($session->get('usuario_rol_id')==1)){
            echo view('includes/admin/menus/super_admin');
        }
        $bannerModel = new Banner_model();
        $noticiaModel = new Noticias_model();
        $eventoModel = new Eventos_model();
        $profesorModel = new Profesores_model();
        $cursoModel = new Cursos_model();
        $ProspectosModel = new Prospectos_model();
        $aliadosModel = new Aliados_model();

        $datos['bactivos']=$bannerModel->countBaners(1);
        $datos['binactivos']=$bannerModel->countBaners(2);
        $datos['nactivas']=$noticiaModel->countNoticias(1);
        $datos['ninactivas']=$noticiaModel->countNoticias(2);
        $datos['evactivos']=$eventoModel->countEventos(1);
        $datos['evinactivos']=$eventoModel->countEventos(2);
        $datos['practivos']=$profesorModel->countProfesores(1);
        $datos['prinactivos']=$profesorModel->countProfesores(2);
        $datos['cractivos']=$cursoModel->countCursos(1);
        $datos['crinactivos']=$cursoModel->countCursos(2);
        $datos['prosactivos']=$ProspectosModel->countProspectos(1);
        $datos['alactivos']=$aliadosModel->countAliados(1);
        $datos['alinactivos']=$aliadosModel->countAliados(2);
        echo view('includes/admin/dashboard',$datos);
        echo view('includes/admin/pagina/scripts');
        echo view('includes/admin/pagina/footer');
        }else{
            return redirect()->to('/login');
        }

    }

}
