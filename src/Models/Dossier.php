<?php

namespace Models;

use PDO;

class Dossier{

 private $pdo;
 
 public function __construct(PDO $pdo){
  $this->pdo = $pdo;
 }

//créer un nouveau dossier
public function createNewFolder($name, $idUser){
  $request = $this->pdo->prepare('INSERT INTO Dossier (name, idUser) VALUE (:name, :idUser)');
  return $request->execute([
  ':name' => $name,
  ':idUser' =>$idUser
  ]);
  }


//Vérification si le nom de dossier existe déjà
public function isNameExists($name){
  $request = $this->pdo->prepare('SELECT COUNT(*) FROM dossier WHERE name = :name');
  $request->execute([':name' => $name]);
  return $request->fetchColumn() > 0;

}

//retourner tous les dossiers en fonction d'un idUser
public function listFolders($idUser){
  $request = $this->pdo->prepare('SELECT idDossier,name FROM dossier WHERE idUser = :idUser');
  $request->execute([':idUser' => $idUser]);
  $dossiers = $request->fetchAll(PDO::FETCH_ASSOC);
  return $dossiers;
}

}



//supprimer un dossier
//modifier le nom d'un dossier
