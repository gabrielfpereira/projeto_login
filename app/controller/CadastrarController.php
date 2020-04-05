<?php

use app\model\Conexao;

class CadastrarController{
    public function index(){
        require 'app/view/cadastrar.html';
    }

    public function check(){
        $nome = addslashes($_POST['nome']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        if(!empty($nome) && !empty($email) && !empty($senha)){
            $use = new User;
            $use->setNome($nome);
            $use->setEmail($email);
            $use->setSenha($senha);
            
            if($use->cadastrar()){
                header('location: http://localhost/projeto_login/login/index');
            }else{
                echo 'Fallha ao cadastrar';
            }
        }else{
            echo 'Preencha todos os campos!!';
        }
    }
}