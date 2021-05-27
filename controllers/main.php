<?php

class Main extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->destacados = '';
     //   $this->view->render('consulta/index');
      //  echo "La ruta ingresado no existe";

    }
    
    function render(){
      $destacados = $this->modelo->getDestacados();
      $this->view->destacados = $destacados;
      $this->view->render('main/index');
    }

}


?>