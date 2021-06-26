<?php

class ContactoModelo extends Model
{

    public function __construct()
    {
        parent::__construct();
    }



    public function getContactos()
    {

        $contactos = [];
        try {
            $query  = "SELECT * FROM contacto";
            $con    = $this->db->connect();
            $con    = $con->query($query);

            while ($row = $con->fetch()) {

                $contacto = new Contacto();

                $contacto->id_sector           = $row['id_sector'];
                $contacto->nombre_sector           = $row['nombre_sector'];
                $contacto->mail_sector           = $row['mail_sector'];

                array_push($contactos, $contacto);
            }
            return $contactos;
        } catch (PDOException $e) {
            return [];
        }
    }
}
