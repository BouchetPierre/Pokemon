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
            <h2>Dresseur 1</h2>
              <div class="att_d1">
                <form id="attaque_d1" action="main_Pok.php" method="post">
                  <input type="submit" id="att1_d1" name="attaque1_d1" value="a">
                  <input type="submit" id="att2_d1" name="attaque2_d1" value="b">
                  <input type="submit" id="att3_d1" name="attaque3_d1" value="c">
                  <input type="submit" id="att4_d1" name="attaque4_d1" value="d">
                </form>
              </div>
              <div class="ptVie_d1">
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
              <div class="att_d2">
                <form id="attaque_d2" action="main_Pok.php" method="post">
                  <input type="submit" id="att1_d2"  name="attaque1_d2" value="e">
                  <input type="submit" id="att2_d2"  name="attaque2_d2" value="f">
                  <input type="submit" id="att3_d2"  name="attaque3_d2" value="g">
                  <input type="submit" id="att4_d2"  name="attaque4_d2" value="h">
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
<link rel="stylesheet" href="script/submit.js">
<script src="https://code.jquery.com/jquery-3.1.0.min.js" charset="utf-8"></script>

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

</body>
</html>
