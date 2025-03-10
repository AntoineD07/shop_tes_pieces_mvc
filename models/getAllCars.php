<?php
function getAllCars(){
    require_once "database/connexion_bdd.php";
    $connexion = connexionbdd();
    
    // Ton code exact
    $sql = "SELECT * FROM cars";
    $stmt = $connexion->prepare($sql);
    $stmt->execute();
    $cars = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Retourne les voitures
    return $cars;
}
?>