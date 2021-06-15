 <?php
    try {
        $connect = new PDO('mysql:host=' . 'localhost' . ';port=' .'3306' . ';dbname=' . 'tp_prod', 'root', '');
    } catch (PDOException $e) {
        print "¡Error!: " . $e->getMessage();
        die();
    }
    ?>

 