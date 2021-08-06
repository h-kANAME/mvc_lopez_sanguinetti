<?php
include_once 'models/Producto.php';
include_once "models/Categoria.php";
include_once "models/Marca.php";
include_once 'models/SubCategoria.php';
include_once 'models/Ranqueo.php';
class ProductosModelo extends Model
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
                       FROM productos, comentarios
                       WHERE productos.id_producto = comentarios.id_producto
                       AND productos.estado_activo = 1
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
        $producto->rank                  = $row['Ranqueo'];
        array_push($productos, $producto);
      }
      return $productos;
    } catch (PDOException $e) {
      return [];
    }
  }


  public function getCategorias()
  {


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


  public function getMarcas()
  {



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

  public function getSubCategorias()
  {



    $subCategorias = [];
    try {
      $query  = "SELECT * FROM `sub_categorias` WHERE estado_activo = 1";
      $con    = $this->db->connect();
      $con    = $con->query($query);

      while ($row = $con->fetch()) {

        $subCategoria = new SubCategoria();

        $subCategoria->id_sub_categoria         = $row['id_sub_categoria'];
        $subCategoria->nombre               = $row['nombre'];
        $subCategoria->estado_activo        = $row['estado_activo'];
        array_push($subCategorias, $subCategoria);
      }
      return $subCategorias;
    } catch (PDOException $e) {
      return [];
    }
  }


  public function getRanqueoProductos()
  {

    $ranqueos = [];
    try {
      $query  = "SELECT productos.modelo AS Producto, productos.id_producto AS Id, SUM(comentarios.calificacion) / COUNT(comentarios.calificacion) AS Ranqueo, comentarios.descripcion AS Comentario
                 FROM productos, comentarios
                 WHERE productos.id_producto = comentarios.id_producto
                 AND productos.estado_activo = 1
                 GROUP BY productos.modelo";
                 
      $con    = $this->db->connect();
      $con    = $con->query($query);

      while ($row = $con->fetch()) {

        $ranqueo = new Ranqueo();

        $ranqueo->producto           = $row['Producto'];
        $ranqueo->calificacion           = $row['Ranqueo'];
        $ranqueo->id_producto            = $row['Id'];
        array_push($ranqueos, $ranqueo);
      }
      return $ranqueos;
    } catch (PDOException $e) {
      return [];
    }
  }

}

