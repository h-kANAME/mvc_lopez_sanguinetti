<?php
class GestionRotulos extends Controller{
    function __construct(){
        parent::__construct();
        
    }
    
    function render(){

        $this->view->render('admin/gestionRotulos');
    }

    function editarMarca()
    {
      $datos = array(
        'id_marca' => $_POST['id_marca'],
        'nombre' => $_POST['nombre'],
        'estado' => $_POST['estado'],
  
      );

      echo '<h1>Controlador</h1>' . '<br>';

      echo '<pre>';
      var_dump($datos);
      echo '</pre>';
  
      $editarMarca = $this->modelo->editarMarca($datos);
      if ($editarMarca) {
        header("Location:" . constant('URL') . "gestionRotulos");
      } else {  
        header("Location:" . constant('URL') . "gestionRotulos");
      }
    }

    function crearRotulo()
    {
      $datos = array(
        'id_comentario' => $_POST['id_comentario'],
  
      );
  
      $altaRotulo = $this->modelo->desaprobarComentario($datos);
      if ($altaRotulo) {
        header("Location:" . constant('URL') . "gestionRotulos");
      } else {
        header("Location:" . constant('URL') . "gestionRotulos");
      }
    }

}
