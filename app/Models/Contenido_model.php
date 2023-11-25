<?php

namespace App\Models;
use CodeIgniter\Model;


class Contenido_model extends Model {    

    protected $table = "contenido as co";
	protected $primaryKey = "contenido_id";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "contenido_nombre",
        "contenido_estado_id",
        "contenido_usuario_id",
        "create_at","update_at"];

    public function __construct() 
    {
        parent::__construct();
    }
    
  
    
}
?>