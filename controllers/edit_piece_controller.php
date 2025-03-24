<?php
    


require_once 'models/gestionUser.php';
require_once 'models/gestionPiece.php';

$connexion = connexionBdd();
$connexionUser = new gestionUser($connexion);
$pieceModel = new gestionPiece($connexion);

// Vérifier si l'utilisateur est un admin
if (!isset($_SESSION['user_id']) || !$connexionUser->isAdmin($_SESSION['user_id'])) {
    header("Location: /login");
    exit();
}

// Récupérer la pièce à modifier
if (isset($_GET['id_piece'])) {
    $id_piece = (int)$_GET['id_piece'];
    $piece = $pieceModel->getPieceById($id_piece);
    if (!$piece) {
        header("Location: /admin_dash");
        exit();
    }
} else {
    header("Location: /admin_dash");
    exit();
}

// Récupérer les voitures et les types de pièces pour les menus déroulants
$cars = $pieceModel->getAllCars();
$types = $pieceModel->getAllTypes();
require "views/edit_piece.php";
?>
