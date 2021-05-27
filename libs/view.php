<?php

class View{

    function __construct()
    {
        //echo "<p>Mi nueva Vista</p>";
    }

    function render($nombre){
        require 'views/' . $nombre . '.php';
    }

}


?>