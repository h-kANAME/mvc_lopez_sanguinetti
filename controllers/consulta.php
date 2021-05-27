<?php

class Consulta extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->alumnos = '';
     //   $this->view->render('consulta/index');
      //  echo "La ruta ingresado no existe";

    }
    
    function render(){
      $alumnos = $this->modelo->get();
      $this->view->alumnos = $alumnos;
      $this->view->render('consulta/index');
    }

    function eliminarAlumno(){
      $this->render();
    }
}


?>