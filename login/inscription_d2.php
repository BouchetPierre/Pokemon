<!DOCTYPE html>
<html lang="fr" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="login.css">
    <title>Inscription</title>
  </head>
  <body>

    <div class="container">
      <h1>Inscription</h1>
      <form action="inscription_d2.php" class="users" method="post">
        <p class="dresseur">Dresseur</p>
        <input type="text" name="name_d2"  placeholder="Votre nom de dresseur" required>
         <br>
        <input type="password" name="mdp_d2" placeholder="Votre mot de passe" required>
          <br>
        <input id="bouton" class="envoiDresseurs" type="submit" name="Valider" value="Envoyer"  >
      </form>
      <?php
      /*------connection base de donnees-------*/

      try {
        $dresseur= new PDO('mysql:host=localhost;dbname=jeu_pokemon;charset=utf8', 'root', 'ADRAR1112', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
      }catch (Exception $e){
        die('Erreur : '.$e->getMessage());
      };

      /*--------envoi du dresseur 2 sur la bd----------*/
      if (isset($_POST['name_d2'] ) && isset($_POST['mdp_d2'])) {
        $envoi= $dresseur->prepare("INSERT INTO dresseur(name, mdp) VALUES (?, ?)");
        $envoi->execute([ htmlspecialchars($_POST['name_d2']), htmlspecialchars($_POST['mdp_d2'])]);
          header('Location: login_d2.php');
      }

     ?>


    </div>

  </body>

</html>
