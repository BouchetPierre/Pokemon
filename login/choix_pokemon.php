<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="login.css">
    <title>Log In</title>
</head>
<body>
    <div class="container">
        <h1>Choix du pokémon</h1>

        <?php
  /*------connection base de donnees-------*/
          try {
          $dresseur= new PDO('mysql:host=localhost;dbname=jeu_pokemon;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
          }
          catch (Exception $e)
          {
          die('Erreur : '.$e->getMessage());
          }

        /*--------affichage des dresseurs sur la la page et du choix des pokemons----------*/
        $affichage= $dresseur->query('SELECT name FROM dresseur ORDER BY id_dresseur DESC LIMIT 1');

        while ($donnee = $affichage->fetch())
        {
        echo "<strong>".$donnee['name']."</strong>"."</br>";
        $lsPok= $dresseur->query('SELECT name, url_image_d1 FROM pokemonDesk WHERE evol = "1" ORDER BY id_pokemon');
        ?>
        <form method="post" action="../main_Pok.php">
            <?php    while ($listePok = $lsPok->fetch())
            {
              echo "<input type='checkbox' name=".$listePok ['name']." value=''/><label for='moins15'>".$listePok ['name']."<img src=".$listePok ['url_image_d1']." alt= 'blabla'></label><br />";
              echo "</br>";
            }
            $lsPok->closeCursor();
    }
      ?>
            <input type="submit" value="Envoyer" />
        </form>
        <?php

        $affichage->closeCursor();





        ?>


    </div>
</body>
</html>
