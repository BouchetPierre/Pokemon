<?php
Class Attaque{
  public $nameAttaque;
  public $ptPower;
  public $powerAttaque;

  public function __construct($_nameAttaque, $_ptPower, $_powerAttaque){

   $this->setName($nameAttaque);
   $this->setPtPower($ptPower);
   $this->setPowerAttaque($powerAttaque);
 }

  public function degats($_ptVie, $_powerAttaque){
    if ($_ptVie > ($this->powerAttaque)){
      $_ptVie=$_ptVie-($this->powerAttaque);
      return $_ptVie;
    } else {
      return $messageMort = "Vous êtes mort !!!";
    }

  public function win($_ptVie, $_powerAttaque){
      $_ptVie=$_ptVie+($this->powerAttaque);
      return $_ptVie;
  }


}
 ?>
