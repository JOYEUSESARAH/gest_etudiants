<?php

class etudiant
{
  private $idetudiant;
  private $id_filiere;
  private $id_niveau;
  private $Nom;
  private $Prenom;
  private $date_naissance;
  private $nationalite;
  private $adresse;
  private $email;
  private $telephone;

  public function __construct(array $donnee){

    foreach ($donnee as $key => $value) {
        
        if(property_exists($this,$key)){
          $this->$key=$value;
        }
    }
  }

  public function __get($propriete)
  {
       if(property_exists($this,$propriete)){ 
       return $this->$propriete;
    }
  }
        
  public function __set($propriete, $value)
  {
        if(property_exists($this,$propriete)){ 
        $this->$propriete = $value;
     }
  }
}


