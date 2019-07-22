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
        <form  action="verification_d2.php" method="post">
            <input type="text" name="name_d2" placeholder="Votre login" required >
            <br>
            <input type="password" name="mdp_d2" placeholder="Votre mot de passe" required>
            <br>
            <input type="submit" name="envoie" value="Go !">
    </div>
    <?php
    /*if (isset($_POST['error'])){
        $error=$_POST['error'];
        if ($error==1 || $error==2) {
            echo "Ton pseudo ou ton mot de passe ne sont pas bon";
        }
    }*/

    ?>
    </form>
</div>
</body>
</html>
