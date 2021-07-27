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

        /*
        
        */
        $datos = array(
            'id_producto_campo_dinamico' => $_POST['id_producto_campo_dinamico'],
            'estado_activo'          => $_POST['estado_activo'],

        );

        $activarCampos = $this->modelo->activarCampos($datos);
    }

    function activarCamposComentarios()
    {

        /*
        
        */
        $datos = array(
            'id_comentarios_campo_dinamico' => $_POST['id_comentario_campo_dinamico'],
            'estado_activo'          => $_POST['estado_activo'],

        );

        $activarCamposComentarios = $this->modelo->activarCamposComentarios($datos);
    }
}
