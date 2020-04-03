<?php
class Conexao
{
    public static $pdo;

    public static function getConect()
    {
        try {
            if (!isset(self::$pdo)) {
                self::$pdo = new PDO('mysql: host=localhost, dbname=projeto_login','root','');
            }
            return self::$pdo;
        } catch (PDOException $e) {
            $msg = 'Eror'. $e->getMessage();
            return $msg;
        }
        
    }
}

