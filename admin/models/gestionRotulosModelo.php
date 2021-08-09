<?php

class GestionRotulosModelo extends Model
{

    public function __construct()
    {

        parent::__construct();
    }

    public function editarMarca($datos)
    {
        $id_marca = $datos["id_marca"];
        $nombre = $datos["nombre"];
        $estado = $datos["estado"];

        if ($estado == 'Activo') {
            $estado = 1;
        } else if ($estado == 'Inactivo') {
            $estado = 0;
        }

        if ($datos) {

            echo '<h1>Modelo</h1>' . '<br>';
            echo $sql = "UPDATE marcas SET nombre = '$nombre', estado_activo = $estado 
            WHERE marcas.id_marca = $id_marca;";
            die();
            $con = $this->db->connect();
            $editarMarca = $con->exec($sql);


            if ($editarMarca == false) {
                header("Location:" . constant('URL') . "editarRotulos");
            } else {
                header("Location:" . constant('URL') . "editarRotulos");
            }
        }
    }

    public function crearMarca($datos)
    {
        $id_comentario = $datos["id_comentario"];

        if ($datos) {

            $sql = "";
            $con = $this->db->connect();
            $crearMarca = $con->exec($sql);


            if ($crearMarca == false) {
                header("Location:" . constant('URL') . "gestionRotulos");
            } else {
                header("Location:" . constant('URL') . "gestionRotulos");
            }
        }
    }
}
