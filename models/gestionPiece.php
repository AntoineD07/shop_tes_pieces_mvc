<?php
require_once 'database/connexion_bdd.php';

class gestionPiece {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Récupérer toutes les pièces avec les informations des voitures et types
    public function getAllPieces() {
        $stmt = $this->pdo->prepare("SELECT pieces.*, cars.cars_name, type_piece.nom_piece AS type_name 
                                     FROM pieces 
                                     JOIN cars ON pieces.cars_id = cars.cars_id 
                                     JOIN type_piece ON pieces.piece_id = type_piece.piece_id");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Récupérer une pièce par ID
    public function getPieceById($id_piece) {
        $stmt = $this->pdo->prepare("SELECT * FROM pieces WHERE id_piece = ?");
        $stmt->execute([$id_piece]);
        return $stmt->fetch();
    }

    // Mettre à jour une pièce
    public function updatePiece($id_piece, $nom_piece, $img_piece, $prix, $caracteristique, $descriptif, $cars_id, $piece_id) {
        $stmt = $this->pdo->prepare("UPDATE pieces 
                                     SET nom_piece = ?, img_piece = ?, prix = ?, caracteristique = ?, descriptif = ?, cars_id = ?, piece_id = ? 
                                     WHERE id_piece = ?");
        $stmt->execute([$nom_piece, $img_piece, $prix, $caracteristique, $descriptif, $cars_id, $piece_id, $id_piece]);
    }

    // Supprimer une pièce
    public function deletePiece($id_piece) {
        $stmt = $this->pdo->prepare("DELETE FROM pieces WHERE id_piece = ?");
        $stmt->execute([$id_piece]);
    }

    // Ajouter une nouvelle pièce
    public function addPiece($nom_piece, $img_piece, $prix, $caracteristique, $descriptif, $cars_id, $piece_id) {
        $stmt = $this->pdo->prepare("INSERT INTO pieces (nom_piece, img_piece, prix, caracteristique, descriptif, cars_id, piece_id) 
                                     VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nom_piece, $img_piece, $prix, $caracteristique, $descriptif, $cars_id, $piece_id]);
        return $this->pdo->lastInsertId(); // Retourne l'ID de la nouvelle pièce
    }

    // Récupérer toutes les voitures pour les menus déroulants
    public function getAllCars() {
        $stmt = $this->pdo->prepare("SELECT * FROM cars");
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // Récupérer tous les types de pièces pour les menus déroulants
    public function getAllTypes() {
        $stmt = $this->pdo->prepare("SELECT * FROM type_piece");
        $stmt->execute();
        return $stmt->fetchAll();
    }
}