<?php
class GestionComentarios extends Controller{
    function __construct(){
        parent::__construct();
        
    }
    
    function render(){

        $this->view->render('admin/gestionComentarios');
    }

    function aprobarComentario()
    {
      $datos = array(
        'id_comentario' => $_POST['id_comentario'],
  
      );
  
      $accionComentario = $this->modelo->aprobarComentario($datos);
      if ($accionComentario) {
        header("Location:" . constant('URL') . "gestionComentarios");
      } else {
        header("Location:" . constant('URL') . "gestionComentarios");
      }
    }

    function desaprobarComentario()
    {
      $datos = array(
        'id_comentario' => $_POST['id_comentario'],
  
      );
  
      $accionComentario = $this->modelo->desaprobarComentario($datos);
      if ($accionComentario) {
        header("Location:" . constant('URL') . "gestionComentarios");
      } else {
        header("Location:" . constant('URL') . "gestionComentarios");
      }
    }

}
