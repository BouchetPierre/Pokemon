
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
          $dresseur= new PDO('mysql:host=localhost;dbname=jeu_pokemon;charset=utf8', 'root', 'ADRAR1112', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
          }
          catch (Exception $e)
          {
          die('Erreur : '.$e->getMessage());
          }

        /*--------affichage du dresseur 2 sur  la page et du choix des pokemons----------*/

        $lsPok_d2= $dresseur->query('SELECT name, url_image_d2 FROM pokemonDesk WHERE evol = "1" ORDER BY id_pokemon');
        ?>
        <form method="post" action="../main_Pok.php">

          <?php

            while ($listePok_d2 = $lsPok_d2->fetch())
            {
              $pokemon_d2=$listePok_d2['name'];
              echo "<input type='checkbox' name=".$pokemon_d2." value=''/><label'>".$pokemon_d2."<img src=".$listePok_d2 ['url_image_d2']." alt= 'blabla'></label><br />";
              echo "</br>";
            }
            $lsPok_d2->closeCursor();
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
