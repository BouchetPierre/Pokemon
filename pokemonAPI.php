<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link type="text/css" rel="stylesheet" href="pokemon.css">
    <title>Pokemon</title>
  </head>
  <header>

  </header>
  <body>

    <?php
    $url = "https://pokeapi.co/api/v2/pokemon/pikachu/?limit=20"; /*creation de l'adresse HTTP*/

    $raw = file_get_contents($url);

    echo $raw;
    ?>

  </body>
</html>
