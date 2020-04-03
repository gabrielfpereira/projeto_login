<?php
class User{
    private $id;
    private $nome;
    private $email;
    private $senha;

    public function validate(){
        //Essa função irá validar e verificar se existe esse usuario e leva-lo a area admin
    }

    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getNome(){
        return $this->nome;
    }

    public function setEmail($email){
        $this->email = $email;
    }
    public function getEmail(){
        return $this->email;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }
    public function getSenha(){
        return $this->senha;
    }
}