<?php

class Database{
    private $host;
    private $db;
    private $user;
    private $password;
    private $port;

    public function __construct()
    {
        $this->host = constant('HOST');
        $this->db = constant('DB');
        $this->user = constant('USER');
        $this->password = constant('PASS');
        $this->port = constant('PORT');

    }

    public function connect(){

        try{
            $conexion = 'mysql:host='.$this->host.';port='.$this->port.';dbname='.$this->db;
            $options = [
                PDO::ATTR_ERRMODE           => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES  => false,
            ];

            $pdo = new PDO($conexion, $this->user , $this->password , $options);
            return $pdo;

        }catch(PDOException $e){
            print_r('Error en Conexion : '. $e->getMessage());
        }
    }
}

?>