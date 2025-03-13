<?php

require "models/getPieceDetails.php";

// Gestion de la mise à jour de la quantité (avec + et -)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'update' && isset($_POST['piece_id'])) {
    $pieceId = (int)$_POST['piece_id'];
    $currentQuantity = isset($_SESSION['cart'][$pieceId]['quantity']) ? (int)$_SESSION['cart'][$pieceId]['quantity'] : 1;

    if (isset($_POST['change'])) {
        if ($_POST['change'] === 'increase') {
            $quantity = $currentQuantity + 1;
        } elseif ($_POST['change'] === 'decrease') {
            $quantity = $currentQuantity - 1;
        }
    } else {
        $quantity = isset($_POST['quantity']) ? (int)$_POST['quantity'] : $currentQuantity;
    }

    if ($quantity <= 0) {
        // Supprime l'article si la quantité est 0
        if (isset($_SESSION['cart'][$pieceId])) {
            unset($_SESSION['cart'][$pieceId]);
        }
    } elseif ($quantity > 10) {
        $quantity = 10; // Limite max
        $_SESSION['cart'][$pieceId]['quantity'] = $quantity;
    } else {
        $_SESSION['cart'][$pieceId]['quantity'] = $quantity;
    }

    header('Location: /panier');
    exit;
}

// Gestion de la suppression d’un article
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'delete' && isset($_POST['piece_id'])) {
    $pieceId = (int)$_POST['piece_id'];

    if (isset($_SESSION['cart'][$pieceId])) {
        unset($_SESSION['cart'][$pieceId]);
    }

    header('Location: /panier');
    exit;
}

// Gestion de l'ajout au panier 
if (isset($_GET['action']) && $_GET['action'] === 'add' && isset($_GET['piece_id'])) {
    $pieceId = (int)$_GET['piece_id'];

    $pieceDetails = getPieceDetails($pieceId);

    if ($pieceDetails) {
        if (!isset($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }

        if (isset($_SESSION['cart'][$pieceId])) {
            $_SESSION['cart'][$pieceId]['quantity'] = ($_SESSION['cart'][$pieceId]['quantity'] ?? 0) + 1;
        } else {
            $_SESSION['cart'][$pieceId] = [
                'modele' => $pieceDetails['cars_name'],
                'name' => $pieceDetails['nom_piece'],
                'price' => $pieceDetails['prix'],
                'image' => $pieceDetails['img_piece'],
                'quantity' => 1
            ];
        }

        header('Location: /panier');
        exit;
    } else {
        $title = "Erreur";
        echo "<h1>Pièce non trouvée</h1>";
        exit;
    }
}

// Affichage du panier
$title = "Votre panier";
require 'views/panier.php';
?>