<?php

require_once 'controllers/errores.php';

class App{

    function __construct(){
      //  echo "<p>Nueva App</p>";

        $url = isset($_GET['url']) ? $_GET['url']: null;
        $url = rtrim($url, '/');
        $url = explode('/',$url);
        $ruta = empty($url[0]) ? 'main' : $url[0];
       // var_dump($url);
        
        $archivocontrolador = 'controllers/' . $ruta . '.php';
        //buscando el controlador
        if(file_exists($archivocontrolador)){

            require_once $archivocontrolador;
            $controlador = new $ruta;
            $controlador->loadModel($ruta);
            //hay un metodo
            if (isset($url[1])){
                $controlador->{$url[1]}();
            }else{
                $controlador->render();
            }
        }else{
                $controlador = new Errores();
        }
       
        
    }

}

?>