<?php

namespace lib;

use PDO;
use Exception;
use PDOException;

class DatabaseConnexion
{
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $pdo;

    public function __construct()
    {
        $this->host = 'localhost';
        $this->dbname = 'vacances_project';
        $this->username = 'root';
        $this->password = "";

        $this->connect();
  

    }

    private function connect()
    {
        try {
          //Data Source Name, une chaîne qui contient les informations requises pour se connecter à la base de données
            $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8";
            $options = [
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ];

            $this->pdo = new PDO($dsn, $this->username, $this->password, $options);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception('Database connection failed');
        }
    }

    public function getPDO()
    {
        return $this->pdo;
    }

    

}
//soccuper de securiser les infos de la base de donnée
//modif pr transformer cette classe en singleton POUR QUE LA CONNEXION PDO NE SE FASSE PAS A CHAQUE FOIS QUE LA PAGE INDEX SOIT APPELEE