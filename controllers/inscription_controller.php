<?php

// recup la navbar
    require "templates/navbar.php";
//co a la bdd
    include 'database/connexion_bdd.php';





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
        $message = "Erreur: L'email existe déjà.";
    } elseif ($createUser->phoneExist($telephone)) {
        $message = "Erreur: Le numéro de téléphone existe déjà.";
    } else {
        if ($createUser->newUser($nom, $prenom, $telephone, $adresse, $email, $password)) {
            $message = "Inscription réussie!";
        } else {
            $message = "Erreur lors de l'inscription.";
        }
    }
}




// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     // Récupérer les données du formulaire
//     $nom = $_POST['nom'];
//     $prenom = $_POST['prenom'];
//     $telephone = $_POST['telephone'];
//     $adresse = $_POST['adresse'];
//     $email = $_POST['email'];
//     $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hache le mot de passe

//     // Vérifier si l'email existe déjà
//     $checkEmailSql = "SELECT COUNT(*) FROM user_info WHERE email = :email";
//     $checkEmailStmt = $connexion->prepare($checkEmailSql);
//     $checkEmailStmt->bindParam(':email', $email);
//     $checkEmailStmt->execute();
//     $emailExists = $checkEmailStmt->fetchColumn();

//     if ($emailExists) {
//         echo "Erreur: L'email existe déjà.";
//     } else {
//         // Préparer et exécuter la requête d'insertion
//         $sql = "INSERT INTO user_info (firstname, lastname, phone, address, email, password)
//                 VALUES (:firstname, :lastname, :phone, :address, :email, :password)";
//         $stmt = $connexion->prepare($sql);
//         $stmt->bindParam(':firstname', $nom);
//         $stmt->bindParam(':lastname', $prenom);
//         $stmt->bindParam(':phone', $telephone);
//         $stmt->bindParam(':address', $adresse);
//         $stmt->bindParam(':email', $email);
//         $stmt->bindParam(':password', $password);

//         if ($stmt->execute()) {
//             echo "Inscription réussie!";
//         } else {
//             echo "Erreur lors de l'inscription.";
//         }
//     }
// }


//recup vue
    require 'views/inscription.php';

    //recup le footer
    require "templates/footer.php";
?>