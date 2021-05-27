<?php
class Controller{

    function __construct()
    {
       // echo "<p> BASE DEL CONTROLADOR </p>";
        $this->view = new View();
    }

    function loadModel($model){
        $url = 'models/'.$model.'modelo.php';
        if (file_exists($url)){
            require $url;
            $modelName = $model.'Modelo';//Como deberia llamarse mi modelo
            $this->modelo = new $modelName();
        }
    }

}
