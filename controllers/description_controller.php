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
 



if (isset($_GET['action']) && $_GET['action'] === 'add' && isset($_GET['piece_id'])) {
    $pieceId = (int)$_GET['piece_id'];

  
    $pieceDetails = getPieceDetails($pieceId);

    if ($pieceDetails) {
        // Initialise le panier s'il n'existe pas
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        // Ajoute l'article au panier
        $_SESSION['cart'][$pieceId] = [
            'name' => $pieceDetails['nom_piece'],
            'price' => $pieceDetails['prix'],
            'image' => $pieceDetails['img_piece']
        ];

        // Redirige vers la page du panier
        header('Location: /panier');
        exit;
    } else {
        // Gère l'erreur si la pièce n'est pas trouvée
        $title = "Erreur";
        echo "<h1>Pièce non trouvée</h1>";
        exit;
    }
}

    require 'views/description.php';
   
?>