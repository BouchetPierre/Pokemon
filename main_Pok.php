<?php
session_start();

/*------connection base de donnees-------*/
try {
  $dresseur= new PDO('mysql:host=localhos;dbname=jeu_pokemon;charset=utf8', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}catch (Exception $e){
  die('Erreur : '.$e->getMessage());
};

/*------requete et construction Pokemon 1-------*/

/*$affichage_d1= $dresseur->prepare('SELECT name, url_image_d1, pv, att1, att2, att3, att4
                                  FROM pokemonDesk
                                  WHERE name = '?''
                                    );
$req1 = $affichage_d1->execute($_SESSION[$pokemon_d1]);
$donneeD1 = $affichage_d1->fetch();*/
var_dump($donneeD1);
var_dump($_POST['$pokemon_d2']);
var_dump($_SESSION['$pokemon_d1']);
var_dump($_SESSION['name_d1']);
var_dump($_SESSION['name_d2']);
die;

$pokemonDres_1 = new Pokemon($donneeD1['name'], $donneeD1['url_image_d1'], $donneeD1['pv'], $donneeD1['att1'], $donneeD1['att2'], $donneeD1['att3'], $donneeD1['att4']);

/*------requete et construction Pokemon 2-------*/

$_SESSION[$pokemon_d2]=$_POST[$pokemon_d2];

$affichage_d2= $dresseur->prepare('SELECT name, url_image_d2, pv, att1, att2, att3, att4
                                  FROM pokemonDesk
                                  WHERE name = ?'
                                    );
$req2 = $affichage_d2->execute($_SESSION[$pokemon_d2]);
$donneeD2 = $affichage_d2->fetch();

$pokemonDres_2 = new Pokemon($donneeD2['name'], $donneeD2['url_image_d2'], $donneeD2['pv'], $donneeD2['att1'], $donneeD2['att2'], $donneeD2['att3'], $donneeD2['att4']);


/*------construction Dresseur------*/

$dresseur_d1 = new Dresseur($_SESSION['name_d1']);

$dresseur_d2 = new Dresseur($_SESSION['name_d2']);


/*------requete et des attaques du dresseur 1-------*/
$att1= $attaque->prepare('SELECT name, degat, pp, genreAttaque
                                  FROM typeAttaque
                                  WHERE name = ?'
                                    );
$req3 = $att1->execute($_SESSION[$pokemon_d2]);
$donneeAtt1 = $att1->fetch();

$attaque = new Attaque();




 ?>
