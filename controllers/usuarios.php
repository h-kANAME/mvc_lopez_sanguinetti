<?php
class Usuarios extends Controller
{
  function __construct()
  {
    parent::__construct();
    $this->view->mensaje = '';
  }

  function render()
  {

    $this->view->render('admin/login');
  }

  function obtenerDatosPost()
  {

    $datos = array(
      'usuario'    => $_POST['usuario'],
      'clave'          => $_POST['clave'],
    );



    $credencialesPost = $this->modelo->validacionUsuario($datos);
    $mensaje = '';
    if (!$credencialesPost) {
      $mensaje = "El usuario no se pudo identificar";
    } else {
      //         $mensaje = "Usuario identificado"; 

    }
    $this->view->mensaje = $mensaje;
    $this->render();
  }
}
