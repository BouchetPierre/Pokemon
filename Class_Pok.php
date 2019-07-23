<?php
class Pokemon{
  public $namePok;
  public $urlPok;
  public $attaques[];
  public $level=1;
  public $ptVie;
  public $xpPok=0;


  public function __construct($namePok, $urlPok, $ptVie, $attaques){

   $this->setNamePok($namePok);
   $this->setUrlPok($urlPok);
   $this->setPtVie($ptVie);
   $this->setAttaques($attaques[]);
  }

  public function gainXp(){
    $this->xpPok = $this->xpPok+1;

  }

  public function gainPtVie(){

  }

  public function gainLevel(){
    $this->level= $this->level+1;
  }



}
 ?>
