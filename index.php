<?php
require 'vendor/autoload.php';

use Controllers\UserController;
use lib\DatabaseConnexion;


//Connexion a la BDD
try{
  $database = new DatabaseConnexion();
$pdo = $database->getPDO();
  
}catch(Exception $e){
  //terminer immédiatement l'exécution du script. utilisée pour gérer les erreurs / arrêter l'exécution si une certaine condition n'est pas remplie.
  die('Erreur de connexion à la base de données: ' . $e->getMessage());
}

//Ce fichier est utilisé comme routeur: il va diriger la demande vers le contrôleur approprié grace à  switch

$action = isset($_GET['action']) ? $_GET['action'] : 'Inscription';

$controller = new UserController( $pdo);

switch ($action){
  case'Inscription' :
    $controller->register();
  break;
  case 'Connexion' :
    $controller->signIn();
  break;
}  









