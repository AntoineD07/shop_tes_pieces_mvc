<?php


    require_once "models/getProductData.php";

    // Récupère les IDs dans l'URL
    $cars_id = isset($_GET['cars_id']) ? (int)$_GET['cars_id'] : 0;
    $piece_id = isset($_GET['piece_id']) ? (int)$_GET['piece_id'] : 0;
    
    // Vérifie si les deux IDs sont présents
    if ($cars_id && $piece_id) {
        // Récupère les données du modèle
        $data = getProductData($cars_id, $piece_id);
        
        // Prépare les variables pour la vue
        $car_name = $data['car_name'];
        $type_name = $data['type_name'];
        $pieces = $data['pieces'];

    $message = htmlspecialchars($type_name)." pour " . htmlspecialchars($car_name);
    } else {
        header('Location:/');
        $pieces = [];
       $message = "Modèle ou type de pièce non spécifié.";
}
  
    require 'views/Produit.php';
   
?>