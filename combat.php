<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="combat.css">
  <meta charset="UTF-8">

  <title>Document</title>
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
              <h2>Dresseur 1</h2>
              <div class="attaque_d1">

                <form class="attaque1_d1" action="index.html" method="post">
                  <input type="submit" name="attaque1_d1" width="150px" value="">
                </form>

                <form class="attaque2_d1" action="index.html" method="post">
                  <input type="submit" name="attaque2_d1" value="">
                </form>

                <form class="attaque3_d1" action="index.html" method="post">
                  <input type="submit" name="attaque3_d1" value="">
                </form>

                <form class="attaque4_d1" action="index.html" method="post">
                  <input type="submit" name="attaque4_d1" value="">
                </form>
              </div>

            <div class="ptVie_d1">
              <!--<h3>Point de vie Pokemon 1</h3>-->
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
                <form class="attaque1_d2" action="index.html" method="post">
                  <input type="submit" name="attaque1_d2" value="">
                </form>
                <form class="attaque2_d2" action="index.html" method="post">
                  <input type="submit" name="attaque2_d2" value="">
                </form>
                <form class="attaque3_d2" action="index.html" method="post">
                  <input type="submit" name="attaque3_d2" value="">
                </form>
                <form class="attaque4_d2" action="index.html" method="post">
                  <input type="submit" name="attaque4_d2" value="">
                </form>
              </div>
            <div class="ptVie_d2">
            <!--  <h3>Point de vie Pokemon 2</h3> -->
            </div>
          </div>
        </div>
        <footer>
          <h5>copyright</h5>
        </footer>
    </div>
  </div>
</div>
<!--https://www.webdesignweb.fr/web/effet-de-parallaxe-sur-son-site-jparallax-941 a revoir le parallaxe
  <script type="text/javascript" src="script/jquery.js"></script>
  <script type="text/javascript" src="./script/parallax.min.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('#bg1').parallax("center", 0, 0.1, true);
      $('#bg2').parallax("center", 900, 0.1, true);
      $('#bg3').parallax("center", 2900, 0.1, true);
    })
  </script>-->

<script>
<?php require_once('main_Pok.php');?>;

var NamePokemonD1 = <?php echo json_encode($NamePokemon_d1); ?>;
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

var NamePokemonD2 = <?php echo json_encode($NamePokemon_d2); ?>;
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
