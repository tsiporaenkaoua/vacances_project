<?php

session_start();

require 'vendor/autoload.php';

use Controllers\UserController;
use lib\DatabaseConnexion;
use Controllers\DossierController;


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

$controllerUser = new UserController( $pdo);
$controllerDossier = new DossierController($pdo);

switch ($action){
  case'Inscription' :
    $controllerUser->register();
  break;
  case 'Connexion' :
    $controllerUser->signIn();
  break;
  case 'ShowFolders' :
    $controllerDossier->showFolders();
  break;
  case 'CreateFolder' :
    $controllerDossier->createFolder();
  break;
}  









