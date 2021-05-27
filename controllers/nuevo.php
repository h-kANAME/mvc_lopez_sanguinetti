<?php

class Nuevo extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->mensaje = '';
      //  echo "La ruta ingresado no existe";

    }

    function render(){
        $this->view->render('nuevo/index');
    }

    function insertarAlumno(){

        $datos = array(
            'nombreVariable'    => $_POST['nombre'],
            'apellido'          => $_POST['apellido'],
            'email'             => $_POST['email'],
            'img'               => $_POST['img'],
        );
        $insertar = $this->modelo->insert($datos);
        $mensaje = '';
        if (!$insertar){
            $mensaje = "ya existe el alumno que quiere insertar";

        }else{
            $mensaje = "el alumno fue insertado con exito"; 
        }
        $this->view->mensaje = $mensaje;
        $this->render();
    }
}


?>