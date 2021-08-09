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



        $query = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND activo = 1";
        $con = $this->db->connect();
        $datos = $con->query($query);

        if ($datos != null) {

            foreach ($datos as $row) {

                $activo = $row['activo'];
                $id_usuario = $row['id_usuario'];
                $salt = $row['salt'];
                $claveDba = $row['clave'];
            }

            // echo 'Ingresada por post: ' .  $clave . '<br>';
            // echo 'En la Base: ' . $claveDba . '<br>';

            $clave = $this->encrypt($clave, $salt);

            // echo 'Hasheada por mi: ' . $clave . '<br>';

            if ($clave == $claveDba) {

                session_start();

                $query = "SELECT u.nombre as Nombre, c.codigo AS Codigo, c.nombre AS Visibilidad
                            FROM usuarios u, usuarios_visibilidad v, visibilidad c
                            WHERE u.id_usuario = v.id_usuario
                            AND c.id_visibilidad = v.id_visibilidad
                            AND u.activo = 1
                            AND u.id_usuario = " . $id_usuario;

                $permisos = $con->query($query);

                foreach ($permisos as $codigos) {

                    $permisos = $codigos['Codigo'];
                }

                $_SESSION['usuario'] = $usuario;
                $_SESSION['permisos'] = $permisos;

                return true;
            }
        }
    }


    public function encrypt($clave, $salt)
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


    public function generate_string($input, $strength = 16)
    {

        $input_length = strlen($input);
        $random_string = '';
        for ($i = 0; $i < $strength; $i++) {
            $random_character = $input[mt_rand(0, $input_length - 1)];
            $random_string .= $random_character;
        }

        return $random_string;
    }

    public function userAdd($datos)
    {
        $nombre = $datos['nombre'];
        $apellido = $datos['apellido'];
        $usuario = $datos['usuario'];
        $clave = $datos['clave'];
        $tipo = $datos['tipo'];

        $permitted_chars = '0123456789#*abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        //Para el primero usaremos clave: foca
        $salt = $this->generate_string($permitted_chars, 15);
        $clave = $this->encrypt($clave, $salt);
        $activo = 0;

        $sql = "INSERT INTO usuarios (id_usuario, nombre, apellido, usuario, clave, tipo, salt, activo) 
         VALUES (NULL, '$nombre', '$apellido', '$usuario', '$clave', '$tipo', '$salt', '$activo');";
        $con    = $this->db->connect();
        $con    = $con->exec($sql);
    }

    public function userActivo($datos)
    {
        $id_usuario = $datos['id_usuario'];
        $activo = $datos['activo'];
        $visibilidad = $datos['visibilidad'];

        if ($activo == 'Inactivo') {
            $activo = 0;
        } elseif ($activo == 'Activo') {
            $activo = 1;
        }

        $sql = "UPDATE usuarios SET activo = $activo WHERE usuarios.id_usuario = $id_usuario";
        $con    = $this->db->connect();
        $con    = $con->exec($sql);

        $sqlVisibilidad = "INSERT INTO usuarios_visibilidad (id_usuario_visibilidad, id_usuario, id_visibilidad) VALUES (NULL, '$id_usuario', '$visibilidad')";
        $con    = $this->db->connect();
        $con    = $con->exec($sqlVisibilidad);
    }
}
