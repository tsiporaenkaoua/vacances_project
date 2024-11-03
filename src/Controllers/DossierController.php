<?php

namespace Controllers;

use Models\Dossier;

class DossierController{

  private $model;

  public function __construct($pdo){
    $this->model = new Dossier($pdo);
  }

public function showFolders(){
  //echo($_SESSION['idUser']);
  $dossiers = $this->model->listFolders($_SESSION['idUser']);
  //print_r($dossiers);
  require './src/Templates/Accueil.php';
}

  public function createFolder() {
    if ($_SERVER['REQUEST_METHOD']==='POST') {
      $name = htmlspecialchars($_POST['folderName']);
      if (empty($name)) {
        $error = 'Veuillez remplir le champ';
      }else{
      $this->model->createNewFolder($name,$_SESSION['idUser']);
      header('Location: ./index.php?action=ShowFolders');
      }
    }

  }

}

///////////////////////////////////// GERER LE PROBLEME :LES ERREUR NE SONT PAS LUES LORSQU4IL YEN A
// $suffix = 1;

// if ($_SERVER['REQUEST_METHOD']==='POST') {
//     $name = null;//htmlspecialchars($_POST['folderName'])
   
//     if (empty($name)) {
//         $error = 'Veuillez remplir le champ';
//     } else {
//         while ($this->model->isNameExists($name)) {
//             $name = $name . " (" . $suffix . ")";
//             $suffix++;
//         }

//     if($this->model->createNewFolder($name)){
//       header('Location: ./src/Templates/Accueil.php');
//       exit;
//     } else {
//             $error = 'Une erreur est apparue, veuillez réitérer votre action';
//         }
    
// }


// }

