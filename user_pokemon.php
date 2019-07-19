<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">

  <title>Pokemon</title>
</head>
<body>
  <h1>POKEMON</h1>

  <h2>Amis Dresseurs, choisissez vos Pokemons</h2>

<?php
  /*------connection base de donnees-------*/
  try {
  $dresseur= new PDO('mysql:host=localhost;dbname=jeu_pokemon;charset=utf8', 'root', 'ADRAR1112', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
  }
  catch (Exception $e)
  {
  die('Erreur : '.$e->getMessage());
  }

/*--------envoi des dresseurs sur la bd----------*/
  if (isset($_POST["dresseur1"]) && isset($_POST["dresseur2"])){

  $envoi= $dresseur->prepare('INSERT INTO dresseur(name) VALUES (?),(?)');
  $envoi->execute(array( htmlspecialchars($_POST['dresseur1']), htmlspecialchars($_POST['dresseur2'])));

  };

/*--------affichage des dresseurs sur la la page----------*/
  $affichage= $dresseur->query('SELECT name FROM dresseur ORDER BY id_dresseur DESC LIMIT 2');

  while ($donnee = $affichage->fetch())
  {
    echo "<strong>".$donnee['name']."</strong>"."</br>";
    $lsPok= $dresseur->query('SELECT name, url_image_d1 FROM pokemonDesk WHERE evol = "1" ORDER BY id_pokemon');

    while ($listePok = $lsPok->fetch())
    {
      echo $listePok ['name']."<img src=".$listePok ['url_image_d1']." alt= 'blabla'></br>";
      echo "</br>";
    }
    $lsPok->closeCursor();
  }
  $affichage->closeCursor();

/*--------affichage des Pokemons sur la la page pour le choix----------*/



  ?>
</body>
</html>
