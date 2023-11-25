<?php

namespace App\Models;
use CodeIgniter\Model;


class ProfesoresCursos_model extends Model {

    protected $table = "profesores_cursos as prc";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "id_profesores_cursos",
        "profesores_profesor_id",
        "cursos_curso_id"];

    public function __construct()
    {
        parent::__construct();
    }

    // Insertar profesor y Curso
    public function setProfesoresCursos($profesores_profesor_id, $cursos_curso_id){
      $data=([
        'profesores_profesor_id'          =>$profesores_profesor_id,
        'cursos_curso_id'                 =>$cursos_curso_id,
      ]);

      $this->db->table('profesores_cursos')
                  ->insert($data);
    }

    // Consultar datos completos profesor y Curso
    public function getProfesoresCursos($estado){
      $builder = $this->db
          ->table('profesores_cursos as pc')
          ->select('cr.curso_id, cr.curso_nombre ,cr.curso_link, cr.curso_descripcion, cr.curso_finicio, cr.curso_fin, cr.curso_tipomodulo, p.profesor_nombres, p.profesor_apellidos')
          ->join('profesores as p', 'p.profesor_id = pc.profesores_profesor_id', 'inner')
          ->join('cursos as cr', 'cr.curso_id = pc.cursos_curso_id', 'inner')
          ->orderBy('cr.curso_finicio', 'ASC')
          ->where('cr.curso_estado_id =', $estado);
          $query   = $builder->get()->getResult();
          return $query;
    }

    // Consultar datos completos profesor y Curso con orden de fechas
    public function getProfesoresCursosFechas($estado, $fechaini, $fechafin){
      $builder = $this->db
          ->table('profesores_cursos as pc')
          ->select('cr.curso_id, cr.curso_nombre ,cr.curso_link, cr.curso_descripcion, cr.curso_finicio, cr.curso_fin, cr.curso_tipomodulo, p.profesor_nombres, p.profesor_apellidos')
          ->join('profesores as p', 'p.profesor_id = pc.profesores_profesor_id', 'inner')
          ->join('cursos as cr', 'cr.curso_id = pc.cursos_curso_id', 'inner')
          ->orderBy('cr.curso_finicio', 'ASC')
          ->where('cr.curso_estado_id =', $estado)
          ->where('cr.curso_finicio >',$fechaini)
          ->where('cr.curso_finicio <',$fechafin);
          $query   = $builder->get()->getResult();
          return $query;
    }


    // Consultar datos completos profesor y Curso
    public function getProfesoresCursosId($curso_id){
      $builder = $this->db
          ->table('profesores_cursos as pc')
          ->select('cr.curso_id, cr.curso_nombre ,cr.curso_link, cr.curso_descripcion, cr.curso_finicio, cr.curso_tipomodulo, cr.curso_fin,p.profesor_id, p.profesor_nombres, p.profesor_apellidos')
          ->join('profesores as p', 'p.profesor_id = pc.profesores_profesor_id', 'inner')
          ->join('cursos as cr', 'cr.curso_id = pc.cursos_curso_id', 'inner')
          ->orderBy('cr.curso_finicio', 'ASC')
          ->where('cr.curso_id =', $curso_id);
          $query   = $builder->get()->getResult();
          return $query;
    }

    // Actualziar profesor desde actualziación de Curso
    public function actualizarProfesoresCursos($data, $cursos_curso_id){
      $this->db
            ->table('profesores_cursos')
            ->set($data)
            ->where('id_profesores_cursos=',$cursos_curso_id)
            ->update();
    }

    // Contar cursos activos por profesores
    public function contarProfesoresCursosActivos($profesor_id=null,$estado){
      $builder = $this->db
                      ->table($this->table)
                      ->join('cursos as cr', 'cr.curso_id = prc.cursos_curso_id', 'inner')
                      ->where('cr.curso_id',$estado)
                      ->where('prc.profesores_profesor_id',$profesor_id);
      $query = $builder->countAllResults();
      return $query;
    }



}
?>
