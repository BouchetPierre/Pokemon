<?php
Class Attaque{
  public $_nomAttaque;
  public $_ptPower;
  public $_powerAttaque;

  public function degats(ptVie){
    if (ptVie > ($this->_powerAttaque)){
      ptVie=ptVie-($this->_powerAttaque);
    } else {
      echo "Vous êtes mort !!!";
    }

  }
}
 ?>
