<?php
class AdminController{

    public function index(){
        if(isset($_SESSION['id_usuario'])){
            require 'app/view/admin.php';
        }else{
            require 'app/view/login.html';
        }
        
    }

    public function close(){
        session_unset();
        session_destroy();
        header('location: http://localhost/projeto_login/login/index');
    }
    
}