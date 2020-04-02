<?php
require 'Conexao.php';
$conn = new Conexao;
$conn->getConect();

if(isset($_POST['email'])){
    $nome = addslashes($_POST['nome']);
    $email = addslashes($_POST['email']);
    $senha = addslashes($_POST['senha']);

    if(!empty($nome) && !empty($email) && !empty($senha)){
        $linha = $conn->pdo->query("SELECT id_usuario FROM usuarios WHERE email= '$email'");
        var_dump($linha);
        if($linha->rowCount() != 0){
            echo "usuario já cadastrado";
        }else{
            $retorno = Conexao::$pdo->prepare("INSERT INTO usuarios(nome,email,senha) VALUES(:n,:e,:s)");
            $retorno->bindValue(':n',$nome);
            $retorno->bindValue(':e',$email);
            $retorno->bindValue(':s',$senha);
            $retorno->execute();
            echo "cadastro foirealizado";
        }

        
    }else{
        echo "Preencha todos os campos";
    }
}