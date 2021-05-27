<?php
include_once 'models/Alumno.php';

class ConsultaModelo extends Model{

    public function __construct()
    {
        parent::__construct();
    }

    public function get(){
        $alumnos = [];
        try{
            $query  = "SELECT * FROM alumnos";
            $con    = $this->db->connect();
            $con    = $con ->query($query);

            while ($row = $con ->fetch()){
                $alumno = new Alumno();
                $alumno->nombre     = $row['nombre'];
                $alumno->apellido   = $row['apellido'];
                $alumno->correo     = $row['email'];
                $alumno->imagen     = $row['img'];
                array_push($alumnos,$alumno);

            }
            return $alumnos;
        }catch(PDOException $e){
            return [];
        }
    }



}

?>