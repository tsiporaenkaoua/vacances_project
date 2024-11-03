<?php

namespace Models;

use PDO;


 class User{
  
  private $pdo;

  public function __construct( PDO $pdo){
    $this->pdo = $pdo;
  }
  


    //Ajouter un user à la BDD
  public function createUser($email, $password){
    //création au niveau du back d'un hashage de password
    $hashedPassword = password_hash($password,PASSWORD_BCRYPT);

    //prépare
    $request = $this->pdo->prepare('INSERT INTO user (email, password) VALUES (:email, :password)');
    return $request->execute([
      ':email'=> $email,
      ':password'=> $hashedPassword
    ]); //renvoit un booleen pour indiquer si ca a fonctionné ou non
  }
  


  //Verifier si on a deja un compte pour l'email saisi
  public function isEmailExists($email){
    $request = $this->pdo->prepare('SELECT COUNT(*) FROM user WHERE email= :email');
    $request->bindParam(':email', $email);// deux manieres de procéder soit direct on fait un tableau dans execute ou soit on utilise bindParam
    $request->execute();
    return $request->fetchColumn()>0;

  }



  //Supprimer un user (ca revient a supprimer son compte puisqu'on a saisi l'option cascade pour les clés étrangères)
public function deleteUser($idUser){
  $request=$this->pdo->prepare('DELETE FROM user WHERE idUser= :idUser');
  $request->bindParam(':idUser', $idUser);
  $request->execute();
}

//verifier que l'identifiant et le mdp sont valides lors d'une connexion
public function isValidUser($email,$password){
  $request = $this->pdo->prepare('SELECT password FROM user WHERE email = :email ');
  $request->bindParam(':email', $email);
  $request->execute();

  $hashedPassword=$request->fetchColumn();

  if($hashedPassword && password_verify($password,$hashedPassword)){
    return true;
  }
  return false;
}

//Connaitre l'idUser a partir de son email
public function idUser($email){
  $request = $this->pdo->prepare('SELECT idUser FROM User WHERE email = :email');
  $request->execute([':email' => $email]);
  return $request->fetchColumn();
}



 }

 

