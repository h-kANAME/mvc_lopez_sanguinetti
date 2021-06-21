<?php

class Login extends Controller
{
  function __construct()
  {
    parent::__construct();

    $this->view->mensaje = '';
  }

  function render()
  {

    $this->view->render('login/index');
  }

  function obtenerDatosPost()
  {

    $datos = array(
      'usuario'        => $_POST['usuario'],
      'clave'          => $_POST['clave'],

    );
?>
    <p class="text-white"><?php echo 'Usuario: ' . $_POST['usuario']; ?></p>
    <p class="text-white"><?php echo 'Clave: ' . $_POST['clave']; ?></p>
    <?php


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

  function userAdd()
  {
    $datos = array(
      'nombre' => $_POST['nombre'],
      'apellido'          => $_POST['apellido'],
      'usuario'        => $_POST['usuario'],
      'clave'          => $_POST['clave'],
      'tipo'          => $_POST['tipo'],
      'activo'          => $_POST['activo'],


    );

    $altaUsuario = $this->modelo->userAdd($datos);
    $mensaje = '';
    if (!$altaUsuario) {
      $mensaje = "El usuario no se pudo dar de alta";
    } else {
               $mensaje = "Usuario creado"; 

    }
    $this->view->mensaje = $mensaje;
    $this->render();
  }
}
