<?php
namespace Models;

use PDO;


class Fiche{

  private $pdo;

  public function __construct( PDO $pdo){
    $this->pdo = $pdo;
  }

//créer une nouvelle fiche dans dossier choisi
public function createNewFile($idDossier){
 // $request = $this->pdo->prepare('INSERT INTO ')
}

//retourner tous les fiches  en fonction d'un idDossier précis
public function listFiles($idDossier){
  $request = $this->pdo->prepare('SELECT name, idFiche FROM fiche WHERE idDossier = :idDossier');
  $request->execute([':idDossier' => $idDossier]);
  $fiches = $request->fetchAll(PDO::FETCH_ASSOC);
  return $fiches;
}

public function getNameDossier($idDossier){
  $dossierModel = new Dossier($this->pdo);
  return $dossierModel->nameDossier($idDossier);
}

//supprimer une fiche
//modifier la fiche

}
