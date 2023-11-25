<?php

namespace App\Models;
use CodeIgniter\Model;


class Roles_model extends Model {

    protected $table = "roles as r";
	protected $primaryKey = "rol_id";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "rol_nombre",
        "rol_descripcion",
        "rol_estado_id",
        "create_at","update_at"];

    public function __construct()
    {
        parent::__construct();
    }

    // Obtener datos de roles
    public function getRoles($estado=null)
    {
        $builder = $this->db
            ->table($this->table)
            ->where('r.rol_estado_id =', $estado);

            $query   = $builder->get()->getResult();
            return $query;
    }

}
?>
