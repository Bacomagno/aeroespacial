<?php

namespace App\Models;
use CodeIgniter\Model;


class Aliados_model extends Model {

    protected $table = "aliados as a";
	protected $primaryKey = "aliado_id";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
      "aliado_foto",
      "aliado_nombres",
      "aliado_apellidos",
      "aliado_titulo",
      "aliado_descripcion",
      "aliado_email",
      "aliado_pagina",
      "aliado_facebook",
      "aliado_twitter",
      "aliado_instagram",
      "aliado_youtube",
      "aliado_linkedin",
      "aliado_estado_id",
      "aliado_usuario_id",
      "create_at","update_at"];

    public function __construct()
    {
        parent::__construct();
    }

    // Obtener datos de Aliados *
    public function getAliados($estado=null)
    {
        $builder = $this->db
            ->table($this->table)
            ->orderBy('a.aliado_id', 'ASC')
            ->where('a.aliado_estado_id =', $estado);

            $query   = $builder->get()->getResult();
            return $query;
    }

    // Guardar Aliados*
    public function setAliados($data)
    {
        $this->db->table('aliados')
                    ->insert($data);
    }

    // Obtener datos de una sola noticia
    public function getAliadoId($aliado_id=null)
    {
        $builder = $this->db
            ->table($this->table)
            ->where('a.aliado_id =', $aliado_id);

            $query   = $builder->get()->getResult();

            return $query;
    }

    // Actualizar Aliado*
    public function actualizarAliado($data,$aliado_id=null)
    {
       $this->db
             ->table('aliados')
             ->set($data)
             ->where('aliado_id=',$aliado_id)
             ->update();
    }

    // Conteo de Aliados por estado
    public function countAliados($estado=null)
    {
        $builder = $this->db
                         ->table($this->table)
                         ->where('a.aliado_estado_id =',$estado);
        $query = $builder->countAllResults();
        return $query;
    }


    /**
    * Metodo que consulta la información de  los aliads para mostrar en
    * carousel principal
    * Create at Sebastian Diaz
    * @return array informacion de losprofesores creados
    */
    public function getInfoAliados(){
      $builder = $this->db
                          ->table($this->table)
                          ->select('aliado_id consec, CONCAT(aliado_nombres," ",aliado_apellidos) nombres,
                                    aliado_descripcion descripcion, aliado_titulo titulo, aliado_foto perfil')
                          ->where('a.aliado_estado_id', 1);
      $query = $builder->get();
      if($query->resultID->num_rows > 0){
        $data['ESTADO'] = 'OK';
        $data['DATA'] = $query->getResult();
      }else{
        $data['ESTADO'] = 'FAIL';
        $data['DATA'] = [];
      }
      return $data;
    }

    /**
    * Metodo que me trae toda la informacion de un aliado escogido
    * @param int $id id del aliado
    * @return array
    */
    public function getMoreInfo($id){
      $builder = $this->db
                          ->table($this->table)
                          ->select('a.*')
                          ->where('a.aliado_estado_id', 1)
                          ->where('a.aliado_id', $id);
      $query = $builder->get();
      if($query->resultID->num_rows > 0){
        $data['ESTADO'] ='OK';
        $data['DATA']['ALIADO'] =$query->getRow();
      }else{
        $data['ESTADO'] = 'FAIL';
        $data['DATA']['ALIADO'] = [];
      }
      return $data;
    }
  }
?>
