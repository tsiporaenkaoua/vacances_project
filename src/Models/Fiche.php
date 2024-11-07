<?php
namespace Models;

use PDO;


class Fiche{

  private $pdo;

  public function __construct( PDO $pdo){
    $this->pdo = $pdo;
  }

//créer une nouvelle fiche dans dossier choisi
public function createNewFile($name, $date, $weather, $itinerary, $program, $anecdote, $meal, $learned, $atmosphere, $idDossier, $idUser){
 $request = $this->pdo->prepare('INSERT INTO fiche (name, date, weather, itinerary, program, anecdote, meal, learned, atmosphere, idDossier, idUser) VALUES (:name, :date, :weather, :itinerary, :program, :anecdote, :meal, :learned, :atmosphere, :idDossier, :idUser) ');
$request->execute([
  ':name' => $name,
  ':date' => $date,
  ':weather'=> $weather,
  ':itinerary' => $itinerary, 
  ':program' => $program, 
  ':anecdote' => $anecdote, 
  ':meal' => $meal, 
  ':learned' => $learned, 
  ':atmosphere' => $atmosphere, 
  ':idDossier' => $idDossier, 
  ':idUser' => $idUser
]);
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
