<?php
Class Attaque{
  public $nameAttaque;
  public $ptPower;
  public $powerAttaque;
  public $genreAttaque;

  public function __construct($nameAttaque, $ptPower, $powerAttaque, $genreAttaque){

   $this->nameAttaque = $nameAttaque;
   $this->ptPower = $ptPower;
   $this->$powerAttaque = $powerAttaque;
   $this->$genreAttaque = $genreAttaque;
 }

  public function degats($ptVie, $powerAttaque){
    if ($ptVie > ($this->powerAttaque)){
      $ptVie=$ptVie-($this->powerAttaque);
      return $ptVie;
    } else {
      return $messageMort = "Vous êtes mort !!!";
    }
  }

  public function gainVie($ptVie, $powerAttaque, $ptVieMax){
      $ptVie=$ptVie+($this->powerAttaque);
      if($ptVie>$ptVieMax){
        $ptVie=$ptVieMax;
      };
      return $ptVie;
  }

  public function setNameAttaque($nameAttaque)
  {
    $this->nameAttaque = $nameAttaque;
  }

  public function getNameAttaque()
  {
    return $this->nameAttaque;
  }

  public function getgenreAttaque()
  {
    return $this->genreAttaque;
  }

}
 ?>
