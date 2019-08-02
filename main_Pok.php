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

$affichage_d1= $dresseur->prepare('SELECT name, url_image_d2, pv, pv_max, fk_id_att1, fk_id_att2, fk_id_att3, fk_id_att4, evolution, evolution2
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
$level_d1 = $pokemonDres_1->getLevel();

/*------requete et construction de l'evolution1 du Pokemon 1-------*/
$affichage_d1evo1= $dresseur->prepare('SELECT name, url_image_d2, pv, pv_max, fk_id_att1, fk_id_att2, fk_id_att3, fk_id_att4, evolution, evolution2
                                  FROM pokemonDesk
                                  WHERE name = ?');
$req1evo1 = $affichage_d1evo1->execute(array($donneeD1['evolution']));
$donneeD1evo1 = $affichage_d1evo1->fetch();

$bindsD1evo1 = [$donneeD1evo1['fk_id_att1'], $donneeD1evo1['fk_id_att2'], $donneeD1evo1['fk_id_att3'], $donneeD1evo1['fk_id_att4']];
$bindsD1Prepared = implode(',', $bindsD1evo1);
$attaq_d1evo1 = $dresseur->query("
          SELECT name, degat, genreAttaque FROM typeAttaque
            WHERE id_typeAttaque
            IN (".$bindsD1Prepared.")");
$resultsD1evo1 = $attaq_d1evo1->fetchAll();


$tabResNameD1evo1;
$tabResDegatD1evo1;
$tabResGenretD1evo1;
    foreach($resultsD1evo1 as $result){
      $tabResNameD1evo1[] = ($result['name']);
      $tabResDegatD1evo1[] = ($result['degat']);
      $tabResGenretD1evo1[] = ($result['genreAttaque']);
    }

$NamePokemon_d1evo1 = $donneeD1evo1['name'];
$_SESSION['NamePokemon_d1evo1']=$NamePokemon_d1evo1;

$pokemonDres_1evo1 = new Pokemon($donneeD1evo1['name'], $donneeD1evo1['url_image_d2'], $donneeD1evo1['pv'],$donneeD1evo1['pv_max'], $tabResNameD1evo1[0], $tabResNameD1evo1[1], $tabResNameD1evo1[2], $tabResNameD1evo1[3]);


/*------requete et construction de l'evolution 2 du Pokemon 1-------*/
$affichage_d1evo2= $dresseur->prepare('SELECT name, url_image_d2, pv, pv_max, fk_id_att1, fk_id_att2, fk_id_att3, fk_id_att4, evolution, evolution2
                                  FROM pokemonDesk
                                  WHERE name = ?');
$req1evo2 = $affichage_d1evo2->execute(array($donneeD1['evolution2']));
$donneeD1evo2 = $affichage_d1evo2->fetch();

$bindsD1evo2 = [$donneeD1evo2['fk_id_att1'], $donneeD1evo2['fk_id_att2'], $donneeD1evo2['fk_id_att3'], $donneeD1evo2['fk_id_att4']];
$bindsD1Prepared = implode(',', $bindsD1evo2);
$attaq_d1evo2 = $dresseur->query("
          SELECT name, degat, genreAttaque FROM typeAttaque
            WHERE id_typeAttaque
            IN (".$bindsD1Prepared.")");
$resultsD1evo2 = $attaq_d1evo2->fetchAll();


$tabResNameD1evo2;
$tabResDegatD1evo2;
$tabResGenretD1evo2;
    foreach($resultsD1evo2 as $result){
      $tabResNameD1evo2[] = ($result['name']);
      $tabResDegatD1evo2[] = ($result['degat']);
      $tabResGenretD1evo2[] = ($result['genreAttaque']);
    }

$NamePokemon_d1evo2 = $donneeD1evo2['name'];
$_SESSION['NamePokemon_d1evo2']=$NamePokemon_d1evo2;

$pokemonDres_1evo2 = new Pokemon($donneeD1evo2['name'], $donneeD1evo2['url_image_d2'], $donneeD1evo2['pv'],$donneeD1evo2['pv_max'], $tabResNameD1evo2[0], $tabResNameD1evo2[1], $tabResNameD1evo2[2], $tabResNameD1evo2[3]);

/*------requete et construction Pokemon 2-------*/

$_SESSION['pokemon_d2'];

$affichage_d2= $dresseur->prepare('SELECT name, url_image_d1, pv, pv_max, fk_id_att1, fk_id_att2, fk_id_att3, fk_id_att4, evolution, evolution2
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
$level_d2 = $pokemonDres_2->getLevel();

/*------requete et construction de l'evolution1 du Pokemon 2-------*/
$affichage_d2evo1= $dresseur->prepare('SELECT name, url_image_d1, pv, pv_max, fk_id_att1, fk_id_att2, fk_id_att3, fk_id_att4, evolution, evolution2
                                  FROM pokemonDesk
                                  WHERE name = ?');
$req2evo1 = $affichage_d2evo1->execute(array($donneeD2['evolution']));
$donneeD2evo1 = $affichage_d2evo1->fetch();

$bindsD2evo1 = [$donneeD2evo1['fk_id_att1'], $donneeD2evo1['fk_id_att2'], $donneeD2evo1['fk_id_att3'], $donneeD2evo1['fk_id_att4']];
$bindsD2Prepared = implode(',', $bindsD2evo1);
$attaq_d2evo1 = $dresseur->query("
          SELECT name, degat, genreAttaque FROM typeAttaque
            WHERE id_typeAttaque
            IN (".$bindsD2Prepared.")");
$resultsD2evo1 = $attaq_d2evo1->fetchAll();


$tabResNameD2evo1;
$tabResDegatD2evo1;
$tabResGenretD2evo1;
    foreach($resultsD2evo1 as $result){
      $tabResNameD2evo1[] = ($result['name']);
      $tabResDegatD2evo1[] = ($result['degat']);
      $tabResGenretD2evo1[] = ($result['genreAttaque']);
    }

$NamePokemon_d2evo1 = $donneeD2evo1['name'];
$_SESSION['NamePokemon_d2evo1']=$NamePokemon_d2evo1;

$pokemonDres_2evo1 = new Pokemon($donneeD2evo1['name'], $donneeD2evo1['url_image_d1'], $donneeD2evo1['pv'],$donneeD2evo1['pv_max'], $tabResNameD2evo1[0], $tabResNameD2evo1[1], $tabResNameD2evo1[2], $tabResNameD2evo1[3]);


/*------requete et construction de l'evolution 2 du Pokemon 2-------*/
$affichage_d2evo2= $dresseur->prepare('SELECT name, url_image_d1, pv, pv_max, fk_id_att1, fk_id_att2, fk_id_att3, fk_id_att4, evolution, evolution2
                                  FROM pokemonDesk
                                  WHERE name = ?');
$req2evo2 = $affichage_d2evo2->execute(array($donneeD2['evolution2']));
$donneeD2evo2 = $affichage_d2evo2->fetch();

$bindsD2evo2 = [$donneeD1evo2['fk_id_att1'], $donneeD2evo2['fk_id_att2'], $donneeD2evo2['fk_id_att3'], $donneeD2evo2['fk_id_att4']];
$bindsD2Prepared = implode(',', $bindsD2evo2);
$attaq_d2evo2 = $dresseur->query("
          SELECT name, degat, genreAttaque FROM typeAttaque
            WHERE id_typeAttaque
            IN (".$bindsD2Prepared.")");
$resultsD2evo2 = $attaq_d2evo2->fetchAll();


$tabResNameD2evo2;
$tabResDegatD2evo2;
$tabResGenretD2evo2;
    foreach($resultsD2evo2 as $result){
      $tabResNameD2evo2[] = ($result['name']);
      $tabResDegatD2evo2[] = ($result['degat']);
      $tabResGenretD2evo2[] = ($result['genreAttaque']);
    }

$NamePokemon_d2evo2 = $donneeD2evo2['name'];
$_SESSION['NamePokemon_d2evo2']=$NamePokemon_d2evo2;

$pokemonDres_2evo2 = new Pokemon($donneeD2evo2['name'], $donneeD2evo2['url_image_d1'], $donneeD2evo2['pv'],$donneeD2evo2['pv_max'], $tabResNameD2evo2[0], $tabResNameD2evo2[1], $tabResNameD2evo2[2], $tabResNameD2evo2[3]);

/*------construction Dresseur------*/

$dresseur_d1 = new Dresseur($_SESSION['name_d1']);
$dresseur_d2 = new Dresseur($_SESSION['name_d2']);

/*------requete et des attaques du dresseur 1-------*/

$attaque1_d1 = new Attaque( $tabResNameD1[0], $tabResDegatD1[0], $tabResGenretD1[0]);
$attaque2_d1 = new Attaque( $tabResNameD1[1], $tabResDegatD1[1], $tabResGenretD1[1]);
$attaque3_d1 = new Attaque( $tabResNameD1[2], $tabResDegatD1[2], $tabResGenretD1[2]);
$attaque4_d1 = new Attaque( $tabResNameD1[3], $tabResDegatD1[3], $tabResGenretD1[3]);

/*------requete et des attaques du dresseur 1  evo 1-------*/

$attaque1_d1evo1 = new Attaque( $tabResNameD1evo1[0], $tabResDegatD1evo1[0], $tabResGenretD1evo1[0]);
$attaque2_d1evo1 = new Attaque( $tabResNameD1evo1[1], $tabResDegatD1evo1[1], $tabResGenretD1evo1[1]);
$attaque3_d1evo1 = new Attaque( $tabResNameD1evo1[2], $tabResDegatD1evo1[2], $tabResGenretD1evo1[2]);
$attaque4_d1evo1 = new Attaque( $tabResNameD1evo1[3], $tabResDegatD1evo1[3], $tabResGenretD1evo1[3]);

/*------requete et des attaques du dresseur 1  evo 2-------*/

$attaque1_d1evo2 = new Attaque( $tabResNameD1evo2[0], $tabResDegatD1evo2[0], $tabResGenretD1evo2[0]);
$attaque2_d1evo2 = new Attaque( $tabResNameD1evo2[1], $tabResDegatD1evo2[1], $tabResGenretD1evo2[1]);
$attaque3_d1evo2 = new Attaque( $tabResNameD1evo2[2], $tabResDegatD1evo2[2], $tabResGenretD1evo2[2]);
$attaque4_d1evo2 = new Attaque( $tabResNameD1evo2[3], $tabResDegatD1evo2[3], $tabResGenretD1evo2[3]);

/*------requete et des attaques du dresseur 2-------*/

$attaque1_d2 = new Attaque( $tabResNameD2[0], $tabResDegatD2[0], $tabResGenretD2[0]);
$attaque2_d2 = new Attaque( $tabResNameD2[1], $tabResDegatD2[1], $tabResGenretD2[1]);
$attaque3_d2 = new Attaque( $tabResNameD2[2], $tabResDegatD2[2], $tabResGenretD2[2]);
$attaque4_d2 = new Attaque( $tabResNameD2[3], $tabResDegatD2[3], $tabResGenretD2[3]);

/*------requete et des attaques du dresseur 2  evo 1-------*/

$attaque1_d2evo1 = new Attaque( $tabResNameD2evo1[0], $tabResDegatD2evo1[0], $tabResGenretD2evo1[0]);
$attaque2_d2evo1 = new Attaque( $tabResNameD2evo1[1], $tabResDegatD2evo1[1], $tabResGenretD2evo1[1]);
$attaque3_d2evo1 = new Attaque( $tabResNameD2evo1[2], $tabResDegatD2evo1[2], $tabResGenretD2evo1[2]);
$attaque4_d2evo1 = new Attaque( $tabResNameD2evo1[3], $tabResDegatD2evo1[3], $tabResGenretD2evo1[3]);

/*------requete et des attaques du dresseur 2  evo 2-------*/

$attaque1_d2evo2 = new Attaque( $tabResNameD1evo2[0], $tabResDegatD2evo2[0], $tabResGenretD2evo2[0]);
$attaque2_d2evo2 = new Attaque( $tabResNameD1evo2[1], $tabResDegatD2evo2[1], $tabResGenretD2evo2[1]);
$attaque3_d2evo2 = new Attaque( $tabResNameD1evo2[2], $tabResDegatD2evo2[2], $tabResGenretD2evo2[2]);
$attaque4_d2evo2 = new Attaque( $tabResNameD1evo2[3], $tabResDegatD2evo2[3], $tabResGenretD2evo2[3]);
?>

<script>

/*------nom des attaques pour chaque pokémon -------*/

document.getElementById("rejouer").style.display= "none";/*bouton rejouer*/

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

function attD1evo1(){
  tabResName1D1 = '<?php echo $tabResNameD1evo1[0]; ?>';
  tabResName2D1 = '<?php echo $tabResNameD1evo1[1]; ?>';
  tabResName3D1 = '<?php echo $tabResNameD1evo1[2]; ?>';
  tabResName4D1 = '<?php echo $tabResNameD1evo1[3]; ?>';

  document.getElementById("att1_d1").value = tabResName1D1 ;
  document.getElementById("att2_d1").value = tabResName2D1 ;
  document.getElementById("att3_d1").value = tabResName3D1 ;
  document.getElementById("att4_d1").value = tabResName4D1 ;
}
function attD2evo1(){
  tabResName1D2 = '<?php echo $tabResNameD2evo1[0]; ?>';
  tabResName2D2 = '<?php echo $tabResNameD2evo1[1]; ?>';
  tabResName3D2 = '<?php echo $tabResNameD2evo1[2]; ?>';
  tabResName4D2 = '<?php echo $tabResNameD2evo1[3]; ?>';

  document.getElementById("att1_d2").value = tabResName1D2 ;
  document.getElementById("att2_d2").value = tabResName2D2 ;
  document.getElementById("att3_d2").value = tabResName3D2 ;
  document.getElementById("att4_d2").value = tabResName4D2 ;
}
function attD1evo2(){
  tabResName1D1 = '<?php echo $tabResNameD1evo2[0]; ?>';
  tabResName2D1 = '<?php echo $tabResNameD1evo2[1]; ?>';
  tabResName3D1 = '<?php echo $tabResNameD1evo2[2]; ?>';
  tabResName4D1 = '<?php echo $tabResNameD1evo2[3]; ?>';

  document.getElementById("att1_d1").value = tabResName1D1 ;
  document.getElementById("att2_d1").value = tabResName2D1 ;
  document.getElementById("att3_d1").value = tabResName3D1 ;
  document.getElementById("att4_d1").value = tabResName4D1 ;
}
function attD2evo2(){
  tabResName1D2 = '<?php echo $tabResNameD2evo2[0]; ?>';
  tabResName2D2 = '<?php echo $tabResNameD2evo2[1]; ?>';
  tabResName3D2 = '<?php echo $tabResNameD2evo2[2]; ?>';
  tabResName4D2 = '<?php echo $tabResNameD2evo2[3]; ?>';

  document.getElementById("att1_d2").value = tabResName1D2 ;
  document.getElementById("att2_d2").value = tabResName2D2 ;
  document.getElementById("att3_d2").value = tabResName3D2 ;
  document.getElementById("att4_d2").value = tabResName4D2 ;
}

/*------noms des evolutions-------*/
var nomD1Evo1 ='<?php echo $donneeD1evo1['name'];?>';
var nomD1Evo2 ='<?php echo $donneeD1evo2['name'];?>';
var nomD2Evo1 ='<?php echo $donneeD2evo1['name'];?>';
var nomD2Evo2 ='<?php echo $donneeD2evo2['name'];?>';

/*------affichage des pokémons sélectionnés-------*/
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


/*------affichage du nom du dresseur et du pokemon sélectionnés-------*/
//<script type="text/javascript" src="script/nomDresseur.js" charset="utf-8">/script>

var nameD1 = '<?php echo $_SESSION['name_d1']; ?>';
var nameD2 = '<?php echo $_SESSION['name_d2']; ?>';
var pokD1 = '<?php echo $_SESSION['NamePokemon_d1']; ?>';
var pokD2 = '<?php echo $_SESSION['NamePokemon_d2']; ?>';

var dresseur1 = document.getElementById('name_d1');
var dresseur2 = document.getElementById('name_d2');
var pokemon1 = document.getElementById('pok_d1');
var pokemon2 = document.getElementById('pok_d2');

dresseur1.innerHTML = nameD1;
dresseur2.innerHTML = nameD2;
pokemon1.innerHTML = pokD1;
pokemon2.innerHTML = pokD2;

/*------affichage des level des Pokemons-------*/
var lvlD1 = '<?php echo $level_d1; ?>';
var lvlD2 = '<?php echo $level_d2; ?>';
var lvl_d1 = document.getElementById('lvl1');
var lvl_d2 = document.getElementById('lvl2');
lvl_d1.innerHTML = lvlD1;
lvl_d2.innerHTML = lvlD2;

/*------affichage des points de vie du pokémon-------*/
//<script type="text/javascript" src="script/barrePv.js" charset="utf-8">/script>
var pvD1max = '<?php echo  $pokemonDres_1->getptVieMax(); ?>';
var pvD2max = '<?php echo  $pokemonDres_2->getptVieMax(); ?>';

var ptvD1 = '<?php echo  $pokemonDres_1->getptVie(); ?>';
var ptvD2 = '<?php echo  $pokemonDres_2->getptVie(); ?>';

var pvD1 = ptvD1;
var pvD2 = ptvD2;

document.getElementById("vie_d1").max = pvD1max;
document.getElementById("vie_d2").max = pvD2max;
document.getElementById("vie_d1").value = pvD1;
document.getElementById("vie_d2").value = pvD2;

var genreAtt1_d1 = '<?php echo  $attaque1_d1->getgenreAttaque(); ?>';
var powerAtt1_d1 = '<?php echo  $attaque1_d1->getpowerAttaque(); ?>';
var genreAtt2_d1 = '<?php echo  $attaque2_d1->getgenreAttaque(); ?>';
var powerAtt2_d1 = '<?php echo  $attaque2_d1->getpowerAttaque(); ?>';
var genreAtt3_d1 = '<?php echo  $attaque3_d1->getgenreAttaque(); ?>';
var powerAtt3_d1 = '<?php echo  $attaque3_d1->getpowerAttaque(); ?>';
var genreAtt4_d1 = '<?php echo  $attaque4_d1->getgenreAttaque(); ?>';
var powerAtt4_d1 = '<?php echo  $attaque4_d1->getpowerAttaque(); ?>';
var genreAtt1_d2 = '<?php echo  $attaque1_d2->getgenreAttaque(); ?>';
var powerAtt1_d2 = '<?php echo  $attaque1_d2->getpowerAttaque(); ?>';
var genreAtt2_d2 = '<?php echo  $attaque2_d2->getgenreAttaque(); ?>';
var powerAtt2_d2 = '<?php echo  $attaque2_d2->getpowerAttaque(); ?>';
var genreAtt3_d2 = '<?php echo  $attaque3_d2->getgenreAttaque(); ?>';
var powerAtt3_d2 = '<?php echo  $attaque3_d2->getpowerAttaque(); ?>';
var genreAtt4_d2 = '<?php echo  $attaque4_d2->getgenreAttaque(); ?>';
var powerAtt4_d2 = '<?php echo  $attaque4_d2->getpowerAttaque(); ?>';

function typAttD1evo1(){
  genreAtt1_d1 = '<?php echo  $attaque1_d1evo1->getgenreAttaque(); ?>';
  powerAtt1_d1 = '<?php echo  $attaque1_d1evo1->getpowerAttaque(); ?>';
  genreAtt2_d1 = '<?php echo  $attaque2_d1evo1->getgenreAttaque(); ?>';
  powerAtt2_d1 = '<?php echo  $attaque2_d1evo1->getpowerAttaque(); ?>';
  genreAtt3_d1 = '<?php echo  $attaque3_d1evo1->getgenreAttaque(); ?>';
  powerAtt3_d1 = '<?php echo  $attaque3_d1evo1->getpowerAttaque(); ?>';
  genreAtt4_d1 = '<?php echo  $attaque4_d1evo1->getgenreAttaque(); ?>';
  powerAtt4_d1 = '<?php echo  $attaque4_d1evo1->getpowerAttaque(); ?>';
}
function typAttD1evo2(){
  genreAtt1_d1 = '<?php echo  $attaque1_d1evo2->getgenreAttaque(); ?>';
  powerAtt1_d1 = '<?php echo  $attaque1_d1evo2->getpowerAttaque(); ?>';
  genreAtt2_d1 = '<?php echo  $attaque2_d1evo2->getgenreAttaque(); ?>';
  powerAtt2_d1 = '<?php echo  $attaque2_d1evo2->getpowerAttaque(); ?>';
  genreAtt3_d1 = '<?php echo  $attaque3_d1evo2->getgenreAttaque(); ?>';
  powerAtt3_d1 = '<?php echo  $attaque3_d1evo2->getpowerAttaque(); ?>';
  genreAtt4_d1 = '<?php echo  $attaque4_d1evo2->getgenreAttaque(); ?>';
  powerAtt4_d1 = '<?php echo  $attaque4_d1evo2->getpowerAttaque(); ?>';
}
function typAttD2evo1(){
  genreAtt1_d2 = '<?php echo  $attaque1_d2evo1->getgenreAttaque(); ?>';
  powerAtt1_d2 = '<?php echo  $attaque1_d2evo1->getpowerAttaque(); ?>';
  genreAtt2_d2 = '<?php echo  $attaque2_d2evo1->getgenreAttaque(); ?>';
  powerAtt2_d2 = '<?php echo  $attaque2_d2evo1->getpowerAttaque(); ?>';
  genreAtt3_d2 = '<?php echo  $attaque3_d2evo1->getgenreAttaque(); ?>';
  powerAtt3_d2 = '<?php echo  $attaque3_d2evo1->getpowerAttaque(); ?>';
  genreAtt4_d2 = '<?php echo  $attaque4_d2evo1->getgenreAttaque(); ?>';
  powerAtt4_d2 = '<?php echo  $attaque4_d2evo1->getpowerAttaque(); ?>';
}
function typAttD2evo2(){
  genreAtt1_d2 = '<?php echo  $attaque1_d2evo2->getgenreAttaque(); ?>';
  powerAtt1_d2 = '<?php echo  $attaque1_d2evo2->getpowerAttaque(); ?>';
  genreAtt2_d2 = '<?php echo  $attaque2_d2evo2->getgenreAttaque(); ?>';
  powerAtt2_d2 = '<?php echo  $attaque2_d2evo2->getpowerAttaque(); ?>';
  genreAtt3_d2 = '<?php echo  $attaque3_d2evo2->getgenreAttaque(); ?>';
  powerAtt3_d2 = '<?php echo  $attaque3_d2evo2->getpowerAttaque(); ?>';
  genreAtt4_d2 = '<?php echo  $attaque4_d2evo2->getgenreAttaque(); ?>';
  powerAtt4_d2 = '<?php echo  $attaque4_d2evo2->getpowerAttaque(); ?>';
}


var joueur="d1";
var joueur2 = document.getElementById('Mess2');
var joueur1 = document.getElementById('Mess1');

/*----Fonction des attaques D1---------------*/
function perteVie2(powerAtt1_d1){
  pvD2=pvD2-powerAtt1_d1;
  document.getElementById("vie_d2").value = pvD2;
  joueur="d2";
  joueur2.innerHTML ="";
};

function evol1D1(){
  switch (NamePokemonD1) {
    case "carapuce":
      Pok_d1.classList.toggle("carabaffe_d1")
      break;
    case "bulbizarre":
      Pok_d1.classList.toggle("herbizarre_d1")
      break;
    case "salameche":
      Pok_d1.classList.toggle("reptincel_d1")
      break;
    case "fantominus":
      Pok_d1.classList.toggle("spectrum_d1")
      break;
    default:
  };
  attD1evo1();
  typAttD1evo1();
  pokemon1.innerHTML = nomD1Evo1;
}
function evol2D1(){
  switch (NamePokemonD1) {
    case "carapuce":
      Pok_d1.classList.toggle("tortank_d1")
      break;
    case "bulbizarre":
      Pok_d1.classList.toggle("florizarre_d1")
      break;
    case "salameche":
      Pok_d1.classList.toggle("dracaufeu_d1")
      break;
    case "fantominus":
      Pok_d1.classList.toggle("ectoplasma_d1")
      break;
    default:
  };
  attD1evo2();
  typAttD1evo2();
  pokemon1.innerHTML = nomD1Evo2;
}
function mortD2(){
  lvl_d1.innerHTML = lvlD1;
  document.getElementById("vie_d2").value = 0;
  joueur2.innerHTML = "Vous êtes mort !!!!";
  document.getElementById("rejouer").style.display= "block";
  document.getElementById("att1_d1").style.display= "none";
  document.getElementById("att2_d1").style.display= "none";
  document.getElementById("att3_d1").style.display= "none";
  document.getElementById("att4_d1").style.display= "none";
  document.getElementById("att1_d2").style.display= "none";
  document.getElementById("att2_d2").style.display= "none";
  document.getElementById("att3_d2").style.display= "none";
  document.getElementById("att4_d2").style.display= "none";
}

function perteVieGainD1(powerAtt1_d1){
  pvD2=pvD2-powerAtt1_d1;
  document.getElementById("vie_d2").value = pvD2;
  if(pvD1<(parseInt(pvD1max)-parseInt(powerAtt1_d1))){
    pvD1=parseInt(pvD1)+parseInt(powerAtt1_d1);
    document.getElementById("vie_d1").value = pvD1;
  }else{
    pvD1=pvD1max;
    document.getElementById("vie_d1").value = pvD1;
  }
  joueur2.innerHTML ="";
  joueur="d2";
}

/*----Fonction des attaques D2---------------*/

function perteVie1(powerAtt1_d2){
  pvD1=pvD1-powerAtt1_d2;
  document.getElementById("vie_d1").value = pvD1;
  joueur="d1";
  joueur1.innerHTML ="";
};

function evol1D2(){
  switch (NamePokemonD2) {
    case "carapuce":
      Pok_d2.classList.toggle("carabaffe_d2")
      break;
    case "bulbizarre":
      Pok_d2.classList.toggle("herbizarre_d2")
      break;
    case "salameche":
      Pok_d2.classList.toggle("reptincel_d2")
      break;
    case "fantominus":
      Pok_d2.classList.toggle("spectrum_d2")
      break;
    default:
  };
  attD2evo1();
  typAttD2evo1();
  pokemon1.innerHTML = nomD2Evo1;
}
function evol2D2(){
  switch (NamePokemonD2) {
    case "carapuce":
      Pok_d2.classList.toggle("tortank_d2")
      break;
    case "bulbizarre":
      Pok_d2.classList.toggle("florizarre_d2")
      break;
    case "salameche":
      Pok_d2.classList.toggle("dracaufeu_d2")
      break;
    case "fantominus":
      Pok_d2.classList.toggle("ectoplasma_d2")
      break;
    default:
  };
  attD2evo2();
  typAttD2evo2();
  pokemon1.innerHTML = nomD2Evo2;
}
function mortD1(){
  lvl_d2.innerHTML = lvlD2;
  document.getElementById("vie_d1").value = 0;
  joueur1.innerHTML = "Vous êtes mort !!!!";
  document.getElementById("rejouer").style.display= "block";
  document.getElementById("att1_d1").style.display= "none";
  document.getElementById("att2_d1").style.display= "none";
  document.getElementById("att3_d1").style.display= "none";
  document.getElementById("att4_d1").style.display= "none";
  document.getElementById("att1_d2").style.display= "none";
  document.getElementById("att2_d2").style.display= "none";
  document.getElementById("att3_d2").style.display= "none";
  document.getElementById("att4_d2").style.display= "none";
}

function perteVieGainD2(powerAtt1_d2){
  pvD1=pvD1-powerAtt1_d2;
  document.getElementById("vie_d1").value = pvD1;
  if(pvD2<(parseInt(pvD2max)-parseInt(powerAtt1_d2))){
    pvD2=parseInt(pvD2)+parseInt(powerAtt1_d2);
    document.getElementById("vie_d2").value = pvD2;
  }else{
    pvD2=pvD2max;
    document.getElementById("vie_d2").value = pvD2;
  }
  joueur1.innerHTML ="";
  joueur="d1";
}

// Attaque 1 D1 fonction JS
function attaque1_d1(){
  if (joueur=="d1" && genreAtt1_d1 != 2){
    if(pvD2>powerAtt1_d1){
      perteVie2(powerAtt1_d1);
    }else{
      lvlD1++;
      if (lvlD1==3) {
        evol1D1();
      }else if(lvlD1==5){
        evol2D1();
      }
      mortD2();
    }
  }else if (joueur=="d1" && genreAtt1_d1 == 2) {
    if(pvD2>powerAtt1_d1){
      perteVieGainD1(powerAtt1_d1);
    }else{
      lvlD1++;
      if (lvlD1==3) {
          evol1D1();
      }else if(lvlD1==5){
          evol2D1();
      }
      mortD2();
    }
  }else {
    joueur2.innerHTML ="";
    joueur1.innerHTML = "Ce n'est pas à vous de jouer !!!!";
  }
}
// Attaque 2 D1 fonction JS
function attaque2_d1(){
  if (joueur=="d1" && genreAtt2_d1 != 2){
    if(pvD2>powerAtt2_d1){
      perteVie2(powerAtt2_d1);
    }else{
      lvlD1++;
      if (lvlD1==3) {
          evol1D1();
      }else if(lvlD1==5){
          evol2D1();
      }
      mortD2();
    }
  }else if (joueur=="d1" && genreAtt2_d1 == 2) {
    if(pvD2>powerAtt2_d1){
      perteVieGainD1(powerAtt2_d1);
    }else{
      lvlD1++;
      if (lvlD1==3) {
          evol1D1();
      }else if(lvlD1==5){
          evol2D1();
      }
      mortD2();
    }
  }else {
    joueur2.innerHTML ="";
    joueur1.innerHTML = "Ce n'est pas à vous de jouer !!!!";
  }
}
// Attaque 3 D1 fonction JS
function attaque3_d1(){
  if (joueur=="d1" && genreAtt3_d1 != 2){
    if(pvD2>powerAtt3_d1){
      perteVie2(powerAtt3_d1);
    }else{
      lvlD1++;
      if (lvlD1==2) {
        evol1D1();
      }else if(lvlD1==5){
        evol2D1();
      }
      mortD2();
    }
  }else if (joueur=="d1" && genreAtt3_d1 == 2) {
    if(pvD2>powerAtt3_d1){
      perteVieGainD1(powerAtt3_d1);
    }else{
      lvlD1++;
      if (lvlD1==3) {
          evol1D1();
      }else if(lvlD1==5){
          evol2D1();
      }
      mortD2();
    }
  }else {
    joueur2.innerHTML ="";
    joueur1.innerHTML = "Ce n'est pas à vous de jouer !!!!";
  }
}
// Attaque 4 D1 fonction JS
function attaque4_d1(){
  if (joueur=="d1" && genreAtt4_d1 != 2){
    if(pvD2>powerAtt4_d1){
      perteVie2(powerAtt4_d1);
    }else{
      lvlD1++;
      if (lvlD1==3) {
        evol1D1();
      }else if(lvlD1==5){
        evol2D1();
      }
      mortD2();
    }
  }else if (joueur=="d1" && genreAtt4_d1 == 2) {
    if(pvD2>powerAtt4_d1){
      perteVieGainD1(powerAtt4_d1);
    }else{
      lvlD1++;
      if (lvlD1==3) {
          evol1D1();
      }else if(lvlD1==5){
          evol2D1();
      }
      mortD2();
    }
  }else {
    joueur2.innerHTML ="";
    joueur1.innerHTML = "Ce n'est pas à vous de jouer !!!!";
  }
}
// Attaque 1 D2 fonction JS
function attaque1_d2(){
  if (joueur=="d2" && genreAtt1_d2 != 2){
    if(pvD1>powerAtt1_d2){
      perteVie1(powerAtt1_d2);
    }else{
      lvlD2++;
      if (lvlD2==3) {
        evol1D2();
      }else if(lvlD2==5){
        evol2D2();
      }
      mortD1();
    }
  }else if (joueur=="d2" && genreAtt1_d2 == 2) {
    if(pvD1>powerAtt1_d2){
      perteVieGainD2(powerAtt1_d2);
    }else{
      lvlD2++;
      if (lvlD2==3) {
        evol1D2();
      }else if(lvlD2==5){
        evol2D2();
      }
      mortD2();
    }
  }else {
    joueur1.innerHTML ="";
    joueur2.innerHTML = "Ce n'est pas à vous de jouer !!!!";
  }
}
// Attaque 2 D2 fonction JS
function attaque2_d2(){
  if (joueur=="d2" && genreAtt2_d2 != 2){
    if(pvD1>powerAtt2_d2){
      perteVie1(powerAtt2_d2);
    }else{
      lvlD2++;
      if (lvlD2==3) {
        evol1D2();
      }else if(lvlD2==5){
        evol2D2();
      }
      mortD1();
    }
  }else if (joueur=="d2" && genreAtt2_d2 == 2) {
    if(pvD1>powerAtt2_d2){
      perteVieGainD2(powerAtt2_d2);
    }else{
      lvlD2++;
      if (lvlD2==3) {
        evol1D2();
      }else if(lvlD2==5){
        evol2D2();
      }
      mortD2();
    }
  }else {
    joueur1.innerHTML ="";
    joueur2.innerHTML = "Ce n'est pas à vous de jouer !!!!";
  }
}
// Attaque 3 D2 fonction JS
function attaque3_d2(){
  if (joueur=="d2" && genreAtt3_d2 != 2){
    if(pvD1>powerAtt3_d2){
      perteVie1(powerAtt3_d2);
    }else{
      lvlD2++;
      if (lvlD2==3) {
        evol1D2();
      }else if(lvlD2==5){
        evol2D2();
      }
      mortD1();
    }
  }else if (joueur=="d2" && genreAtt3_d2 == 2) {
    if(pvD1>powerAtt3_d2){
      perteVieGainD2(powerAtt3_d2);
    }else{
      lvlD2++;
      if (lvlD2==3) {
        evol1D2();
      }else if(lvlD2==5){
        evol2D2();
      }
      mortD2();
    }
  }else {
    joueur1.innerHTML ="";
    joueur2.innerHTML = "Ce n'est pas à vous de jouer !!!!";
  }
}
// Attaque 4 D2 fonction JS
function attaque4_d2(){
  if (joueur=="d2" && genreAtt4_d2 != 2){
    if(pvD1>powerAtt4_d2){
      perteVie1(powerAtt4_d2);
    }else{
      lvlD2++;
      if (lvlD2==3) {
        evol1D2();
      }else if(lvlD2==5){
        evol2D2();
      }
      mortD1();
    }
  }else if (joueur=="d2" && genreAtt4_d2 == 2) {
    if(pvD1>powerAtt4_d2){
      perteVieGainD2(powerAtt4_d2);
    }else{
      lvlD2++;
      if (lvlD2==3) {
        evol1D2();
      }else if(lvlD2==5){
        evol2D2();
      }
      mortD2();
    }
  }else {
    joueur1.innerHTML ="";
    joueur2.innerHTML = "Ce n'est pas à vous de jouer !!!!";
  }
}

function rejouer(){
  document.getElementById("rejouer").style.display= "none";
  document.getElementById("att1_d1").style.display= "block";
  document.getElementById("att2_d1").style.display= "block";
  document.getElementById("att3_d1").style.display= "block";
  document.getElementById("att4_d1").style.display= "block";
  document.getElementById("att1_d2").style.display= "block";
  document.getElementById("att2_d2").style.display= "block";
  document.getElementById("att3_d2").style.display= "block";
  document.getElementById("att4_d2").style.display= "block";
  pvD2= ptvD2;
  pvD1= ptvD1;
  document.getElementById("vie_d2").value = pvD2;
  document.getElementById("vie_d1").value = pvD1;
  joueur1.innerHTML ="";
  joueur2.innerHTML ="";
}


</script>
