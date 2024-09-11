<?php

namespace lib;

use PDO;
use Exception;
use PDOException;
use Dotenv\Dotenv;

class DatabaseConnexion
{
    private $host;
    private $dbname;
    private $username;
    private $password;
    private $pdo;

    public function __construct()
    {

       // Charger les variables d'environnement depuis le fichier .env

         $dotenv = Dotenv::createImmutable(dirname(__DIR__, 2)); 
         $dotenv->load();

        // // Lire les variables d'environnement
        // echo 'DB_HOST: ' . getenv('DB_HOST') . '<br>';
        // echo 'DB_NAME: ' . getenv('DB_NAME') . '<br>';
        // echo 'DB_USER: ' . getenv('DB_USER') . '<br>';
        // echo 'DB_PASS: ' . getenv('DB_PASS') . '<br>';

        //pbm de variables d'environnement contourné
        putenv('DB_HOST=localhost');
        putenv('DB_NAME=vacances_project');
        putenv('DB_USER=root');
        putenv('DB_PASS=');



      
       $dotenv->load();


        $this->host = getenv('DB_HOST');
        $this->dbname = getenv('DB_NAME');
        $this->username = getenv('DB_USER');
        $this->password = getenv('DB_PASS');

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

    public function executeQuery($query, $params = [])
    {
        try {
          //prépare
            $stmt = $this->pdo->prepare($query);
            //lie la query aux param
            $stmt->execute($params);
            //cherche les resultats
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            throw new Exception('Query execution failed');
        }
    }
}

/*  example d'utilisation de cette classe
try {
    $db = new DatabaseConnexion();
    $results = $db->executeQuery('SELECT * FROM users WHERE email = :email', ['email' => 'test@example.com']);
    print_r($results);
} catch (Exception $e) {
    echo $e->getMessage();
}*/


//modif eventuelles transformer cette classe en singleton

