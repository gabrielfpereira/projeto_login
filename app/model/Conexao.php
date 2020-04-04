<?php
namespace app\model;
//Essa classe é responsavel por fazer a conexao com o banco de dados
// com classe abstract não é preciso que seja instaciado a classe Conexao
abstract class Conexao
{
    public static $pdo;

    public static function getConect()
    {

        if (!isset(self::$pdo)) {
            self::$pdo = new \PDO('mysql: host=localhost; dbname=projeto_login', 'root', '');
        }
        return self::$pdo;
       
        
    }
}

