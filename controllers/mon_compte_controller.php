<?php
    require "templates/navbar.php";   
    require "models/connexionUser.php";


    // session_start();

    //si pas co redirige a connexion
    if (!isset($_SESSION['user_id'])){
        header("Location: /connexion");
        exit();
    }
    $connexion = connexionBdd();
    $connexionUser = new connexionUser($connexion);

    $user_id = $_SESSION['user_id'];
$user = $connexionUser->getUserById($user_id);

if ($user) {
    $_SESSION['user_firstname'] = $user['firstname'];
    $_SESSION['user_lastname'] = $user['lastname'];
    $_SESSION['user_address'] = $user['address'];
    $_SESSION['user_phone'] = $user['phone'];
}
    require 'views/mon_compte.php';
   
    require "templates/footer.php";
?>
