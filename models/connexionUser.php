<?php
include 'database/connexion_bdd.php';
class connexionUser {
    private $connexion;

    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    public function conectUserByEmail($email) {
        $sql = "SELECT * FROM user_info WHERE email = :email";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getUserById($id){

        $sql = "SELECT * FROM user_info WHERE ID_NAME = :id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindParam(':id',$id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>