<?php

// recup la navbar
    require "templates/navbar.php";

//classe createuser
    require 'models/createUser.php';

$connexion = connexionBdd();
$createUser = new createUser($connexion);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $adresse = $_POST['adresse'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if ($createUser->emailExist($email)) {
        $message = "Erreur: L'email existe déjà. ";
    } elseif ($createUser->phoneExist($telephone)) {
        $message = "Erreur: Le numéro de téléphone existe déjà.";
    } else {
        if ($createUser->newUser($nom, $prenom, $telephone, $adresse, $email, $password)) {
            $message = "Inscription réussie! <a href=\"/mon_compte\">mon compte</a>";
        } else {
            $message = "Erreur lors de l'inscription.";
        }
    }
}

//recup vue
    require 'views/inscription.php';

    //recup le footer
    require "templates/footer.php";
?>