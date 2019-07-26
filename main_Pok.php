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


$attaq_d1= $dresseur->prepare('SELECT name
                                  FROM typeAttaque
                                  WHERE id_typeAttaque = ? AND id_typeAttaque = ? AND id_typeAttaque = ? AND id_typeAttaque = ? ');
$reqAt1 = $attaq_d1->execute(array($donneeD1['fk_id_att1'], $donneeD1['fk_id_att2'], $donneeD1['fk_id_att3'], $donneeD1['fk_id_att4']));

$donneeAttD1 = $attaq_d1->fetch();
var_dump($donneeAttD1);



$pokemonDres_1 = new Pokemon($donneeD1['name'], $donneeD1['url_image_d1'], $donneeD1['pv'], $donneeAttD1[0], $donneeAttD1[1], $donneeAttD1[2], $donneeAttD1[3]);
var_dump($pokemonDres_1).'<br>';


/*------requete et construction Pokemon 2-------*/


$_SESSION['pokemon_d2']=$_POST['pokemon_d2'];

$affichage_d2= $dresseur->prepare('SELECT name, url_image_d2, pv, fk_id_att1, fk_id_att2, fk_id_att3, fk_id_att4
                                  FROM pokemonDesk
                                  WHERE name = ?');
$req2 = $affichage_d2->execute(array($_SESSION['pokemon_d2']));

$donneeD2 = $affichage_d2->fetch();


$attaq_d2= $dresseur->prepare('SELECT name
                                  FROM typeAttaque
                                  WHERE id_typeAttaque = ? AND id_typeAttaque = ? AND id_typeAttaque = ? AND id_typeAttaque = ? ');
$reqAt2 = $attaq_d2->execute(array($donneeD2['fk_id_att1'], $donneeD2['fk_id_att2'], $donneeD2['fk_id_att3'], $donneeD2['fk_id_att4']));

$donneeAttD2 = $attaq_d2->fetch();
var_dump($donneeAttD2);



$pokemonDres_2 = new Pokemon($donneeD2['name'], $donneeD2['url_image_d2'], $donneeD2['pv'], $donneeAttD2[0], $donneeAttD2[1], $donneeAttD2[2], $donneeAttD2[3]);
var_dump($pokemonDres_2).'<br>';



/*------construction Dresseur------*/


$dresseur_d1 = new Dresseur($_SESSION['name_d1']);
var_dump($dresseur_d1).'<br>';

$dresseur_d2 = new Dresseur($_SESSION['name_d2']);
var_dump($dresseur_d2).'<br>';


/*------requete et des attaques du dresseur 1-------*/


/*$att1= $attaque->prepare('SELECT name, degat, pp, genreAttaque
                                  FROM typeAttaque
                                  WHERE name = ?');

$req3 = $att1->execute(array($_SESSION['pokemon_d2']));
$donneeAtt1 = $att1->fetch();

$attaque = new Attaque();*/




 ?>
