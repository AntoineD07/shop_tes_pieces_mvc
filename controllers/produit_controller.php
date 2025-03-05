<?php
    require "templates/navbar.php";
    
    include 'database/connexion_bdd.php';

    $connexion = connexionBdd();

// recuper id car et id piece dans l'url
$cars_id = isset($_GET['cars_id']) ? (int)$_GET['cars_id'] : 0;
$piece_id = isset($_GET['piece_id']) ? (int)$_GET['piece_id'] : 0;

if ($cars_id && $piece_id) {
    // recupere le nom de la voiture et du type pour affichage sur view
    $sql_car = "SELECT cars_name FROM cars WHERE cars_id = :cars_id";
    $stmt_car = $connexion->prepare($sql_car);
    $stmt_car->bindParam(':cars_id', $cars_id, PDO::PARAM_INT);
    $stmt_car->execute();
    $car_name = $stmt_car->fetchColumn() ?: 'Inconnu';

   //recuper le nom du type de piece pour affichage sur view
    $sql_type = "SELECT nom_piece FROM type_piece WHERE piece_id = :piece_id";
    $stmt_type = $connexion->prepare($sql_type);
    $stmt_type->bindParam(':piece_id', $piece_id, PDO::PARAM_INT);
    $stmt_type->execute();
    $type_name = $stmt_type->fetchColumn() ?: 'Inconnu';

    // reupere les pieces en  raport a l'id cars et id pieces
    $sql = "SELECT * FROM pieces
            WHERE cars_id = :cars_id AND piece_id = :piece_id";
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':cars_id', $cars_id, PDO::PARAM_INT);
    $stmt->bindParam(':piece_id', $piece_id, PDO::PARAM_INT);
    $stmt->execute();
    $pieces = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $message = htmlspecialchars($type_name)." pour " . htmlspecialchars($car_name);
} else {
    header('Location:/');
    $pieces = [];
    $message = "Modèle ou type de pièce non spécifié.";
}
  
    require 'views/Produit.php';
    require "templates/footer.php";
?>