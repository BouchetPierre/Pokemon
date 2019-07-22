<!DOCTYPE html>
<html lang="fr" dir="ltr">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="login.css">
    <title>Log In</title>
</head>
<body>
<div class="container">


    <h1>Log In</h1>
    <div class="Formulaire">
        <form  action="verification_d1.php" method="post">
            <input type="text" name="name_d1" placeholder="Votre login" required >
            <br>
            <input type="password" name="mdp_d1" placeholder="Votre mot de passe" required>
            <br>
            <input type="submit" name="envoie" value="Go !">
    </div>
  
    </form>
</div>
</body>
</html>
