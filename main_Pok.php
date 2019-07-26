<?php
session_start();
require('Class_Pok.php');
require('Class_dresseurs.php');
require('Class_attaque.php');
require('combat.html');

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
          SELECT name FROM typeAttaque
            WHERE id_typeAttaque
            IN (".$bindsD1Prepared.")
          ");

$resultsD1 = $attaq_d1->fetchAll();

$tabResultD1;
foreach($resultsD1 as $result){
  $tabResultD1[] = ($result['name']);
}

$pokemonDres_1 = new Pokemon($donneeD1['name'], $donneeD1['url_image_d1'], $donneeD1['pv'], $tabResultD1[0], $tabResultD1[1], $tabResultD1[2], $tabResultD1[3]);

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
          SELECT name FROM typeAttaque
            WHERE id_typeAttaque
            IN (".$bindsD2Prepared.")
          ");

$resultsD2 = $attaq_d2->fetchAll();

$tabResultD2;
foreach($resultsD2 as $result){
  $tabResultD2[] = ($result['name']);
}

$pokemonDres_2 = new Pokemon($donneeD2['name'], $donneeD2['url_image_d2'], $donneeD2['pv'], $tabResultD2[0], $tabResultD2[1], $tabResultD2[2], $tabResultD2[3]);

/*------construction Dresseur------*/


$dresseur_d1 = new Dresseur($_SESSION['name_d1']);


$dresseur_d2 = new Dresseur($_SESSION['name_d2']);


/*------requete et des attaques du dresseur 1-------*/


/*$att1= $attaque->prepare('SELECT name, degat, pp, genreAttaque
                                  FROM typeAttaque
                                  WHERE name = ?');

$req3 = $att1->execute(array($_SESSION['pokemon_d2']));
$donneeAtt1 = $att1->fetch();

$attaque = new Attaque();*/




 ?>
