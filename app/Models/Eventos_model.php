<?php

namespace App\Models;
use CodeIgniter\Model;


class Eventos_model extends Model {

    protected $table = "eventos as ev";
	protected $primaryKey = "evento_id";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "evento_nombre",
        "evento_descripcion",
        "evento_link",
        "evento_finicio",
        "evento_hinicio",
        "evento_fin",
        "evento_hfin",
        "evento_encargado",
        "evento_adjunto",
        "evento_video",
        "evento_usuario_id",
        "evento_estado_id",
        "evento_contenido_id",
        "create_at","update_at"];

    public function __construct()
    {
        parent::__construct();
    }

    // Obtener datos de eventos con filtro de fechas
    public function getEventosFechas($fechaini=null,$fechafin=null,$estado=null)
    {
        $builder = $this->db
             ->table($this->table)
             ->select('*')
             ->where('ev.evento_finicio >',$fechaini)
             ->where('ev.evento_fin <',$fechafin)
             ->where('ev.evento_estado_id =', $estado)
             ->orderBy('ev.evento_id', 'DESC');

        $query   = $builder->get()->getResult();
        return $query;
    }

    // Obtener datos de eventos
    public function getEventos($estado=null)
    {
        $builder = $this->db
            ->table($this->table)
            ->orderBy('ev.evento_finicio', 'ASC')
            ->where('ev.evento_estado_id =', $estado);

            $query   = $builder->get()->getResult();
            return $query;
    }

    // Guardar Noticia
    public function setEventos($data)
    {
        $this->db->table('eventos')
                    ->insert($data);
    }

    // Obtener datos de una sola noticia
    public function getEventoId($evento_id=null)
    {
        $builder = $this->db
            ->table($this->table)
            ->where('ev.evento_id =', $evento_id);

            $query   = $builder->get()->getResult();

            return $query;
    }

    // Actualizar Evento
    public function actualizarEvento($data,$evento_id=null)
    {
       $this->db
             ->table('eventos')
             ->set($data)
             ->where('evento_id=',$evento_id)
             ->update();
    }

    // Conteo de Eventos por estado
    public function countEventos($estado=null)
    {
        $builder = $this->db
                         ->table($this->table)
                         ->where('ev.evento_estado_id =',$estado);
        $query = $builder->countAllResults();
        return $query;
    }
}
?>
