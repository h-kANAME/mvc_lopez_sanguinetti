<?php

class Productos extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->productos = '';
        $this->view->categorias = '';
        $this->view->marcas = '';        
    }
    
    function render(){
      $productos = $this->modelo->getProductos('');
      $categorias = $this->modelo->getCategorias();
      $marcas = $this->modelo->getMarcas();
      $this->view->productos = $productos;
      $this->view->categorias = $categorias;
      $this->view->marcas = $marcas;
      $this->view->render('productos/index'); //Apunto al directorio que voy a renderizar
    }

    //Aca sigo creando funciones

}


?>