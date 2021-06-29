<?php
class GestionProductos extends Controller{
    function __construct(){
        parent::__construct();
        
    }
    
    function render(){

        $this->view->render('admin/gestionProductos');
    }

}
?>