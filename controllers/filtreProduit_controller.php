<?php
   

    require_once 'models/getCarAndPieces.php';

//recuper lid cars dans l'url et verif si c'est en entier
    $cars_id = isset($_GET['cars_id'])?(int)$_GET['cars_id']:0;


// Si on a un id
if ($cars_id) {
    // Appelle le modèle pour avoir les données
    $data = getCarAndPieces($cars_id);
    
    // Prépare les variables pour la vue
    $car_name = $data['car_name'];
    $types_piece = $data['types_piece'];
    $message = "pour : " . htmlspecialchars($car_name);
    

} else {
    // si pas d id redirige vers index
    header('Location: /');
    exit; 
}
 



    require 'views/filtreProduit.php';
   
?>