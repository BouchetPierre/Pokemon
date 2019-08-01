<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="combat.css">
  <link rel="stylesheet" href="parallax.css">
  <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/waltograph" type="text/css"/>
  <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/generale-station" type="text/css"/>
  <meta charset="UTF-8">

  <title>Arène Pokémon</title>
</head>
<body>
  <div class="parallax-viewport" id="parallax">
    <ul>
      <li class="parallax-layer"><img src="image/foret3.png" width"1100px"    alt="souche"> </li>
      <li class="parallax-layer"><img src="image/souche.png"  width"1100px" alt="souche"> </li>
      <li class="parallax-layer"><img src="image/dresseurs.png" width"1100px" alt="dresseurs"> </li>
      <li class="parallax-layer"><img src="image/bush.png" width"1100px" alt="bush"> </li>
    </ul>

    <!-- <div id="bg1">
     <div id="bg2">
      <div id="bg3"> -->
        <div class="titre">
          <h1><img src="image/uranium.png" alt="titre" width="500px"
            height="200px"></h1>
        </div>
        <div class="hero">
          <!--Partie gauche dresseur 1-->
          <div class="dresseur_d1">
            <h2 id="name_d1"></h2>
            <h3 id="pok_d1"></h3>
            <p id="lvl1"></p>
              <div class="att_d1">
                <form id="attaque_d1" action="main_Pok.php" method="post">
                  <input type="submit" id="att1_d1" name="attaque1_d1" value="a">
                  <input type="submit" id="att2_d1" name="attaque2_d1" value="b">
                  <input type="submit" id="att3_d1" name="attaque3_d1" value="c">
                  <input type="submit" id="att4_d1" name="attaque4_d1" value="d">
                </form>
              </div>
              <div class="ptVie_d1">
                <progress id="vie_d1" value="" max=""></progress>
              </div>
              <!-- <div class="experience_d1">
                <progress id="xp_d1" value=" " max=""></progress>
              </div> -->
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
            <h2 id="name_d2"></h2>
            <h3 id="pok_d2"></h3>
              <p id="lvl2"></p>
              <div class="att_d2">
                <form id="attaque_d2" action="main_Pok.php" method="post">
                  <input type="submit" id="att1_d2"  name="attaque1_d2" value="e">
                  <input type="submit" id="att2_d2"  name="attaque2_d2" value="f">
                  <input type="submit" id="att3_d2"  name="attaque3_d2" value="g">
                  <input type="submit" id="att4_d2"  name="attaque4_d2" value="h">
                </form>
              </div>
            <div class="ptVie_d2">
              <progress id="vie_d2" value="" max=""></progress>
            </div>
            <!-- <div class="experience_d2">
              <progress id="xp_d2" value=" " max=""></progress>
            </div> -->
          </div>
        </div>
        <footer>
          <h5>copyright</h5>
        </footer>
    </div>
  </div>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.event.frame.js"></script>
<script type="text/javascript" src="js/jquery.parallax.min.js"></script>
<script type="text/javascript">

jQuery(document).ready(function(){
    jQuery("#parallax .parallax-layer").parallax({
        //mouseport: jQuery("")
    },
    {
        yparallax: false,
        width: 1900
    });

    // jQuery(".parallax-layer").parallax({
    //     mouseport: jQuery("#parallax"),
    //     xparallax: '2000px',
    //     yparallax: false,
    //     width: 1900
    // });

    //
    // jQuery("#parallax .parallax-layer").parallax({
    //     mouseport: jQuery("#parallax"),
    //     xparallax: false
    // });

    // jQuery("#test4 .parallax-layer").parallax({
    //     mouseport: jQuery("#test4"),
    //     yparallax: false
    // });
    //
    // jQuery("a[href='#freeze']").bind('click', function(e){
    //     jQuery(".red").trigger({type: 'freeze'});
    // });
    //
    // jQuery("a[href='#freezeto40']").bind('click', function(e){
    //     jQuery(".red").trigger({type: 'freeze', x: '44%', y: '47%', decay: 0.9});
    // });
    //
    // jQuery("a[href='#freezeto50']").bind('click', function(e){
    //     jQuery(".red").trigger({type: 'freeze', x: '50%', y: '50%'});
    // });
    //
    // jQuery("a[href='#freezeto60']").bind('click', function(e){
    //     jQuery(".red").trigger({type: 'freeze', x: 0.52, y: 0.52});
    // });
    //
    // jQuery("a[href='#unfreeze']").bind('click', function(e){
    //     jQuery(".red").trigger('unfreeze');
    // })
});
</script>

</body>
</html>
