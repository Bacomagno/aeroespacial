<?php

namespace App\Models;
use CodeIgniter\Model;


class Banner_model extends Model {

    protected $table = "banner as b";
	protected $primaryKey = "banner_id";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "banner_nombre",
        "banner_ipublicacion",
        "banner_fpublicacion",
        "banner_path",
        "banner_descripcion",
        "banner_contenido_id",
        "banner_usuario_id",
        "banner_estado_id",
        "create_at","update_at"];

    public function __construct()
    {
        parent::__construct();
    }

   // Obtener datos de banners
   public function getBaners($estado=null)
   {
       $builder = $this->db
           ->table($this->table)
           ->orderBy('b.banner_ipublicacion', 'ASC')
           ->where('b.banner_estado_id =', $estado);

           $query   = $builder->get()->getResult();
           return $query;
   }

   // Obtener datos de un solo banner
   public function getBanersId($banner_id=null)
   {
       $builder = $this->db
           ->table($this->table)
           ->where('b.banner_id =', $banner_id);

           $query   = $builder->get()->getResult();

           return $query;
   }

   // Obtener datos de banners con filtro de fechas
   public function getBanersFechas($fechaini=null,$fechafin=null,$estado=null)
   {
       $builder = $this->db
            ->table($this->table)
            ->select('*')
            ->where('b.banner_ipublicacion >',$fechaini)
            ->where('b.banner_ipublicacion <',$fechafin)
            ->where('b.banner_estado_id =', $estado)
            ->orderBy('b.banner_id', 'DESC');

       $query   = $builder->get()->getResult();
       return $query;
   }

   // Guardar Banner
   public function setBanner($data)
   {
       $this->db->table('banner')
                   ->insert($data);
   }

   // Actualizar Banner
   public function actualizarBanner($data,$banner_id=null)
   {
      $this->db
            ->table('banner')
            ->set($data)
            ->where('banner_id=',$banner_id)
            ->update();
   }

   // Conteo de banners por estado
   public function countBaners($estado=null)
   {
       $builder = $this->db
                        ->table($this->table)
                        ->where('b.banner_estado_id =',$estado);
       $query = $builder->countAllResults();
       return $query;
   }

   //
   public function getBannerVigentes($fecha=null, $tipo = null)
   {
       $builder = $this->db
                        ->table($this->table)
                        ->select('banner_nombre nombre, banner_descripcion descripcion, banner_ipublicacion inicio, banner_fpublicacion fin, banner_path ruta,
                                  DATEDIFF (banner_fpublicacion, banner_ipublicacion) diasAct')
                        ->where('b.banner_fpublicacion >=',$fecha)
                        ->where('b.banner_contenido_id ',$tipo)
                        ->where('b.banner_estado_id =', '1')
                        ->orderBy('b.banner_id', 'DESC');

       $query   = $builder->get();

       if($query->resultID->num_rows > 0){
         $query = $query->getResultArray();
         $data = array();
         foreach ($query as $banner) {

           $diff = (strtotime($fecha)-strtotime($banner['inicio']))/86400;

           if(floor($diff) <= $banner['diasAct']){
             $data[] = $banner;
           }
         }
         $resultado =$data;
       }else{
         $resultado = [];
       }
       return $resultado;
   }
}
?>
