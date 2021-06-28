<?php
class LoginModelo extends Model
{

    public function __construct()
    {

        parent::__construct();
    }


    //Identidico si el usuario existe
    public function validacionUsuario($datos)
    {

        $usuario = $datos['usuario'];
        $clave = $datos['clave'];

        $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
        $con = $this->db->connect();
        $datos = $con->query($query);

        if($datos != null){

        
        foreach ($datos as $prueba) {


            // if ($usuario == $_POST['usuario'] && $clave == $_POST['clave']) {

            session_start();            

            $query = "SELECT u.nombre as Nombre, c.codigo AS Codigo
                          FROM usuarios u, usuarios_visibilidad v, visibilidad c
                          WHERE u.id_usuario = v.id_usuario
                          AND c.id_visibilidad = v.id_visibilidad
                          AND u.id_usuario = " . $prueba['id_usuario'];

            $permisos = $con->query($query);

            foreach ($permisos as $codigos) {

                $permisos = $codigos['Codigo'];
            }

            $_SESSION['usuario'] = $prueba['usuario'];
            $_SESSION['permisos'] = $permisos;

            // echo  $_SESSION['usuario'] . '<br>';
            // echo  $_SESSION['permisos'];


            //  } else {
            //  return false;
            //}
        }
        return true;
    }else{

        
    }

    }


    // public function login($datos)
    // {
    //     $sql = "SELECT id_usuario, nombre, apellido, usuario, clave, tipo, salt, activo
    //            FROM usuarios WHERE activo = 1 AND usuario = '" . $datos['usuario'] . "'";


    //     $dat = $this->con->query($sql)->fetch(PDO::FETCH_ASSOC);

    //     if (isset($dat['id_usuario'])) {
    //         echo 'entro';
    //         if ($this->encrypt($dat['clave'], $dat['salt']) == $dat['clave']) {

    //             $_SESSION['usuario'] = $dat;
    //             $query = "SELECT u.id_usuario as ID, v.id_usuario_visibilidad AS Visibilidad
    //             FROM usuarios u, usuarios_visibilidad v
    //             WHERE u.id_usuario = v.id_usuario
    //             AND u.id_usuario = " . $dat['id_usuario'];

    //             $permisos = array();
    //             foreach ($this->con->query($query) as $key => $value) {
    //                 $permisos['codigo'][$key] = $value['codigo'];
    //             }

    //             $_SESSION['usuario']['permisos'] = $permisos;
    //         }
    //     }
    // }

    private function encrypt($clave, $salt)
    {
        $clave .= $salt;
        return hash('md5', $clave);
    }

    public function notLogged()
    {
        if (!isset($_SESSION['usuario'])) {
            return true;
        }
        return false;
    }

    public function userAdd($datos)
    {
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $usuario = $datos['usuario'];
        $clave = $datos['clave'];
        $tipo = $datos['tipo'];


        $permitted_chars = '0123456789#*abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        function generate_string($input, $strength = 10)
        {
            $input_length = strlen($input);
            $random_string = '';
            for ($i = 0; $i < $strength; $i++) {
                $random_character = $input[mt_rand(0, $input_length - 1)];
                $random_string .= $random_character;
            }

            return $random_string;
        }

        $salt = generate_string($permitted_chars);
        $activo = $datos['activo'];

        $sql = "INSERT INTO usuarios (id_usuario, nombre, apellido, usuario, clave, tipo, salt, activo) 
        VALUES (NULL, '$nombre', '$apellido', '$usuario', '$clave', '$tipo', '$salt', '$activo');";
        $con    = $this->db->exec();
        $con    = $con->exec($sql);
    }
}
