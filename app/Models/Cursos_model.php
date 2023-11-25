<?php

namespace App\Models;
use CodeIgniter\Model;


class Cursos_model extends Model {

    protected $table = "cursos as cr";
	protected $primaryKey = "curso_id";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "curso_nombre",
        "curso_link",
        "curso_descripcion",
        "curso_finicio",
        "curso_fin",
        "curso_usuario_id",
        "curso_estado_id",
        "create_at","update_at"];

    public function __construct()
    {
        parent::__construct();
    }

    // Crear Curso
    public function setCursos($data)
    {
        $this->db->table('cursos')
                    ->insert($data);
        $lastId=$this->db->insertID();
        return $lastId;
    }

    // Actualizar Noticia
    public function actualizarCurso($data,$curso_id=null)
    {
       $this->db
             ->table('cursos')
             ->set($data)
             ->where('curso_id=',$curso_id)
             ->update();
    }

    // Conteo de cursos por estado
    public function countCursos($estado=null)
    {
        $builder = $this->db
                         ->table($this->table)
                         ->where('cr.curso_estado_id =',$estado);
        $query = $builder->countAllResults();
        return $query;
    }

    public function getCursos()
    {
      $builder = $this->db
                          ->table($this->table)
                          ->where('cr.curso_estado_id', 1);

      $query   = $builder->get()->getResult();
      return $query;
    }

    public function saveProspectCuro($infoUser= null, $cursos= null)
    {
      $this->db->transBegin();
      $builder = $this->db
                          ->table('prospectos')
                          ->insert($infoUser);
        $user_id = $this->db->insertID();

        foreach ($cursos as $curso) {
          $data= array(
            'cursos_curso_id' => $curso['id'],
            'prospectos_prospecto_id' => $user_id
          );

          $builder = $this->db
                              ->table('prospectos_cursos')
                              ->insert($data);


        }
        if ($this->db->transStatus() === false) {
          $this->db->transRollback();
          $resultado['ESTADO']= 'FAIL';
        } else {
          $this->db->transCommit();
          $resultado['ESTADO']= 'OK';
        }

        return $resultado;
    }


}
?>
