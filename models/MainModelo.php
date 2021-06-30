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
            $query  = "SELECT productos.id_producto, productos.descripcion, productos.id_marca, productos.id_categoria, productos.modelo, productos.destacado, productos.precio, productos.imagen, productos.imagen_max, productos.id_sub_categoria, productos.estado_activo, 
            productos.modelo AS Producto, productos.id_producto AS Id, SUM(comentarios.calificacion) / COUNT(comentarios.calificacion) AS Ranqueo, comentarios.descripcion AS Comentario
                             FROM productos, comentarios
                             WHERE productos.id_producto = comentarios.id_producto AND productos.destacado = 'true'
                             GROUP BY productos.modelo";

            

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
                $destacado->rank                  = $row['Ranqueo'];
                array_push($destacados, $destacado);
            }
            return $destacados;
        } catch (PDOException $e) {
            return [];
        }
    }
}
?>