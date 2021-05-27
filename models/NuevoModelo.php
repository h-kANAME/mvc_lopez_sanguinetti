<?php

class NuevoModelo extends Model{
    public function __construct()
    {
        parent::__construct();
    }

    public function insert($datos){

      
        $query = "INSERT INTO alumnos (nombre, apellido, email,img ) VALUES (:nombreVariable,:apellido,:email,:img)";
        $con = $this->db->connect();
        $con = $con->prepare($query);
        $ejecutar = $con->execute($datos);

        if ( $ejecutar ){
            return true;
        }else{
            return false;
        }
    }


}

?>