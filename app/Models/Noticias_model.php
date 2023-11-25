<?php

namespace App\Models;
use CodeIgniter\Model;


class Noticias_model extends Model {

    protected $table = "noticias as n";
	protected $primaryKey = "noticia_id";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "noticia_titulo",
        "noticia_contenido",
        "noticia_ipublicacion",
        "noticia_fpublicacion",
        "noticia_adjunto",
        "noticia_video",
        "noticia_contenido_id",
        "noticia_usuario_id",
        "noticia_estado_id",
        "create_at","update_at"];

    public function __construct()
    {
        parent::__construct();
    }

    // Obtener datos de noticias con filtro de fechas
    public function getNoticiasFechas($fechaini=null,$fechafin=null,$estado=null)
    {
        $builder = $this->db
             ->table($this->table)
             ->select('*')
             ->where('n.noticia_ipublicacion >',$fechaini)
             ->where('n.noticia_ipublicacion <',$fechafin)
             ->where('n.noticia_estado_id =', $estado)
             ->orderBy('n.noticia_ipublicacion', 'ASC');

        $query   = $builder->get()->getResult();
        return $query;
    }

    // Obtener datos de noticias
    public function getNoticias($estado=null)
    {
        $builder = $this->db
            ->table($this->table)
            ->where('n.noticia_estado_id =', $estado)
            ->orderBy('n.noticia_ipublicacion', 'ASC');

            $query   = $builder->get()->getResult();
            return $query;
    }

    // Guardar Noticia
    public function setNoticia($data)
    {
        $this->db->table('noticias')
                    ->insert($data);
    }

    // Obtener datos de una sola noticia
    public function getNoticiasId($noticia_id=null)
    {
        $builder = $this->db
            ->table($this->table)
            ->where('n.noticia_id =', $noticia_id);

            $query   = $builder->get()->getResult();

            return $query;
    }

    // Actualizar Noticia
    public function actualizarNoticia($data,$noticia_id=null)
    {
       $this->db
             ->table('noticias')
             ->set($data)
             ->where('noticia_id=',$noticia_id)
             ->update();
    }

    // Conteo de Noticias por estado
    public function countNoticias($estado=null)
    {
        $builder = $this->db
                         ->table($this->table)
                         ->where('n.noticia_estado_id =',$estado);
        $query = $builder->countAllResults();
        return $query;
    }

    public function getNoticiasVista($fechaini=null,$fechafin=null,$row=0)
    {
        $builder = $this->db
             ->table($this->table)
             ->select('count(*) total')
             ->where('n.noticia_ipublicacion >=',$fechaini)
             ->where('n.noticia_ipublicacion <=',$fechafin)
             ->where('n.noticia_estado_id =', 1)
             ->where('n.noticia_contenido_id =', 5)
             ->orderBy('n.noticia_ipublicacion', 'DESC');
        $all  = $builder->get()->getRow();
        $all =$all->total;
        $build = $this->db
             ->table($this->table)
             ->select('noticia_titulo, noticia_contenido,noticia_video, noticia_adjunto, DATE(noticia_ipublicacion) fecha, noticia_fpublicacion')
             ->where('n.noticia_ipublicacion >=',$fechaini)
             ->where('n.noticia_ipublicacion <=',$fechafin)
             ->where('n.noticia_estado_id =', 1)
             ->where('n.noticia_contenido_id =', 5)
             ->orderBy('n.noticia_ipublicacion', 'DESC')
             ->limit('5',$row);

        $news   = $build->get()->getResult();

        $resp['DATA'] = $news;
        $resp['TODO'] = $all;
        return $resp;
    }

    public function getNovedadesVista($fechaini=null,$fechafin=null,$row=0)
    {
        $builder = $this->db
             ->table($this->table)
             ->select('count(*) total')
             ->where('n.noticia_ipublicacion >=',$fechaini)
             ->where('n.noticia_ipublicacion <=',$fechafin)
             ->where('n.noticia_estado_id =', 1)
             ->where('n.noticia_contenido_id =', 6)
             ->orderBy('n.noticia_ipublicacion', 'DESC');
        $all  = $builder->get()->getRow();
        $all =$all->total;
        $build = $this->db
             ->table($this->table)
             ->select('noticia_titulo, noticia_contenido,noticia_video, noticia_adjunto, DATE(noticia_ipublicacion) fecha, noticia_fpublicacion')
             ->where('n.noticia_ipublicacion >=',$fechaini)
             ->where('n.noticia_ipublicacion <=',$fechafin)
             ->where('n.noticia_estado_id =', 1)
             ->where('n.noticia_contenido_id =', 6)
             ->orderBy('n.noticia_ipublicacion', 'DESC')
             ->limit('5',$row);

        $news   = $build->get()->getResult();

        $resp['DATA'] = $news;
        $resp['TODO'] = $all;
        return $resp;
    }


}
?>
