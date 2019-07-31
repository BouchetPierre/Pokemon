/*------affichage du nom du dresseur sélectionné-------*/
var nameD1 = '<?php echo $_SESSION['name_d1']; ?>';
var nameD2 = '<?php echo $_SESSION['name_d2']; ?>';

var dresseur1 = document.getElementById('name_d1') ;
var dresseur2 = document.getElementById('name_d2') ;

dresseur1.innerHTML = nameD1;
dresseur2.innerHTML = nameD2;
