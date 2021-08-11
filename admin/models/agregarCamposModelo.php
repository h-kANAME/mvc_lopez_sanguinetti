<?php

class AgregarCamposModelo extends Model
{

    public function __construct()
    {

        parent::__construct();
    }

    public function productoNuevo($datos)
    {

        $modelo = $datos["modelo"];
        $descripcion = $datos["descripcion"];
        $precio = $datos["precio"];
        $id_categoria = $datos["id_categoria"];
        $id_sub_categoria = $datos["id_sub_categoria"];
        $id_marca = $datos["id_marca"];
        $imagen = 'public/img/Hardware/' . $datos["imagen"];
        $imagen_max = 'img/Hardware/Max/' . $datos["imagen_max"];
        $estado_activo = 0;

        echo '<pre>';
        var_dump($datos);
        echo '</pre>';

        // $_FILES['archivo_imagen'];
        // //$nombre = $_FILES['archivo']['name'];
        //  $guardado = $_FILES['imagen']['tmp_name'];

        //  if (file_exists('public')) {
        //      move_uploaded_file($guardado, 'public/img/Hardware/' . $datos['imagen']);
        //  } else {
        //      die();
        //  }

        //  $_FILES['archivo_imagen_max'];
        //  //$nombre = $_FILES['archivo']['name'];
        //  $guardado = $_FILES['imagen_max']['tmp_name'];

        //  if (file_exists('public')) {
        //      move_uploaded_file($guardado, 'img/Hardware/Max/' . $datos['imagen_max']);
        //  } else {
        //      die();
        //  }

        if ($datos) {

            echo $sql = "INSERT INTO productos (id_producto, descripcion, id_marca, id_categoria, modelo, destacado, precio, imagen, imagen_max, id_sub_categoria, estado_activo)
                    VALUES (NULL, '$descripcion', '$id_marca', '$id_categoria', '$modelo', 'false', ' $precio', ' $imagen', '$imagen_max', '$id_sub_categoria', '$estado_activo');";

            $con = $this->db->connect();
            $productoNuevo = $con->exec($sql);

            if ($productoNuevo == false) {
                header("Location:" . constant('URL') . "adminProductos");
            } else {
                header("Location:" . constant('URL') . "adminProductos");
            }
        }
    }

    public function editarProducto($datos)
    {
        $id_producto = $datos["id_producto"];
        $modelo = $datos["modelo"];
        $descripcion = $datos["descripcion"];
        $precio = $datos["precio"];
        $categorias = $datos["categorias"];
        $marcas = $datos["marcas"];

        if ($datos) {

            $sql = "UPDATE productos SET 
                    modelo = '$modelo',
                    descripcion = '$descripcion',
                    precio = '$precio',
                    id_categoria = $categorias,
                    id_marca = $marcas
                    WHERE productos.id_producto = $id_producto";

            echo '<pre>';
            var_dump($datos);
            echo '</pre>';

            $con = $this->db->connect();

            echo $sql;
            $editarProducto = $con->exec($sql);


            if ($editarProducto == false) {
                header("Location:" . constant('URL') . "adminProductos");
            } else {
                header("Location:" . constant('URL') . "adminProductos");
            }
        }
    }

    public function activarProducto($datos)
    {
        $id_producto = $datos["id_producto"];
        $estado_activo = $datos["estado_activo"];

        if ($datos) {

            $sql = "UPDATE productos SET estado_activo = '$estado_activo' WHERE productos.id_producto = $id_producto";
            $con = $this->db->connect();
            $activarProducto = $con->exec($sql);


            if ($activarProducto == false) {
                header("Location:" . constant('URL') . "adminProductos");
            } else {
                header("Location:" . constant('URL') . "adminProductos");
            }
        }
    }


    public function agregarCampos($datos)
    {
        $id_producto = $datos["id_producto"];
        $value = $datos["value"]; //pudiera ser el value /placeholsder del campo
        $estado_activo = 0;


        if ($datos) {
            //PR
            $sql = "INSERT INTO productos_campo_dinamico (id_producto_campo_dinamico, id_producto, id_campo_dinamico, value, estado_activo)
                              VALUES (NULL, '$id_producto', '1', '$value', '$estado_activo')";

            $con = $this->db->connect();
            $camposDinamicosAgregar = $con->exec($sql);


            if ($camposDinamicosAgregar == false) {
                header("Location:" . constant('URL') . "adminProductos");
            } else {
                header("Location:" . constant('URL') . "adminProductos");
            }
        }
    }

    public function agregarCamposComentarios($datos)
    {
        $id_producto = $datos["id_producto"];
        $name = $datos["name"];
        $value = $datos["value"];
        $campos = $datos["campos"];
        $palabras = $datos["palabras"];
        $estado_activo = 0;


        if ($campos == 'select') {
            $c = 3;
        } else if ($campos == 'input') {
            $c = 1;
        }

        // echo $campos . '<br>';
        // echo $c;

        // die();
        // echo '<pre>';
        // var_dump($datos, true);
        // echo '</pre>';

        if ($datos) {
                         // INSERT INTO `comentarios_campo_dinamico` (`id_comentario_campo_dinamico`, `id_producto`, `nombre`, `value`, `palabras`, `type`, `activo`)
                        // VALUES (NULL, '18', 'Colores', ', Color Rojo, Color Verde', '2', '3', '0');

            echo    $sql = "INSERT INTO comentarios_campo_dinamico (id_comentario_campo_dinamico, id_producto, nombre, value, palabras, type, activo)
                    VALUES (NULL, '$id_producto', '$name', '$value', '$palabras', '$c', '$estado_activo');";

            $con = $this->db->connect();
            $camposDinamicosAgregar = $con->exec($sql);


            if ($camposDinamicosAgregar == false) {
                header("Location:" . constant('URL') . "adminProductos");
            } else {
                header("Location:" . constant('URL') . "adminProductos");
            }
        }
    }

    public function activarCampos($datos)
    {
        $id_producto_campo_dinamico = $datos["id_producto_campo_dinamico"];
        $estado_activo = $datos["estado_activo"];


        if ($datos) {

            $sql = "UPDATE productos_campo_dinamico SET estado_activo = '$estado_activo' WHERE productos_campo_dinamico . id_producto_campo_dinamico = $id_producto_campo_dinamico";
            $con = $this->db->connect();
            $activarCampo = $con->exec($sql);


            if ($activarCampo == false) {
                header("Location:" . constant('URL') . "adminProductos");
            } else {
                header("Location:" . constant('URL') . "adminProductos");
            }
        }
    }

    public function activarCamposComentarios($datos)
    {
        $id_comentarios_campo_dinamico = $datos["id_comentario_campo_dinamico"];
        $estado_activo = $datos["activo"];
      
        // echo '<pre>';
        // var_dump($datos);
        // echo '</pre>';
        // die();

        if ($datos) {

            $sql = "UPDATE comentarios_campo_dinamico SET activo = '$estado_activo' WHERE comentarios_campo_dinamico.id_comentario_campo_dinamico = $id_comentarios_campo_dinamico";

            $con = $this->db->connect();
            $activarCampo = $con->exec($sql);


            if ($activarCampo == false) {
                header("Location:" . constant('URL') . "adminProductos");
            } else {
                header("Location:" . constant('URL') . "adminProductos");
            }
        }
    }
}
