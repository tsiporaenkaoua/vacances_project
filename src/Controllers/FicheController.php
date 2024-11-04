<?php
namespace Controllers;

use Models\Fiche;

class FicheController{

  private $model;

  public function __construct($pdo){
    $this->model = new Fiche($pdo);
  }

  public function showFiles(){
    $files = $this->model->listFiles($_GET['idDossier']);
    $nameDossier = $this->model->getNameDossier($_GET['idDossier']);
    //print_r($listFiles);
    //print_r($nameDossier);
    require './src/Templates/VueContenuDoss.php';
  }

  public function createFile(){
    echo ('hello creation');
  }
  
}