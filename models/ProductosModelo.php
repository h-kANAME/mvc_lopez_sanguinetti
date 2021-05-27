<?php
include_once 'models/Producto.php';

class ProductosModelo extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    public function getProductos(){
        $productos = [];
        $orderBy = '';
        try {
            $query  = "SELECT * FROM productos WHERE estado_activo = 1 ORDER BY modelo $orderBy";
            $con    = $this->db->connect();
            $con    = $con->query($query);

            while ($row = $con->fetch()) {

                $producto = new Producto();
                
                $producto->id_producto           = $row['id_producto'];
                $producto->descripcion           = $row['descripcion'];
                $producto->id_marca              = $row['id_marca'];
                $producto->id_categoria          = $row['id_categoria'];
                $producto->modelo                = $row['modelo'];
                $producto->destacado             = $row['destacado'];
                $producto->precio                = $row['precio'];
                $producto->imagen                = $row['imagen'];
                $producto->imagen_max            = $row['imagen_max'];
                $producto->id_sub_categoria      = $row['id_sub_categoria'];
                $producto->estado_activo         = $row['estado_activo'];
                array_push($productos, $producto);
            }
            return $productos;
        } catch (PDOException $e) {
            return [];
        }
    }
}
?>