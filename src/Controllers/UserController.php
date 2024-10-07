<?php

namespace Controllers;

use Models\User;

class UserController{

  private $model;

// si on n'avait pas créé le constructeur qui recupere pdo, dans chaque fonction de cette classe on aurait du mettre en parametre $pdo si dans ces fonctions on utilise des fonctions de la classe User pour entrer en interaction avec la bdd.
  public function __construct( $pdo){
    $this->model = new User($pdo);
  }

 public function register(){ 

    if ($_SERVER['REQUEST_METHOD']==='POST'){
       $email = $_POST['email'];
      $password = $_POST['password'];
      
          if(empty($email) || empty($password)){
        $error = 'Veuillez remplir tous les champs';
      }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error = 'Le format de l\'email n\'est pas correct';
      }elseif($this->model->isEmailExists($email)){
        $error = 'Cet email existe déja';
      }else{
        if($this->model->createUser($email, $password)){
          $success = 'Vous êtes bien enregistré';
         header('Location: ./src/Templates/Connexion.php'); 
         exit(); // S'assure que le script s'arrête ici pour éviter de charger la vue en dessous
           
          
        }else{
          $error = 'Une erreur est apparue. Veuillez resaisir vos informations';
        }

      }
      
    }
    
     require ('./src/Templates/Inscription.php');
  }

  public function signIn(){
    if($_SERVER['REQUEST_METHOD']==='POST'){
      $email = $_POST['email'];
      $password = $_POST['password'];


      if(empty($email) || empty($password)){
        $error = 'Veuillez remplir tous les champs';
      }elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $error = 'Le format de l\'email n\'est pas correct';
      }elseif($this->model->isValidUser($email, $password)){
        header('Location: ./src/Templates/Accueil.php');
      } else{
        $error = 'votre e-mail ou votre mot de passe est invalide';
      }
    require './src/Templates/Connexion.php';
    
  }
}
}