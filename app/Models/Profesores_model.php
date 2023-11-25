<?php

namespace App\Models;
use CodeIgniter\Model;


class Profesores_model extends Model {

    protected $table = "profesores as pr";
	protected $primaryKey = "profesor_id";

    protected $returnType = "array";
    protected $useSoftDeletes=true;

    protected $allowedFields =[
        "profesor_nombres",
        "profesor_apellidos",
        "profesor_facebook",
        "profesor_instagram",
        "profesor_youtube",
        "profesor_linkedin",
        "profesor_foto",
        "profesor_titulo",
        "profesor_puestoactual",
        "profesor_educacion",
        "profesor_descripcion",
        "profesor_pagina",
        "profesor_estado_id",
        "profesor_usuario_id",
        "create_at","update_at"];

    public function __construct()
    {
        parent::__construct();
    }

    // Obtener datos de profesores
    public function getProfesores($estado=null)
    {
        $builder = $this->db
            ->table($this->table)
            ->orderBy('pr.profesor_id', 'ASC')
            ->where('pr.profesor_estado_id =', $estado);

            $query   = $builder->get()->getResult();
            return $query;
    }

    // Guardar Noticia
    public function setProfesores($data)
    {
        $this->db->table('profesores')
                    ->insert($data);
    }

    // Obtener datos de una sola noticia
    public function getProfesorId($profesor_id=null)
    {
        $builder = $this->db
            ->table($this->table)
            ->where('pr.profesor_id =', $profesor_id);

            $query   = $builder->get()->getResult();

            return $query;
    }

    // Actualizar profesor
    public function actualizarProfesor($data,$profesor_id=null)
    {
       $this->db
             ->table('profesores')
             ->set($data)
             ->where('profesor_id=',$profesor_id)
             ->update();
    }

    // Conteo de profesores por estado
    public function countProfesores($estado=null)
    {
        $builder = $this->db
                         ->table($this->table)
                         ->where('pr.profesor_estado_id =',$estado);
        $query = $builder->countAllResults();
        return $query;
    }

    /**
    * Metodo que consulta la información de  los profesores para mostrar en
    * carousel principal
    * Create at Sebastian Diaz
    * @return array informacion de losprofesores creados
    */
    public function getInfoProfesores(){
      $builder = $this->db
                          ->table($this->table)
                          ->select('profesor_id consec, CONCAT(profesor_nombres," ",profesor_apellidos) nombres,
                                    profesor_descripcion descripcion, profesor_titulo titulo, profesor_foto perfil')
                          ->where('pr.profesor_estado_id', 1)
                          ->where('profesor_id >', 1);
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
    * Metodo que me trae toda la informacion de un profesor escogido y los cursos
    * asignados
    * @param int $id id del profesor
    * @return array
    */
    public function getMoreInfo($id){
      $builder = $this->db
                          ->table($this->table)
                          ->select('pr.*')
                          ->where('pr.profesor_estado_id', 1)
                          ->where('pr.profesor_id', $id);
      $query = $builder->get();
      if($query->resultID->num_rows > 0){
        $data['ESTADO'] ='OK';
        $data['DATA']['PROFESOR'] =$query->getRow();

        $builder = $this->db
                            ->table('profesores_cursos pc')
                            ->select('curso_nombre, curso_descripcion,
                                      DATE(curso_finicio) curso_finicio, DATE(curso_fin) curso_fin')
                            ->join('cursos c', 'c.curso_id = pc.cursos_curso_id')
                            ->where('c.curso_estado_id', 1)
                            ->where('pc.profesores_profesor_id', $id);
        $query = $builder->get();
        if($query->resultID->num_rows > 0){
            $data['DATA']['CURSOS'] = $query->getResult();
        }else{
          $data['DATA']['CURSOS'] = [];
        }
      }else{
        $data['ESTADO'] = 'FAIL';
        $data['DATA']['PROFESOR'] = [];
        $data['DATA']['CURSOS'] = [];
      }
      return $data;
    }


}
?>
