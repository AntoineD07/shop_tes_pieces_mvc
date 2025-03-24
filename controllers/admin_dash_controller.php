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

// Récupérer toutes les pièces
$pieces = $pieceModel->getAllPieces();

// Gérer la suppression d'une pièce
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id_piece'])) {
    $id_piece = (int)$_GET['id_piece'];
    $pieceModel->deletePiece($id_piece);
    header("Location: /admin_dash");
    exit();
}

// Gérer la modification d'une pièce
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'update') {
    $id_piece = (int)$_POST['id_piece'];
    $nom_piece = $_POST['nom_piece'];
    $img_piece = $_POST['img_piece'];
    $prix = (float)$_POST['prix'];
    $caracteristique = $_POST['caracteristique'];
    $descriptif = $_POST['descriptif'];
    $cars_id = (int)$_POST['cars_id'];
    $piece_id = (int)$_POST['piece_id'];

    $pieceModel->updatePiece($id_piece, $nom_piece, $img_piece, $prix, $caracteristique, $descriptif, $cars_id, $piece_id);
    header("Location: /admin_dash");
    exit();
}

// Gérer l'ajout d'une nouvelle pièce
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] === 'add') {
    $nom_piece = $_POST['nom_piece'];
    $img_piece = $_POST['img_piece'];
    $prix = (float)$_POST['prix'];
    $caracteristique = $_POST['caracteristique'];
    $descriptif = $_POST['descriptif'];
    $cars_id = (int)$_POST['cars_id'];
    $piece_id = (int)$_POST['piece_id'];

    $pieceModel->addPiece($nom_piece, $img_piece, $prix, $caracteristique, $descriptif, $cars_id, $piece_id);
    header("Location: /admin_dash");
    exit();
}

require 'views/admin_dash.php';