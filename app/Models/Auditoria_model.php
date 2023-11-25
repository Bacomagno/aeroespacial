<?php

namespace App\Models;
use CodeIgniter\Model;


class Auditoria_model extends Model {

    protected $table = "auditoria as a";
	protected $primaryKey = "auditoria_id";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "auditoria_usuario_id",
        "auditoria_tipo",
        "auditoria_accion",
        "create_at"];

    public function __construct()
    {
        parent::__construct();
    }

    public function registro($data){
      $this->db->table('auditoria')
                  ->insert($data);
    }



}
?>
