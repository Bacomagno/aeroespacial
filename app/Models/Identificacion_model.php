<?php

namespace App\Models;
use CodeIgniter\Model;


class Identificacion_model extends Model {

    protected $table = "identificacion as id";
	  protected $primaryKey = "identificacion_id";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "identificacion_nombre"];

    public function __construct()
    {
        parent::__construct();
    }

    public function getIdentificacion(){
      $builder = $this->db
          ->table($this->table)
          ->orderBy('id.identificacion_id', 'ASC');

          $query   = $builder->get()->getResult();
          return $query;
    }


}
?>
