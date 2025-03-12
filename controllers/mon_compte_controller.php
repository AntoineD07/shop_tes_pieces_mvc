<?php

require "models/gestionUser.php";

// Vérifier si user est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: /connexion");
    exit();
}


$connexion = connexionBdd();
$connexionUser = new gestionUser($connexion);

// Récupérer l'ID de user
$user_id = $_SESSION['user_id'];
$user = $connexionUser->getUserById($user_id);

// info de base de user
$_SESSION['user_firstname'] = $user['firstname'];
$_SESSION['user_lastname'] = $user['lastname'];
$_SESSION['user_address'] = $user['address'];
$_SESSION['user_phone'] = $user['phone'];
$_SESSION['user_email'] = $user['email'];
$_SESSION['user_name'] = $user['firstname'] . ' ' . $user['lastname'];

// Si mise à jour 
if (isset($_POST['update'])) {
    // Récupérer les valeurs avec une valeur par défaut
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $address = isset($_POST['address']) ? $_POST['address'] : '';
    $phone = isset($_POST['phone']) ? $_POST['phone'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';

    // Mettre à jour si les champs ne sont pas vides
    if ($firstname && $lastname && $email) {
        $connexionUser->updateUser($user_id, $firstname, $lastname, $address, $phone, $email);
        $_SESSION['user_firstname'] = $firstname;
        $_SESSION['user_lastname'] = $lastname;
        $_SESSION['user_address'] = $address;
        $_SESSION['user_phone'] = $phone;
        $_SESSION['user_email'] = $email;
        $_SESSION['user_name'] = $firstname . ' ' . $lastname;
        $message = "Informations mises à jour !";
    } else {
        $message = "Veuillez remplir les champs obligatoires.";
    }
}


if (isset($_POST['delete'])) {
    $connexionUser->deleteUser($user_id);
    session_destroy();
    header("Location: /index");
    exit();
}

// Affiche la page
require 'views/mon_compte.php';

?>