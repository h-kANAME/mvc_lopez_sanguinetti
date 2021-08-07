<?php

class AgregarCampos extends Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    function render()
    {
        $this->view->render('admin/applyCamposDinamicos');
    }

    function productoNuevo()
    {
        $datos = array(

            'modelo'          => $_POST['modelo'],
            'descripcion'     => $_POST['descripcion'],
            'precio'          => $_POST['precio'],
            'id_categoria'      => $_POST['id_categoria'],
            'id_sub_categoria'      => $_POST['id_sub_categoria'],
            'id_marca'          => $_POST['id_marca'],
            'imagen'          => $_POST['imagen'],
            'imagen_max'          => $_POST['imagen_max'],
          //  'archivo_imagen' => $_FILES['archivo_imagen'],
          //  'archivo_imagen_max' => $_FILES['archivo_imagen_max'],


        );

        $productoNuevo = $this->modelo->productoNuevo($datos);
    }

    function editarProducto()
    {
        $datos = array(
            'id_producto'     => $_POST['id_producto'],
            'modelo'          => $_POST['modelo'],
            'descripcion'     => $_POST['descripcion'],
            'precio'          => $_POST['precio'],
            'categorias'      => $_POST['categorias'],
            'marcas'          => $_POST['marcas'],

        );

        $activarCampos = $this->modelo->editarProducto($datos);
    }

    function activarProducto()
    {
        $datos = array(
            'id_producto' => $_POST['id_producto'],
            'estado_activo'          => $_POST['estado_activo'],

        );

        $activarCampos = $this->modelo->activarProducto($datos);
    }

    function agregarCampos()
    {
        $datos = array(
            'id_producto' => $_POST['id_producto'],
            'campos'          => $_POST['campos'],
            'type'        => $_POST['type'],
            'value'          => $_POST['value'],

        );

        $camposDinamicosAgregar = $this->modelo->agregarCampos($datos);
    }

    function activarCampos()
    {
        $datos = array(
            'id_producto_campo_dinamico' => $_POST['id_producto_campo_dinamico'],
            'estado_activo'          => $_POST['estado_activo'],

        );

        $activarCampos = $this->modelo->activarCampos($datos);
    }

    function activarCamposComentarios()
    {
        $datos = array(
            'id_comentarios_campo_dinamico' => $_POST['id_comentario_campo_dinamico'],
            'estado_activo'          => $_POST['estado_activo'],

        );

        $activarCamposComentarios = $this->modelo->activarCamposComentarios($datos);
    }
}
