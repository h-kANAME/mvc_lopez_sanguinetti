<?php
include_once 'models/Producto.php';
include_once "models/Categoria.php";
include_once "models/Marca.php";
include_once 'models/SubCategoria.php';
include_once 'models/Ranqueo.php';

class Producto_modeloModelo extends Model
{

  public function __construct()
  {
    parent::__construct();
  }



  public function getProductos()
  {


    if (isset($_REQUEST['ordenBy'])) {
      $ordenBy = $_REQUEST['ordenBy'];
    } else {
      $ordenBy = '';
    }



    $productos = [];
    try {
      $query  = "SELECT productos.id_producto, productos.descripcion, productos.id_marca, productos.id_categoria, productos.modelo, productos.destacado, productos.precio, productos.imagen, productos.imagen_max, productos.id_sub_categoria, productos.estado_activo, 
      productos.modelo AS Producto, productos.id_producto AS Id, SUM(comentarios.calificacion) / COUNT(comentarios.calificacion) AS Ranqueo, comentarios.descripcion AS Comentario
                      
                      
                      FROM productos, comentarios, productos_campo_dinamico d    
                      WHERE productos.id_producto = comentarios.id_producto
                      GROUP BY productos.modelo
                      ORDER BY productos.modelo $ordenBy";

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
        //$producto->caracteristicas       = $row['value'];

        array_push($productos, $producto);
      }
      return $productos;
    } catch (PDOException $e) {
      return [];
    }
  }
}
