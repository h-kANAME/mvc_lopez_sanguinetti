<?php

class AdminInicio extends Controller{
    function __construct(){
        parent::__construct();
    }
    
    function render(){
       $this->view->render('admin/adminInicio');
    }
}