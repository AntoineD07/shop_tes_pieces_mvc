<?php

function getCarAndPieces($cars_id) {

    require_once 'database/connexion_bdd.php';
    
    $connexion = connexionbdd();
    
    // Récupérer le nom de la voiture
    $sql_car = "SELECT cars_name FROM cars WHERE cars_id = :cars_id";
    $stmt_car = $connexion->prepare($sql_car);
    $stmt_car->bindParam(':cars_id', $cars_id, PDO::PARAM_INT);
    $stmt_car->execute();
    $car = $stmt_car->fetch(PDO::FETCH_ASSOC);
    $car_name = $car ? $car['cars_name'] : 'Inconnu';
    
    // Récupérer les types de pièces
    $sql = "SELECT DISTINCT type_piece.*
            FROM type_piece
            INNER JOIN pieces ON type_piece.piece_id = pieces.piece_id
            WHERE pieces.cars_id = :cars_id";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':cars_id', $cars_id, PDO::PARAM_INT);
    $stmt->execute();
    $types_piece = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Retourne tout dans un tableau
    return [
        'car_name' => $car_name,
        'types_piece' => $types_piece
    ];
}
?>