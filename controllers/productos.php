<?php

class Productos extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->productos = '';
    }
    
    function render(){
      $productos = $this->modelo->getProductos();
      $this->view->productos = $productos;
      $this->view->render('productos/index'); //Apunto al directorio que voy a renderizar
    }

    //Aca sigo creando funciones

}


?>