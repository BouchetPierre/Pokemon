/*------affichage du pokémon sélectionné-------*/

var NamePokemonD1 = '<?php echo $_SESSION['NamePokemon_d1']; ?>';
console.log(NamePokemonD1);

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
  case "fantominus":
    Pok_d1.classList.toggle("fantominus_d1")
    break;
  default:
}

var NamePokemonD2 = '<?php echo $_SESSION['NamePokemon_d2']; ?>';
console.log(NamePokemonD2);

var Pok_d2 = document.getElementById("pokemon_d2");
switch (NamePokemonD2) {
  case "carapuce":
    Pok_d2.classList.toggle("carapuce_d2")
    break;
  case "bulbizarre":
    Pok_d2.classList.toggle("bulbizarre_d2")
    break;
  case "salameche":
    Pok_d2.classList.toggle("salameche_d2")
    break;
  case "fantominus":
    Pok_d2.classList.toggle("fantominus_d2")
    break;
  default:
}
