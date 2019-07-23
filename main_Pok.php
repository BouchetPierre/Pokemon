<?php
require('verification_d1.php');
require('verification_d2.php');
require('login_d2.php');
require('Class_attaque.php');
require('Class_Pok.php');
require('Class_dresseurs.php');

/*------connection base de donnees-------*/
try {
  $dresseur= new PDO('mysql:host=localhost;dbname=jeu_pokemon;charset=utf8', 'root', 'ADRAR1112', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}catch (Exception $e){
  die('Erreur : '.$e->getMessage());
};

$affichage= $dresseur->query('SELECT name, url_image_d1, pv  FROM pokemonDesk WHERE evol = "1" ORDER BY id_pokemon');
$donnee = $affichage->fetch();

i=0;
foreach ($donnee as $donne) {
  $pokemon.(i+1) = new Pokemon($donnee['name'],$donnee['url_image_d1'],$donnee['pv']);
  i++;
};



$dresseur_d1 = new Dresseur();

$dresseur_d2 = new Dresseur();




 ?>
