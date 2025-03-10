<?php


function getPieceDetails($piece_id) {

    require_once 'database/connexion_bdd.php';
    $connexion = connexionBdd();
    
    // Requête SQL avec les jointures
    $sql = "SELECT pieces.*, cars.cars_name, type_piece.nom_piece AS type_piece
            FROM pieces
            INNER JOIN cars ON pieces.cars_id = cars.cars_id
            INNER JOIN type_piece ON pieces.piece_id = type_piece.piece_id
            WHERE pieces.id_piece = :piece_id";
    
    $stmt = $connexion->prepare($sql);
    $stmt->bindParam(':piece_id', $piece_id, PDO::PARAM_INT);
    $stmt->execute();
    
    // Retourne les détails de la pièce (ou null si non trouvée)
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>