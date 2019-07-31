<?php
session_start();
require_once('accueil_combat.php');

/*------connection base de donnees-------*/
try {
  $dresseur= new PDO('mysql:host=localhost;dbname=jeu_pokemon;charset=utf8', 'root', 'ADRAR1112', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}catch (Exception $e){
  die('Erreur : '.$e->getMessage());
};
$affichage_d1= $dresseur->prepare('SELECT name, url_image_d2, pv, pv_max, fk_id_att1, fk_id_att2, fk_id_att3, fk_id_att4
                                  FROM pokemonDesk
                                  WHERE name = ?');
$req1 = $affichage_d1->execute(array($_SESSION['pokemon_d1']));
$donneeD1 = $affichage_d1->fetch();
$NamePokemon_d1 = $donneeD1['name'];
$_SESSION['NamePokemon_d1']=$NamePokemon_d1;

$_SESSION['pokemon_d2']=$_POST['pokemon_d2'];
$affichage_d2= $dresseur->prepare('SELECT name, url_image_d1, pv, pv_max, fk_id_att1, fk_id_att2, fk_id_att3, fk_id_att4
                                  FROM pokemonDesk
                                  WHERE name = ?');
$req2 = $affichage_d2->execute(array($_SESSION['pokemon_d2']));
$donneeD2 = $affichage_d2->fetch();
$NamePokemon_d2=$donneeD2['name'];
$_SESSION['NamePokemon_d2']=$NamePokemon_d2;


?>
<script>

var NamePokemonD1 = '<?php echo $_SESSION['NamePokemon_d1']; ?>';

var Pok_d1 = document.getElementById("pokemon_d1");
switch (NamePokemonD1) {
  case "carapuce":
    Pok_d1.classList.toggle("carapuce_d1")
    break;
  case "bulbizarre":
    Pok_d1.classList.toggle("bulbizarre_d1")
    break;
  case "salameche":
    Pok_d1.classList.toggle("salameche_d1")
    break;
  case "fantominus":
    Pok_d1.classList.toggle("fantominus_d1")
    break;
  default:
}

var NamePokemonD2 = '<?php echo $_SESSION['NamePokemon_d2']; ?>';

var Pok_d2 = document.getElementById("pokemon_d2");
switch (NamePokemonD2) {
  case "carapuce":
    Pok_d2.classList.toggle("carapuce_d2")
    break;
  case "bulbizarre":
    Pok_d2.classList.toggle("bulbizarre_d2")
    break;
  case "salameche":
    Pok_d2.classList.toggle("salameche_d2")
    break;
  case "fantominus":
    Pok_d2.classList.toggle("fantominus_d2")
    break;
  default:
}
</script>

<script>

/*------affichage du nom du dresseur sélectionné-------*/
var nameD1 = '<?php echo $_SESSION['name_d1']; ?>';
var nameD2 = '<?php echo $_SESSION['name_d2']; ?>';


var dresseur1 = document.getElementById('name_d1') ;
var dresseur2 = document.getElementById('name_d2') ;
dresseur1.innerHTML = nameD1;
dresseur2.innerHTML = nameD2;

</script>
