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

$affichage_d1= $dresseur->prepare('SELECT name, url_image_d1, pv, fk_id_att1, fk_id_att2, fk_id_att3, fk_id_att4
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

$pokemonDres_1 = new Pokemon($donneeD1['name'], $donneeD1['url_image_d1'], $donneeD1['pv'], $tabResNameD1[0], $tabResNameD1[1], $tabResNameD1[2], $tabResNameD1[3]);


/*------requete et construction Pokemon 2-------*/

$_SESSION['pokemon_d2']=$_POST['pokemon_d2'];

$affichage_d2= $dresseur->prepare('SELECT name, url_image_d2, pv, fk_id_att1, fk_id_att2, fk_id_att3, fk_id_att4
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
$pokemonDres_2 = new Pokemon($donneeD2['name'], $donneeD2['url_image_d2'], $donneeD2['pv'], $tabResNameD2[0], $tabResNameD2[1], $tabResNameD2[2], $tabResNameD2[3]);

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

$AQuiLeTour='d1';
if(!empty($_POST['attaque1_d1']) && $AQuiLeTour=='d1' && $tabResGenretD2 != 2) {

  degats($pokemonDres_2->getptVie(),$attaque1_d1->getpowerAttaque());
  $pokemonDres_2->setptVie($ptVie);
  $AQuiLeTour='d2';
  var_dump('$ptvie');

} elseif (!empty($_POST['attaque1_d1']) && $AQuiLeTour=='d1' && $tabResGenretD2 == 2) {

  degats($pokemonDres_2->getptVie(),$attaque1_d1->getpowerAttaque());
  gainVie($pokemonDres_1->getptVie(),$attaque1_d1->getpowerAttaque(),$pokemonDres_1->getptVieMax());
  $AQuiLeTour='d2';

} else if(!empty($_POST['attaque1_d1'])){
  echo "Ce n'est pas à vous de jouer !!!";
}



 ?>
