<?php

namespace App\Models;
use CodeIgniter\Model;
use App\Models\Roles_model;


class Usuarios_model extends Model {

    protected $table = "usuarios as u";
	protected $primaryKey = "usuario_id";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "usuario_nombre",
        "usuario_apellidos",
        "usuario_usuario",
        "usuario_correo",
        "usuario_contrasena",
        "usuario_foto",
        "usuario_estado_id",
        "usuario_rol_id",
        "usuario_ciudad",
        "usuario_telefono",
        "usuario_usuarios_id",
        "last_login",
        "create_at","update_at"];

    public function __construct()
    {
        parent::__construct();
    }

    // Obtener datos de usuario a partir de usuario y contraseña para inicio de sesion
    public function getUsuario($data=null)
    {
        $builder = $this->db
                        ->table($this->table)
                        ->select('u.usuario_id,u.usuario_usuario,u.usuario_contrasena,u.usuario_rol_id')
                        ->where('u.usuario_usuario =', $data['usuario'])
                        ->where('u.usuario_contrasena =', $data['passwd']);
        $query   = $builder->get()->getResult();

       return $query;
    }

    // Obtener datos de usuario para pagina de perfil
    public function getPerfil($data = null)
    {
        $builder = $this->db
            ->table($this->table)
            ->join('roles AS r', 'u.usuario_rol_id = rol_estado_id', 'INNER')
            ->where('u.usuario_id =', $data);
        $query   = $builder->get()->getResult();

        return $query;
    }

    // Obtener datos de usuarios
    public function getUsuarios($estado=null)
    {
        $builder = $this->db
            ->table($this->table)
            ->join('roles as r', 'r.rol_id = u.usuario_rol_id', 'inner')
            ->where('u.usuario_estado_id =', $estado);

            $query   = $builder->get()->getResult();
            return $query;
    }

    // Obtener datos de usuarios con filtro de fechas
    public function getUsuariosFechas($fechaini=null,$fechafin=null,$estado=null)
    {
        $builder = $this->db
             ->table($this->table)
             ->join('roles as r', 'r.rol_id = u.usuario_rol_id', 'inner')
             ->where('u.create_at >',$fechaini)
             ->where('u.create_at <',$fechafin)
             ->where('u.usuario_estado_id =', $estado)
             ->orderBy('u.create_at', 'DESC');

        $query   = $builder->get()->getResult();
        return $query;
    }

    // Guardar Usuario
    public function setUsuarios($data)
    {
        $this->db->table('usuarios')
                    ->insert($data);
    }

    // Actualizar Usuario
    public function actualizarUsuario($data,$usuario_id=null)
    {
          $this->db
             ->table('usuarios')
             ->set($data)
             ->where('usuario_id=',$usuario_id)
             ->update();

    }


}
?>
