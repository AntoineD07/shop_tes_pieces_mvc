<?php
   require_once 'models/getPieceDetails.php';

    
//recuper lid piece dans lurl
$piece_id = isset($_GET['piece_id']) ? (int)$_GET['piece_id']:0;

  if($piece_id){

    $piece = getPieceDetails($piece_id);

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
   
?>