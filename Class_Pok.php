<?php
class Pokemon{
  public $namePok;
  public $urlPok;
  public $attaque1;
  public $attaque2;
  public $attaque3;
  public $attaque4;
  public $level=1;
  public $ptVieMax;
  public $ptVie;
  public $xpPok=0;


  public function __construct($namePok, $urlPok, $ptVieMax, $attaque1, $attaque2, $attaque3, $attaque4){

   $this->namePok = $namePok;
   $this->urlPok = $namePok;
   $this->ptVieMax = $ptVieMax;
   $this->attaque1 = $attaque1;
   $this->attaque2 = $attaque2;
   $this->attaque3 = $attaque3;
   $this->attaque4 = $attaque4;
   $this->ptvie = $ptVieMax;
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
