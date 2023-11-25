<?php

namespace App\Models;
use CodeIgniter\Model;


class ProspectosCursos_model extends Model {

    protected $table = "prospectos_cursos as pc";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "prospectos_cursos_id",
        "prospectos_prospecto_id",
        "cursos_curso_id"];

    public function __construct()
    {
        parent::__construct();
    }

    // Conteo de prospectos por curso
    public function getCountProspectosCursos(){
      $builder = $this->db
          ->table($this->table)
          ->select('c.curso_nombre, COUNT(*) AS cantidad')
          ->join('prospectos as p', 'pc.prospectos_prospecto_id = p.prospecto_id', 'inner')
          ->join('cursos as c', 'c.curso_id = pc.cursos_curso_id', 'inner')
          ->where('c.curso_estado_id =',1)
          ->where('p.prospecto_estado_id =', 1)
          ->groupBy("c.curso_id");

          $query   = $builder->get()->getResult();
          return $query;
    }
}
?>
