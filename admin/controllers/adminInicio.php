<?php

class AdminInicio extends Controller{
    function __construct(){
        parent::__construct();
        session_start();

        if (!isset($_SESSION['usuario'])){
            $this->view->render('login/index');
        }
    }
    
    function render(){
       $this->view->render('admin/adminInicio');
    }
}