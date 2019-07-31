<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="combat.css">
  <meta charset="UTF-8">

  <title>Arène Pokémon</title>
</head>
<body>
  <div class="background">

    <div id="bg1">
     <div id="bg2">
      <div id="bg3">
        <div class="titre">
          <h1><img src="image/uranium.png" alt="titre" width="500px"
            height="200px"></h1>
        </div>

        <div class="hero">
          <!--Partie gauche dresseur 1-->
          <div class="dresseur_d1">
            <h2 id="name_d1"></h2>
              <div class="att_d1">
              </div>
          </div>

              <!--Partie centrale-->
          <div class="arene">
            <div id="pokemon_d1" class="pokemon_d1">
            </div>
            <div class="combat" >
              <form id="combatez" action="main_Pok.php" method="post">
                <input type="submit" id="combatez" name="combatez" value="combatez">
              </form>
            </div>
            <div id="pokemon_d2" class="pokemon_d2">
            </div>
          </div>
          <!--Partie droite dresseur 2-->
          <div class="dresseur_d2">
            <h2 id="name_d2"></h2>
              <div class="att_d2">
              </div>          
          </div>
        </div>
        <footer>
          <h5>copyright</h5>
        </footer>
    </div>
  </div>
</div>

</body>
</html>
