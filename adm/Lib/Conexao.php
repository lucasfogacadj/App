<?php



class Conexao
{
    private static $connection;

    private function __construct(){}

    public static function getConnection() {

        define('DB_DRIVER'      , "mysql");
        define('DB_NAME'        , "lpw_exemplo");
        define('DB_USER'        , "root");
        define('DB_HOST'        , "localhost");
        define('DB_PASSWORD'    , "");


        $pdoConfig  = DB_DRIVER . ":". "host=" . DB_HOST . ";";
        $pdoConfig .= "dbname=".DB_NAME.";";

        try {
            if(!isset($connection)){
                $connection =  new PDO($pdoConfig, DB_USER, DB_PASSWORD);
                $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            }
            return $connection;
        } catch (PDOException $e) {
            throw new Exception("Erro de conexão com o banco de dados",500);
        }
    }
}