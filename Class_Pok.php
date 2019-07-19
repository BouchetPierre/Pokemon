<?php
class Pokemon{
  public $_namePok;
  public $_urlPok;
  public $_attaques[];
  public $_level=1;
  public $_ptVie;
  public $_xpPok=0;

  public function gainXp(){
    $this->_xpPok = $this->_xpPok+1;
  }

  public function gainPtVie(){

  }

  public function pertePtVie(){

  }

  public function gainLevel(){
    $this->_level= $this->_level+1;
  }



}
 ?>
