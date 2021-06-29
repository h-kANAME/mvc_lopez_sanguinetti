<?php
class AdminProductos extends Controller{
    function __construct(){
        parent::__construct();
        $this->view->productos = '';
    }
    
    function render(){
        $productos = $this->modelo->getProductosAdmin('');
        $this->view->productos = $productos;
        $this->view->render('admin/adminProductos');
    }

}
?>