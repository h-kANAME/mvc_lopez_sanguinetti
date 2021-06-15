<?php
class UsuariosModelo extends Model
{

    public function __construct()
    {

        parent::__construct();
    }


    public function validacionUsuario($datos)
    {

        $usuario = $datos['usuario'];
        $clave = $datos['clave'];

        // echo '<pre>';
        // var_dump($datos);
        // echo '</pre>';

        $query = "SELECT id_usuario, usuario, clave, tipo, activo, salt FROM usuarios WHERE usuario = '$usuario' AND salt = '$clave'";

        $con = $this->db->connect();
        $datos = $con->query($query);

        foreach ($datos as $prueba) {
            echo 'Usuario: ' . $prueba['usuario'] = $usuario . '<br>';
            echo 'Clave: ' . $prueba['salt'];

            if ($usuario == $_POST['usuario'] && $clave == $_POST['clave']) {

                header("location:../adminInicio");
            } else {
                header("location:../main");
            }
        }
    }

    private function encrypt($clave, $salt)
    {

        $clave .= $salt;
        return hash('md5', $clave);
    }

    public function userlogin($data)
    {
        $sql = "SELECT id_usuario,nombre,apellido,email,usuario,clave,activo,salt
               FROM usuarios WHERE activo = 1 AND usuario = '" . $data['usuario'] . "'";
        $datos = $this->con->query($sql)->fetch(PDO::FETCH_ASSOC);
        if (isset($datos['id_usuario'])) {
            if ($this->encrypt($data['clave'], $datos['salt']) == $datos['clave']) {

                $_SESSION['usuario'] = $datos;
                $query = "SELECT DISTINCT cod, seccion FROM permisos
                          INNER JOIN perfil_permisos ON (perfil_permisos.permiso_id = permisos.id)
                          INNER JOIN usuarios_perfiles ON (usuarios_perfiles.perfil_id = perfil_permisos.perfil_id)
                          WHERE usuario_id = " . $datos['id_usuario'];
                $permisos = array();
                foreach ($this->con->query($query) as $key => $value) {
                    $permisos['cod'][$key] = $value['cod'];
                    $permisos['seccion'][$key] = $value['seccion'];
                }

                $_SESSION['usuario']['permisos'] = $permisos;
            }
        }
    }

    public function userNotLogged()
    {
        if (!isset($_SESSION['usuario'])) {
            return true;
        }
        return false;
    }
}
