<?php


function connexionBdd() {
    $serveur = "localhost";
    $user = "root";
    $pass = "";
    $bdd = "shop_tes_pieces";

    try {
        $connexion = new PDO("mysql:host=$serveur;dbname=$bdd", $user, $pass);
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo '<p style="color:green ">connexion</p> '; 
        return $connexion; 
    } catch (PDOException $e) {
        echo "erreur de co : " . $e->getMessage();
        return null; 
    }
}
?>