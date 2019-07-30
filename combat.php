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
          <h1>Arène de combat</h1>
        </div>

        <div class="hero">
          <!--Partie gauche dresseur 1-->
          <div class="dresseur_d1">
              <h2>Dresseur 1</h2>
              <div class="attaque_d1">

                <form class="attaque1_d1" action="main_Pok.php" method="post">
                  <input type="submit" name="attaque1_d1" width="150px" value="">
                </form>

                <form class="attaque2_d1" action="main_Pok.php" method="post">
                  <input type="submit" name="attaque2_d1" value="">
                </form>

                <form class="attaque3_d1" action="main_Pok.php" method="post">
                  <input type="submit" name="attaque3_d1" value="">
                </form>

                <form class="attaque4_d1" action="main_Pok.php" method="post">
                  <input type="submit" name="attaque4_d1" value="">
                </form>
              </div>

            <div class="ptVie_d1">
              <!--<h3>Point de vie Pokemon 1</h3>-->
                <progress id="vie_d1" value="50" max="100"></progress>
            </div>
          </div>
              <!--Partie centrale-->
          <div class="arene">
            <div id="pokemon_d1" class="pokemon_d1">

            </div>
              <div class="combat" >


              </div>
            <div id="pokemon_d2" class="pokemon_d2">

            </div>
          </div>
          <!--Partie droite dresseur 2-->
          <div class="dresseur_d2">
            <h2>Dresseur 2</h2>
              <div class="attaque_d2">
                <form class="attaque1_d2" action="main_Pok.php" method="post">
                  <input type="submit" name="attaque1_d2" value="">
                </form>
                <form class="attaque2_d2" action="main_Pok.php" method="post">
                  <input type="submit" name="attaque2_d2" value="">
                </form>
                <form class="attaque3_d2" action="main_Pok.php" method="post">
                  <input type="submit" name="attaque3_d2" value="">
                </form>
                <form class="attaque4_d2" action="main_Pok.php" method="post">
                  <input type="submit" name="attaque4_d2" value="">
                </form>
              </div>
            <div class="ptVie_d2">
            <!--  <h3>Point de vie Pokemon 2</h3> -->
                <progress id="vie_d2" value="50" max="100"></progress>
            </div>
          </div>
        </div>
        <footer>
          <h5>copyright</h5>
        </footer>
    </div>
  </div>
</div>

      <script> // Script de la barre de vie à adapter ///

          var PvProgress_d1 = document.getElementById("vie_d1");
          var PvProgress_d2 = document.getElementById("vie_d2");// valeur max
          var degats_d1;
          var degats_d2;
          function pertePv_d1() {
              if(pvProgress_d1 >=0) {
                  progress = pvProgress_d1 - degats_d1;
                  return PvProgress_d1
              }else{
                  alert("Vous êtes mort ! ")
              }
          };
          function pertePv_d2() {
              if(pvProgress_d2 >=0) {
                  progress = pvProgress_d2 - degats_d2;
                  return PvProgress_d2
              }else{
                  alert("Vous êtes mort ! ")
              }
          };

      </script>

    <script>
<?php
require_once('main_Pok.php');?>;

var NamePokemonD1 = <?php echo $_ENV[$NamePokemon_d1]; ?>;
console.log (NamePokemonD1);

var Pok_d1 = document.getElementById("pokemon_d1");
switch (NamePokemonD1) {
  case "carapuce":
    Pok_d1.classList.toggle("carapuce_d1")
    break;
  case "bulbizarre":
    Pok_d1.classList.toggle("bulbizarre_d1")
    break;
  case "salameche":
    Pok_d1.classList.toggle("salameche_d1")
    break;
  case "fontominus":
    Pok_d1.classList.toggle("fontominus_d1")
    break;

  default:
}

var NamePokemonD2 = <?php echo json_encode('NamePokemon_d2'); ?>;
console.log (NamePokemonD2);

var Pok_d2 = document.getElementById("pokemon_d2");
switch (NamePokemonD2) {
  case "carapuce":
    Pok_d1.classList.toggle("carapuce_d2")
    break;
  case "bulbizarre":
    Pok_d1.classList.toggle("bulbizarre_d2")
    break;
  case "salameche":
    Pok_d1.classList.toggle("salameche_d2")
    break;
  case "fontominus":
    Pok_d1.classList.toggle("fontominus_d2")
    break;

  default:
}
</script>



</body>
</html>
