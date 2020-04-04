<?php
class AdminController{

    public function index(){
        require 'app/view/admin.html';
    }

    public function close(){
        session_unset();
        session_destroy();
        header('location: ../login/index');
    }
    
}