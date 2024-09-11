<?php
require 'vendor/autoload.php';

use lib\DatabaseConnexion;

//Initialisation à la bdd
try{
  $bd = new DatabaseConnexion();
}catch(Exception $e){
  //terminer immédiatement l'exécution du script. utilisée pour gérer les erreurs / arrêter l'exécution si une certaine condition n'est pas remplie.
  die('Erreur de connexion à la base de données: ' . $e->getMessage());
}

//Ce fichier est utilisé comme routeur: il va diriger la demande vers le contrôleur approprié grace à des switch


require ('src/Templates/VueFiche.php');



