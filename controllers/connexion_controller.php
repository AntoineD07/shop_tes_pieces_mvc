<?php
    require "templates/navbar.php";
    require 'models/gestionUser.php';

    $connexion = connexionBdd();
    $connexionUser = new gestionUser ($connexion);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // recup les donne du form connecion
        $email = $_POST['email'];
        $password = $_POST['password'];
            //verif si email dans bdd                    
        $user = $connexionUser->connectUserByEmail($email);
        // si email trouve verif mdp
        if ($user) {
            // verif mdp avec password_verify
            if (password_verify($password, $user['password'])) {
                session_start();
                //stock info user dans session
                $_SESSION['user_id'] = $user['ID_NAME']; 
                $_SESSION['user_email'] = $user['email'];
                //redirige a mon_compte si co ok
                header("Location: /mon_compte");
                exit();
            } else {
                //si mdp incorect message
                $message = "Mot de passe incorrect.";
             
            }
        } else {
            //si email incorrect 
            $message = "Email incorrect ou compte non créé.";
           
        }
    }
   


    require 'views/connexion.php';
    require "templates/footer.php";
?>