<?php
    try {
        $connect = new PDO('mysql:host=' . 'localhost' . ';port=' .'3306' . ';dbname=' . 'abm', 'root', '');
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage();
        die();
    }

   if ($connect){
    }else{
        echo "Base de datos ;(";
    }

    ?>