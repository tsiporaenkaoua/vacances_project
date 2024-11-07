<?php
namespace Controllers;

use Models\Fiche;

class FicheController{

  private $model;

  public function __construct($pdo){
    $this->model = new Fiche($pdo);
  }

  public function showFiles(){
    if ($_SERVER['REQUEST_METHOD']==='GET') {
    $_SESSION['idDossier'] = htmlspecialchars($_GET['idDossier']);
    $files = $this->model->listFiles($_SESSION['idDossier']);
    $nameDossier = $this->model->getNameDossier($_SESSION['idDossier']);
    //print_r($files);
    //print_r($nameDossier);
    require './src/Templates/VueContenuDoss.php';
    }
  }

  public function createFile(){
    if ($_SERVER['REQUEST_METHOD']==='POST') {
      //print_r($_SESSION);
      //print_r($_POST);
      $name = htmlspecialchars($_POST['name']);
      $date = htmlspecialchars($_POST['date']);
      $weather = htmlspecialchars($_POST['weather']);
      $itinerary = htmlspecialchars($_POST['itinerary']);
      $program = htmlspecialchars($_POST['program']);
      $anecdote = htmlspecialchars($_POST['anecdote']);
      $meal = htmlspecialchars($_POST['meal']);
      $learned = htmlspecialchars($_POST['learned']);
      $atmosphere = htmlspecialchars($_POST['atmosphere']);
      
      $this->model->createNewFile($name, $date, $weather, $itinerary, $program, $anecdote, $meal, $learned, $atmosphere, $_SESSION['idDossier'], $_SESSION['idUser']);
      $files = $this->model->listFiles($_SESSION['idDossier']);
      $nameDossier = $this->model->getNameDossier($_SESSION['idDossier']);
      require './src/Templates/VueContenuDoss.php';
      //gerer les if $var non declarée...
      // warning pour weather lorsqu'il nest pas rempli (automatique)
      // peut etre ya moyen de recuperer en tant que propriété privée $files et $nameDossier qui sont réutilises dans plusieurs fonctions 
    }

  

    
  }
  
}