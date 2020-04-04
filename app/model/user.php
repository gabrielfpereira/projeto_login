<?php
use app\model\Conexao;
class User{
    private $id;
    private $nome;
    private $email;
    private $senha;

    //Essa função irá validar e verificar se existe esse usuario e leva-lo a area admin
    public function validate(){
        //conectando com banco de dados
        $conn = Conexao::getConect(); //conecta
        $sql = 'SELECT * FROM usuarios WHERE email = :email '; //query
        $stmt = $conn->prepare($sql); //prepara a query
        $stmt->bindValue(':email',$this->email); // altera o campo :email pela variavel
        $stmt->execute(); // executa a query

        //verifica se teve algum retorno da query
        if($stmt->rowCount()){
            //transforma em um array
            $dados = $stmt->fetch();
            //verifica se senha bate       
            if(password_verify($this->senha, $dados['senha'])){
                //inicia uma sessao e cria um id usuario
                session_start();
                $_SESSION['id_usuario'] = $dados['id_usuario'];
                return true;
            }
            return false;
        }else{
            //return false;
            throw new \Exception("Login inválido");
        }

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