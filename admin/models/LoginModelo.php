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

        foreach ($datos as $prueba) {

            file_put_contents('usuario.json', json_encode($prueba));
          

            echo 'Usuario: ' . $prueba['usuario'] = $usuario . '<br>';
            echo 'Clave: ' . $prueba['salt'];

            if ($usuario == $_POST['usuario'] && $clave == $_POST['clave']) {
               
               
                header("location:../adminInicio");
                
            } else {
                header("location:../login");
            }
        }
    }


    public function login($datos)
    {
        $sql = "SELECT id_usuario, nombre, apellido, usuario, clave, tipo, salt, activo
               FROM usuarios WHERE activo = 1 AND usuario = '" . $datos['usuario'] . "'";


        $dat = $this->con->query($sql)->fetch(PDO::FETCH_ASSOC);

        if (isset($dat['id_usuario'])) {
            echo 'entro';
            if ($this->encrypt($dat['clave'], $dat['salt']) == $dat['clave']) {

                $_SESSION['usuario'] = $dat;
                $query = "SELECT u.id_usuario as ID, v.id_usuario_visibilidad AS Visibilidad
                FROM usuarios u, usuarios_visibilidad v
                WHERE u.id_usuario = v.id_usuario
                AND u.id_usuario = " . $dat['id_usuario'];

                $permisos = array();
                foreach ($this->con->query($query) as $key => $value) {
                    $permisos['codigo'][$key] = $value['codigo'];
                }

                $_SESSION['usuario']['permisos'] = $permisos;
            }
        }
    }

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
