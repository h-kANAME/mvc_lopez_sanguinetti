<?php
include_once 'models/Destacados.php';

class MainModelo extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getDestacados(){
        $destacados = [];
        try {
            $query  = "SELECT * FROM productos WHERE destacado = 'true'";
            $con    = $this->db->connect();
            $con    = $con->query($query);

            while ($row = $con->fetch()) {

                $destacado = new Destacados();
                
                $destacado->id_producto           = $row['id_producto'];
                $destacado->descripcion           = $row['descripcion'];
                $destacado->id_marca              = $row['id_marca'];
                $destacado->modelo                = $row['modelo'];
                $destacado->destacado             = $row['destacado'];
                $destacado->precio                = $row['precio'];
                $destacado->imagen                = $row['imagen'];
                $destacado->imagen_max            = $row['imagen_max'];
                $destacado->id_sub_categoria      = $row['id_sub_categoria'];
                $destacado->estado_activo         = $row['estado_activo'];
                array_push($destacados, $destacado);
            }
            return $destacados;
        } catch (PDOException $e) {
            return [];
        }
    }
}
?>