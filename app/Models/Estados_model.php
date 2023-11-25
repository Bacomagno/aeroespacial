<?php

namespace App\Models;
use CodeIgniter\Model;


class Estados_model extends Model {    

    protected $table = "estados as es";
	protected $primaryKey = "estado_id";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "estado_nombre",
        "create_at","update_at"];

    public function __construct() 
    {
        parent::__construct();
    }
    
  
    
}
?>