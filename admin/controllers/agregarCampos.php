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
