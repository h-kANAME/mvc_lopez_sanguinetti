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

    function crearMarca()
    {
      $datos = array(
        'nombre' => $_POST['nombre'],
  
      );
  
      $altaRotulo = $this->modelo->crearMarca($datos);
      if ($altaRotulo) {
        header("Location:" . constant('URL') . "gestionRotulos");
      } else {
        header("Location:" . constant('URL') . "gestionRotulos");
      }
    }

    function crearCategoria()
    {
      $datos = array(
        'nombre' => $_POST['nombre'],        
  
      );

       $altaRotulo = $this->modelo->crearCategoria($datos);
      if ($altaRotulo) {
        header("Location:" . constant('URL') . "gestionRotulos");
      } else {
        header("Location:" . constant('URL') . "gestionRotulos");
      }
    }

    function crearSubCategoria()
    {
      $datos = array(
        'nombre' => $_POST['nombre'],        
  
      );

       $altaRotulo = $this->modelo->crearSubCategoria($datos);
      if ($altaRotulo) {
        header("Location:" . constant('URL') . "gestionRotulos");
      } else {
        header("Location:" . constant('URL') . "gestionRotulos");
      }
    }

}
