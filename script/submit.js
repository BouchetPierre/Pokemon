$('attaque_d1').submit(function(e){ //attrape le formulaire avec l'id correspondant
          e.preventDefault(); // empêche de soumettre le formulaire
          $.ajax({
            url: '../main_Pok.php', //donne l'url à laqulle renvoyer la donnée
            type:'POST', //type
          });
    });
$('attaque_d2').submit(function(e){
          e.preventDefault();
          $.ajax({
            url: '../main_Pok.php',
            type:'POST',
          });
    });
  
