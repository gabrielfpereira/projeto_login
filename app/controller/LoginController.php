<?php
//controlador da tela de login
class LoginController{
    // metodo que chama a tela de login
    public function index(){
        //verifica se tem uma sessao iniciada não permitindo assim acessar a pagina de login
        if(isset($_SESSION['id_usuario'])){
            require 'app/view/admin.html';
        }else{
            require 'app/view/login.html' ;
        }
      
    }

    // esse metodo vai pegar as informações do post e passar para a validação
    public function check(){
        //atribui as variaveis os POST que veio
        $email= addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);

        // verifica se os campos estão vazios
        if(!empty($email) && !empty($senha)){
            //instancia a classe User um /model
            $use = new User;
            //Seta as variaveis
            $use->setEmail($_POST['email']);
            $use->setSenha($_POST['senha']);
           
            // o try/catch foi feito caso a validação retorne algum erro
            try {
                //chama o metodo que vai validar as informações
                //verifica se tem validade se sim direciona para admin se não direciona para index login
                if($use->validate()){
                    header('location: http://localhost/projeto_login/admin/index');
                }else{
                    header('location: http://localhost/projeto_login/login/index');
                }

            } catch (\Exception $e) {
                //atualmente parece que aqui não esta funcionando
                header('location: http://localhost/projeto_login/login/index');
            }
        }else{
            $_SESSION['msg_error'] = "Preencha todos os campos";
            header('location: http://localhost/projeto_login/login/index');
        }

        
    }
}