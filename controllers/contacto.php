<?php

class Contacto extends Controller
{
    function __construct()
    {
        parent::__construct();
        $this->view->contactos = '';
        $this->view->msjPantalla = '';
    }

    function render()
    {
        $contactos = $this->modelo->getContactos('');
        $this->view->contactos = $contactos;
        $this->view->render('contacto/index');
    }

    function obtenerDatosCorreo()
    {

        $nombre             = $_POST['nombre'];
        $apellido           = $_POST['apellido'];
        $telefono           = $_POST['telefono'];
        $correo             = $_POST['correo'];
        $area               = $_POST['area'];
        $mensaje            = $_POST['mensaje'];


        if (isset($nombre) && isset($apellido) && isset($telefono) && isset($correo) && isset($area) && isset($mensaje)) {

            include_once('views/contacto/envios.php');
        } else {

            echo 'Faltan datos para enviar el correo';
        }

        // $this->view->msjPantalla = $msjPantalla;
        // $this->render();
    }
}
