<?php
session_start();
    if(isset($_POST['name']) && isset($_POST['mdp']))
    {
        // connexion à la base de données
        $db_username = 'root';
        $db_password = '';
        $db_name     = 'jeu_pokemon';
        $db_host     = 'localhost';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
               or die('could not connect to database');


        $username = mysqli_real_escape_string($db,htmlentities($_POST['name']));
        $password = mysqli_real_escape_string($db,htmlentities($_POST['mdp']));

        if($username !== "" && $password !== "")
        {
            $requete = "SELECT count(*)
                        FROM dresseur
                        WHERE name = '".$username."' and mdp = '".$password."' ";
            $exec_requete = mysqli_query($db,$requete);
            $reponse      = mysqli_fetch_array($exec_requete);
            $count = $reponse['count(*)'];
            if($count!=0) // si name et mdp corrects
            {
               $_SESSION['name'] = $username;
               header('Location: choix_pokemon.php');
            }
            else
            {
            header('Location: error.html'); //  name ou mdp incorrect
            }
        }

    }else{
       header('Location: login.php');
    }
    mysqli_close($db); // fermer la connexion
?>
