<?php
session_start();
require_once('Class_Pok.php');
require_once('Class_dresseurs.php');
require_once('Class_attaque.php');
require_once('combat.php');

/*------connection base de donnees-------*/
try {
  $dresseur= new PDO('mysql:host=localhost;dbname=jeu_pokemon;charset=utf8', 'root', 'ADRAR1112', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}catch (Exception $e){
  die('Erreur : '.$e->getMessage());
};

/*------requete et construction Pokemon 1-------*/

$affichage_d1= $dresseur->prepare('SELECT name, url_image_d2, pv, pv_max, fk_id_att1, fk_id_att2, fk_id_att3, fk_id_att4
                                  FROM pokemonDesk
                                  WHERE name = ?');
$req1 = $affichage_d1->execute(array($_SESSION['pokemon_d1']));
$donneeD1 = $affichage_d1->fetch();

$bindsD1 = [$donneeD1['fk_id_att1'], $donneeD1['fk_id_att2'], $donneeD1['fk_id_att3'], $donneeD1['fk_id_att4']];
$bindsD1Prepared = implode(',', $bindsD1);
$attaq_d1 = $dresseur->query("
          SELECT name, degat, genreAttaque FROM typeAttaque
            WHERE id_typeAttaque
            IN (".$bindsD1Prepared.")");
$resultsD1 = $attaq_d1->fetchAll();


$tabResNameD1;
$tabResDegatD1;
$tabResGenretD1;
    foreach($resultsD1 as $result){
      $tabResNameD1[] = ($result['name']);
      $tabResDegatD1[] = ($result['degat']);
      $tabResGenretD1[] = ($result['genreAttaque']);
    }

$NamePokemon_d1 = $donneeD1['name'];
$_SESSION['NamePokemon_d1']=$NamePokemon_d1;

$pokemonDres_1 = new Pokemon($donneeD1['name'], $donneeD1['url_image_d2'], $donneeD1['pv'],$donneeD1['pv_max'], $tabResNameD1[0], $tabResNameD1[1], $tabResNameD1[2], $tabResNameD1[3]);


/*------requete et construction Pokemon 2-------*/

$_SESSION['pokemon_d2'];

$affichage_d2= $dresseur->prepare('SELECT name, url_image_d1, pv, pv_max, fk_id_att1, fk_id_att2, fk_id_att3, fk_id_att4
                                  FROM pokemonDesk
                                  WHERE name = ?');
$req2 = $affichage_d2->execute(array($_SESSION['pokemon_d2']));
$donneeD2 = $affichage_d2->fetch();


$bindsD2 = [$donneeD2['fk_id_att1'], $donneeD2['fk_id_att2'], $donneeD2['fk_id_att3'], $donneeD2['fk_id_att4']];
$bindsD2Prepared = implode(',', $bindsD2);
$attaq_d2 = $dresseur->query("
          SELECT name, degat, genreAttaque FROM typeAttaque
            WHERE id_typeAttaque
            IN (".$bindsD2Prepared.")");
$resultsD2 = $attaq_d2->fetchAll();

$tabResNameD2;
$tabResDegatD2;
$tabResGenretD2;
    foreach($resultsD2 as $result){
      $tabResNameD2[] = ($result['name']);
      $tabResDegatD2[] = ($result['degat']);
      $tabResGenretD2[] = ($result['genreAttaque']);
    }

$NamePokemon_d2=$donneeD2['name'];
$_SESSION['NamePokemon_d2']=$NamePokemon_d2;

$pokemonDres_2 = new Pokemon($donneeD2['name'], $donneeD2['url_image_d1'], $donneeD2['pv'], $donneeD2['pv_max'], $tabResNameD2[0], $tabResNameD2[1], $tabResNameD2[2], $tabResNameD2[3]);

/*------construction Dresseur------*/

$dresseur_d1 = new Dresseur($_SESSION['name_d1']);
$dresseur_d2 = new Dresseur($_SESSION['name_d2']);

/*------requete et des attaques du dresseur 1-------*/

$attaque1_d1 = new Attaque( $tabResNameD1[0], $tabResDegatD1[0], $tabResGenretD1[0]);
$attaque2_d1 = new Attaque( $tabResNameD1[1], $tabResDegatD1[1], $tabResGenretD1[1]);
$attaque3_d1 = new Attaque( $tabResNameD1[2], $tabResDegatD1[2], $tabResGenretD1[2]);
$attaque4_d1 = new Attaque( $tabResNameD1[3], $tabResDegatD1[3], $tabResGenretD1[3]);

/*------requete et des attaques du dresseur 1-------*/

$attaque1_d2 = new Attaque( $tabResNameD2[0], $tabResDegatD2[0], $tabResGenretD2[0]);
$attaque2_d2 = new Attaque( $tabResNameD2[1], $tabResDegatD2[1], $tabResGenretD2[1]);
$attaque3_d2 = new Attaque( $tabResNameD2[2], $tabResDegatD2[2], $tabResGenretD2[2]);
$attaque4_d2 = new Attaque( $tabResNameD2[3], $tabResDegatD2[3], $tabResGenretD2[3]);
?>

<script>

/*------nom des attaques pour chaque pokémon -------*/
//<script type="text/javascript" src="script/nomAttaque.js" charset="utf-8">/script>


var NamePokemonD1 = '<?php echo $_SESSION['NamePokemon_d1']; ?>';

var tabResName1D1 = '<?php echo $tabResNameD1[0]; ?>';
var tabResName2D1 = '<?php echo $tabResNameD1[1]; ?>';
var tabResName3D1 = '<?php echo $tabResNameD1[2]; ?>';
var tabResName4D1 = '<?php echo $tabResNameD1[3]; ?>';

document.getElementById("att1_d1").value = tabResName1D1 ;
document.getElementById("att2_d1").value = tabResName2D1 ;
document.getElementById("att3_d1").value = tabResName3D1 ;
document.getElementById("att4_d1").value = tabResName4D1 ;

var tabResName1D2 = '<?php echo $tabResNameD2[0]; ?>';
var tabResName2D2 = '<?php echo $tabResNameD2[1]; ?>';
var tabResName3D2 = '<?php echo $tabResNameD2[2]; ?>';
var tabResName4D2 = '<?php echo $tabResNameD2[3]; ?>';

document.getElementById("att1_d2").value = tabResName1D2 ;
document.getElementById("att2_d2").value = tabResName2D2 ;
document.getElementById("att3_d2").value = tabResName3D2 ;
document.getElementById("att4_d2").value = tabResName4D2 ;

/*------affichage du pokémon sélectionné-------*/
//<script type="text/javascript" src="script/pokemonSelectionné.js" charset="utf-8">/script>

var NamePokemonD1 = '<?php echo $_SESSION['NamePokemon_d1']; ?>';
console.log(NamePokemonD1);

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
console.log(NamePokemonD2);

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
//<script type="text/javascript" src="script/nomDresseur.js" charset="utf-8">/script>

var nameD1 = '<?php echo $_SESSION['name_d1']; ?>';
var nameD2 = '<?php echo $_SESSION['name_d2']; ?>';

var dresseur1 = document.getElementById('name_d1') ;
var dresseur2 = document.getElementById('name_d2') ;

dresseur1.innerHTML = nameD1;
dresseur2.innerHTML = nameD2;
</script>

<script>
/*------affichage des points de vie du pokémon-------*/
//<script type="text/javascript" src="script/barrePv.js" charset="utf-8">/script>
var pvD1max = '<?php echo  $pokemonDres_1->getptVieMax(); ?>';
var pvD2max = '<?php echo  $pokemonDres_2->getptVieMax(); ?>';
var pvD1 = '<?php echo  $pokemonDres_1->getptVie(); ?>';
var pvD2 = '<?php echo  $pokemonDres_2->getptVie(); ?>';
console.log(pvD2max);
console.log(pvD2);

document.getElementById("vie_d1").max = pvD1max;
document.getElementById("vie_d2").max = pvD2max;
document.getElementById("vie_d1").value = pvD1;
document.getElementById("vie_d2").value = pvD2;

</script>

<?php

$AQuiLeTour='d1';

 if(!empty($_POST['attaque1_d1']) && $AQuiLeTour=='d1' && $attaque1_d1->getgenreAttaque()!= 2) {
 $resultAttaq1=$attaque1_d1->degats($pokemonDres_2->getptVie(),$attaque1_d1->getpowerAttaque());
 $pokemonDres_2->setptVie($resultAttaq1);
 ?>
 <script>
 var pvD2 = '<?php echo  $pokemonDres_2->getptVie(); ?>';
 document.getElementById("vie_d2").value = pvD2;
 </script>
 <?php
 $AQuiLeTour='d2';

} elseif (!empty($_POST['attaque1_d1']) && $AQuiLeTour=='d1' && $tabResGenretD2 == 2) {

 degats($pokemonDres_2->getptVie(),$attaque1_d1->getpowerAttaque());
 gainVie($pokemonDres_1->getptVie(),$attaque1_d1->getpowerAttaque(),$pokemonDres_1->getptVieMax());
 $AQuiLeTour='d2';

} else if(!empty($_POST['attaque1_d1'])){
 echo "Ce n'est pas à vous de jouer !!!";
}


 ?>
