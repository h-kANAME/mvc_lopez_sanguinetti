<?php

class GestionComentariosModelo extends Model
{

    public function __construct()
    {

        parent::__construct();
    }

    public function aprobarComentario($datos)
    {
        $id_comentario = $datos["id_comentario"];
        $aprobado = 1;

        if ($datos) {

            $sql = "UPDATE comentarios SET aprobado = '$aprobado' WHERE comentarios.id_comentario = $id_comentario;";
            $con = $this->db->connect();
            $gestionComentario = $con->exec($sql);


            if ($gestionComentario == false) {
                header("Location:" . constant('URL') . "gestionComentarios");
            } else {
                header("Location:" . constant('URL') . "gestionComentarios");
            }
        }
    }

    public function desaprobarComentario($datos)
    {
        $id_comentario = $datos["id_comentario"];
        $aprobado = 0;

        if ($datos) {

            $sql = "UPDATE comentarios SET aprobado = '$aprobado' WHERE comentarios.id_comentario = $id_comentario;";
            $con = $this->db->connect();
            $gestionComentario = $con->exec($sql);


            if ($gestionComentario == false) {
                header("Location:" . constant('URL') . "gestionComentarios");
            } else {
                header("Location:" . constant('URL') . "gestionComentarios");
            }
        }
    }

}
