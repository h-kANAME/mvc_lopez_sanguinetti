<?php

class AgregarCamposModelo extends Model
{

    public function __construct()
    {

        parent::__construct();
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
        $campos = $datos["campos"]; //listado de campos dinamiccos
        $type = $datos["type"]; //el type que llevara el campo, si es que contiene
        $value = $datos["value"]; //pudiera ser el value /placeholsder del campo
        $estado_activo = 0;


        if ($campos == 'input') {

            $sql = "INSERT INTO `productos_campo_dinamico` (`id_producto_campo_dinamico`, `id_producto`, `id_campo_dinamico`, `value`, `type`, `estado_activo`)
                              VALUES (NULL, '$id_producto', '1', '$value', '$type', '$estado_activo')";

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
        $id_comentarios_campo_dinamico = $datos["id_comentarios_campo_dinamico"];
        $estado_activo = $datos["estado_activo"];

        echo '<pre>';
        var_dump($datos);
        echo '</pre>';


        if ($datos) {

            $sql = "UPDATE comentarios_campo_dinamico SET estado_activo = '$estado_activo' WHERE comentarios_campo_dinamico.id_comentario_campo_dinamico = $id_comentarios_campo_dinamico";

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
