<?php
session_start();
    if(isset($_POST['name_d1']) && isset($_POST['mdp_d1']))
    {
        // connexion à la base de données
        $db_username = 'root';
        $db_password = 'root';
        $db_name     = 'jeu_pokemon';
        $db_host     = 'localhost:8888';
        $db = mysqli_connect($db_host, $db_username, $db_password,$db_name)
               or die('could not connect to database');


        $username = mysqli_real_escape_string($db,htmlentities($_POST['name_d1']));
        $password = mysqli_real_escape_string($db,htmlentities($_POST['mdp_d1']));

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
               $_SESSION['name_d1'] = $username;
               header('Location: choix_pokemon_d1.php');
            }
            else
            {
            header('Location: error_d1.html'); //  name ou mdp incorrect
            }
        }

    }else{
       header('Location: login_d1.php');
    }
    mysqli_close($db); // fermer la connexion
?>
