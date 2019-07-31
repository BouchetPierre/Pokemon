/*------nom des attaques pour chaque pokémon -------*/

var NamePokemonD1 = '<?php echo $_SESSION['NamePokemon_d1']; ?>';

var tabResName1D1 = '<?php echo $tabResNameD1[0]; ?>';
var tabResName2D1 = '<?php echo $tabResNameD1[1]; ?>';
var tabResName3D1 = '<?php echo $tabResNameD1[2]; ?>';
var tabResName4D1 = '<?php echo $tabResNameD1[3]; ?>';

document.getElementById("att1_d1").value = tabResName1D1 ;
document.getElementById("att2_d1").value = tabResName2D1 ;
document.getElementById("att3_d1").value = tabResName3D1 ;
document.getElementById("att4_d1").value = tabResName4D1 ;

var tabResName1D2 = '<?php echo $tabResNameD2[0]; ?>';
var tabResName2D2 = '<?php echo $tabResNameD2[1]; ?>';
var tabResName3D2 = '<?php echo $tabResNameD2[2]; ?>';
var tabResName4D2 = '<?php echo $tabResNameD2[3]; ?>';

document.getElementById("att1_d2").value = tabResName1D2 ;
document.getElementById("att2_d2").value = tabResName2D2 ;
document.getElementById("att3_d2").value = tabResName3D2 ;
document.getElementById("att4_d2").value = tabResName4D2 ;
