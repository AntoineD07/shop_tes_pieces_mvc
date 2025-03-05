<?php
    require "templates/navbar.php";
    include 'database/connexion_bdd.php';

    $connexion = connexionbdd();
//recuper lid cars dans l'url est verif si c'est en entier
    $cars_id = isset($_GET['cars_id'])?(int)$_GET['cars_id']:0;

    if ($cars_id) {
        // Récupérer le nom de la voiture dans cars paur affiche le modele
        $sql_car = "SELECT cars_name FROM cars WHERE cars_id = :cars_id";
        $stmt_car = $connexion->prepare($sql_car);
        $stmt_car->bindParam(':cars_id', $cars_id, PDO::PARAM_INT);
        $stmt_car->execute();
        $car = $stmt_car->fetch(PDO::FETCH_ASSOC);
        $car_name = $car ? $car['cars_name'] : 'Inconnu';
    
        // Récupérer les types de pièces disponibles pour ce cars_id

        // $sql="SELECT DISTINCT type_piece.* 
        // FROM type_piece
        // selection toute les colonne de type piece
        
        // cree un jointure sur piece
        // est relie l'id de table type_piece a l'id de table pieces
        // INNER JOIN pieces ON type_piece.piece_id = pieces.piece_id

        //est filtre pour affiche les piece en raport a car_id
        // WHERE pieces.cars_id = :cars_id;";

        $sql="SELECT DISTINCT type_piece.*
              FROM type_piece
              INNER JOIN pieces ON type_piece.piece_id = pieces.piece_id
              WHERE pieces.cars_id = :cars_id;";

        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(':cars_id', $cars_id, PDO::PARAM_INT);
        $stmt->execute();
        $types_piece = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
        $message = "pour : " . htmlspecialchars($car_name);
    }else{
        header('Location:/');
    
    }



    require 'views/filtreProduit.php';
    require "templates/footer.php";
?>