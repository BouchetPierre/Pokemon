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
      

          try {
          $dresseur= new PDO('mysql:host=localhost;dbname=jeu_pokemon;charset=utf8', 'root', 'ADRAR1112', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
          }
          catch (Exception $e)
          {
          die('Erreur : '.$e->getMessage());
          }

        /*--------affichage du dresseur 1 sur la  page et du choix des pokemons----------*/


        $lsPok= $dresseur->query('SELECT name, url_image_d1 FROM pokemonDesk WHERE evol = "1" ORDER BY id_pokemon');
        ?>

        <form method="post" action="login_d2.php">
            <?php


            while ($listePok_d1 = $lsPok->fetch())
            {
              echo "<input type='radio' name='pokemon_d1' value= $listePok_d1 /><label'>".$listePok_d1 ['name']."<img src=".$listePok_d1 ['url_image_d1']." alt= 'blabla'></label><br />";
              echo "</br>";
            }

            $lsPok->closeCursor();


      ?>
            <input type="submit" value="Envoyer" />
        </form>
        <?php







        ?>


    </div>
</body>
</html>
