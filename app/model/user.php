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
                //inicia uma sessao e cria um id usuario e um nome para ser usado na pagina admin
                session_start();
                $_SESSION['id_usuario'] = $dados['id_usuario'];
                $_SESSION['nome_usuario'] = $dados['nome'];                
                return true;
            }
            return false;
        }else{
            //return false;
            throw new \Exception("Login inválido");
        }

    }

    public function cadastrar(){

        $conn = Conexao::getConect();
        $sql = 'SELECT id_usuario FROM usuarios WHERE email = :email';
        $stmt = $conn->prepare($sql);
        $stmt->bindValue(':email', $this->email);
        $stmt->execute();
        // var_dump($stmt->rowCount());
        // die();
        if($stmt->rowCount()){
            echo 'O usuario já existe!';
        }else{
            $sql = 'INSERT INTO usuarios(nome,email,senha) VALUE(:nome,:email,:senha)';
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(':nome',$this->nome);
            $stmt->bindValue(':email',$this->email);
            $stmt->bindValue(':senha',password_hash($this->senha, PASSWORD_DEFAULT));
            $stmt->execute();
            return true;
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