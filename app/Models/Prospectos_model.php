<?php

namespace App\Models;
use CodeIgniter\Model;


class Prospectos_model extends Model {

    protected $table = "prospectos as p";
	protected $primaryKey = "prospecto_id";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "prospecto_nombre1",
        "prospecto_nombre2",
        "prospecto_apellido1",
        "prospecto_apellido2",
        "prospecto_correo",
        "prospecto_telefono",
        "prospecto_identificacion",
        "prospecto_ciudad",
        "prospecto_estado_id",
        "prospecto_identificacion_id",
        "create_at","update_at"];

    public function __construct()
    {
        parent::__construct();
    }

    // Obtener datos de los prospectos
    public function getProspectos($estado=null)
    {
        $builder = $this->db
            ->table($this->table)
            ->join('identificacion as id', 'id.identificacion_id = p.prospecto_identificacion_id', 'inner')
            ->orderBy('p.create_at', 'ASC')
            ->where('p.prospecto_estado_id =', $estado);

            $query   = $builder->get()->getResult();
            return $query;
    }

    // Obtener datos de los prospectos por fechas
    public function getProspectosFecha($fechaini=null,$fechafin=null,$estado=null)
    {
        $builder = $this->db
            ->table($this->table)
            ->join('identificacion as id', 'id.identificacion_id = p.prospecto_identificacion_id', 'inner')
            ->orderBy('p.create_at', 'ASC')
            ->where('p.create_at >',$fechaini)
            ->where('p.create_at <',$fechafin)
            ->where('p.prospecto_estado_id =', $estado);

            $query   = $builder->get()->getResult();
            return $query;

    }

    // Obtener datos de los cursos por cada prospectos
    public function getProspectosCursos($estado=null)
    {
        $builder = $this->db
            ->table($this->table)
            ->select('c.curso_nombre, p.prospecto_id')
            ->join('prospectos_cursos as pc', 'pc.prospectos_prospecto_id = p.prospecto_id', 'inner')
            ->join('cursos as c', 'c.curso_id = pc.cursos_curso_id', 'inner')
            ->where('c.curso_estado_id =',$estado)
            ->where('p.prospecto_estado_id =', $estado);

            $query   = $builder->get()->getResult();
            return $query;
    }


    // Conteo de Prospectos por estado
    public function countProspectos($estado=null)
    {
        $builder = $this->db
                         ->table($this->table)
                         ->where('p.prospecto_estado_id =',$estado);
        $query = $builder->countAllResults();
        return $query;
    }



}
?>
