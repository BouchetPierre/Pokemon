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
          <h1>Arène de combat</h1>
        </div>

        <div class="hero">
          <!--Partie gauche dresseur 1-->
          <div class="dresseur_d1">
              <h2>Dresseur 1</h2>
              <div class="attaque_d1">

                <form class="attaque1_d1" action="main_Pok.php" method="post">
                  <input type="submit" name="attaque1_d1" width="150px" value="a">
                </form>

                <form class="attaque2_d1" action="main_Pok.php" method="post">
                  <input type="submit" name="attaque2_d1" value="a">
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




</body>
</html>
