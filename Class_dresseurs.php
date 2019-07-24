<?php

class Dresseur{

  public $namedresseur;


  public function __construct($namedresseur){

   $this->$namedresseur = $namedresseur; // Initialisation du nom.

  }

  public function Attaque($nameAttaque){
    if($genreAttaque == 1){
      degats();
    }else{
      degats();
      gainVie();
    };
  };

}
