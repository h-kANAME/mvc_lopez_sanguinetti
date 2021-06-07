<?php
include_once 'models/Producto.php';
include_once "models/Categoria.php";
include_once "models/Marca.php";

class ProductosModelo extends Model
{

    public function __construct()
    {
        parent::__construct();
    }

    

    public function getProductos(){

      if (isset($_REQUEST['tipo'])) {
        $ordenBy = $_REQUEST['tipo'];
      } else {
        $ordenBy = '';
      }

        $productos = [];
        try {
            $query  = "SELECT * FROM productos WHERE estado_activo = 1 ORDER BY modelo $ordenBy";
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

    
    public function getCategorias(){


        if (isset($_REQUEST['id_marca'])) {
          $id_marca = $_REQUEST['id_marca'];
        } else {
          $id_marca = '';
        }
    
        if (isset($_REQUEST['id_categoria'])) {
          $id_categoria = $_REQUEST['id_categoria'];
        } else {
          $id_categoria = '';
        }
    
        if (isset($_REQUEST['tipo'])) {
          $ordenBy = $_REQUEST['tipo'];
        } else {
          $ordenBy = '';
        }
    
        $categorias = [];
        try {
          $query  = "SELECT * FROM categorias WHERE estado_activo = 1";
          $con    = $this->db->connect();
          $con    = $con->query($query);
    
          while ($row = $con->fetch()) {
    
            $categoria = new Categoria();
    
            $categoria->id_categoria         = $row['id_categoria'];
            $categoria->nombre               = $row['nombre'];
            $categoria->estado_activo        = $row['estado_activo'];
            array_push($categorias, $categoria);
          }
          return $categorias;
        } catch (PDOException $e) {
          return [];
        }
      }

      public function getMarcas(){


        if (isset($_REQUEST['id_marca'])) {
          $id_marca = $_REQUEST['id_marca'];
        } else {
          $id_marca = '';
        }
    
        if (isset($_REQUEST['id_categoria'])) {
          $id_categoria = $_REQUEST['id_categoria'];
        } else {
          $id_categoria = '';
        }
    
        if (isset($_REQUEST['tipo'])) {
          $ordenBy = $_REQUEST['tipo'];
        } else {
          $ordenBy = '';
        }
    
        $marcas = [];
        try {
          $query  = "SELECT * FROM marcas WHERE estado_activo = 1";
          $con    = $this->db->connect();
          $con    = $con->query($query);
    
          while ($row = $con->fetch()) {
    
            $marca = new Marca();
    
            $marca->id_marca        = $row['id_marca'];
            $marca->nombre               = $row['nombre'];
            $marca->estado_activo        = $row['estado_activo'];
            array_push($marcas, $marca);
          }
          return $marcas;
        } catch (PDOException $e) {
          return [];
        }
      }
    

}
?>