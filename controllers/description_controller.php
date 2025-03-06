<?php
    require "templates/navbar.php";
    include 'database/connexion_bdd.php';

    $connexion = connexionBdd();
//recuper lid piece dans lurl
$piece_id = isset($_GET['piece_id']) ? (int)$_GET['piece_id']:0;

  if($piece_id){
    $sql ="SELECT pieces.*, cars.cars_name, type_piece.nom_piece AS type_piece
    FROM pieces
    INNER JOIN cars ON pieces.cars_id = cars.cars_id
    INNER JOIN type_piece ON pieces.piece_id = type_piece.piece_id
    WHERE pieces.id_piece = :piece_id;";

    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':piece_id',$piece_id,PDO::PARAM_INT);
    $stmt->execute();
    $piece = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($piece) {
        $message = "Détails de : " . htmlspecialchars($piece['nom_piece']);
    } else {
        $message = "Pièce non trouvée.";
    }
} else {
    $piece = null;
    $message = "Aucune pièce sélectionnée.";
}
 
    require 'views/description.php';
    require "templates/footer.php";
?>