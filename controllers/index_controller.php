<?php
require "templates/navbar.php";
// include 'database/connexion_bdd.php';
require_once 'models/getAllCars.php';

$cars = getAllCars();

// $connexion = connexionbdd();
//recup l'id dans cars pour le lier au btn voiture dans index
// $sql = "SELECT * FROM cars";
// $stmt = $connexion->prepare($sql);
// $stmt->execute();
// $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);

require 'views/index.php';
require "templates/footer.php";
?>
