<?php


function getProductData($cars_id, $piece_id) {

    require_once 'database/connexion_bdd.php';
    $connexion = connexionBdd();
    
    // Récupérer le nom de la voiture
    $sql_car = "SELECT cars_name FROM cars WHERE cars_id = :cars_id";
    $stmt_car = $connexion->prepare($sql_car);
    $stmt_car->bindParam(':cars_id', $cars_id, PDO::PARAM_INT);
    $stmt_car->execute();
    $car_name = $stmt_car->fetchColumn() ?: 'Inconnu';
    
    // Récupérer le nom du type de pièce
    $sql_type = "SELECT nom_piece FROM type_piece WHERE piece_id = :piece_id";
    $stmt_type = $connexion->prepare($sql_type);
    $stmt_type->bindParam(':piece_id', $piece_id, PDO::PARAM_INT);
    $stmt_type->execute();
    $type_name = $stmt_type->fetchColumn() ?: 'Inconnu';
    
    // Récupérer les pièces
    $sql = "SELECT * FROM pieces
            WHERE cars_id = :cars_id AND piece_id = :piece_id";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':cars_id', $cars_id, PDO::PARAM_INT);
    $stmt->bindParam(':piece_id', $piece_id, PDO::PARAM_INT);
    $stmt->execute();
    $pieces = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    // Retourner toutes les données dans un tableau
    return [
        'car_name' => $car_name,
        'type_name' => $type_name,
        'pieces' => $pieces
    ];
}
?>