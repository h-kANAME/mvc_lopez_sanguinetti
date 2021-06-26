<?php

class Contacto extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->contactos = '';
    }
    
    function render(){
       $contactos = $this->modelo->getContactos('');
       $this->view->contactos = $contactos;
       $this->view->render('contacto/index');
    }
}


?>