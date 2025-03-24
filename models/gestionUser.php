<?php
include 'database/connexion_bdd.php';
class gestionUser {
    private $connexion;

    public function __construct($connexion) {
        $this->connexion = $connexion;
    }

    public function connectUserByEmail($email) {
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

    public function isAdmin($userId) {
        $stmt = $this->connexion->prepare("SELECT role FROM user_info WHERE ID_NAME = ?");
        $stmt->execute([$userId]);
        $user = $stmt->fetch();
        return $user && $user['role'] === 'admin';
    }




    // mettre à jour les info
    public function updateUser($id, $firstname, $lastname, $address, $phone, $email) {
        try {
            $sql = "UPDATE user_info SET firstname = :firstname, lastname = :lastname, 
                    address = :address, phone = :phone, email = :email 
                    WHERE ID_NAME = :id";
            $stmt = $this->connexion->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->bindParam(':firstname', $firstname, PDO::PARAM_STR);
            $stmt->bindParam(':lastname', $lastname, PDO::PARAM_STR);
            $stmt->bindParam(':address', $address, PDO::PARAM_STR);
            $stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
            $stmt->bindParam(':email', $email, PDO::PARAM_STR);
            return $stmt->execute(); 
        } catch (PDOException $e) {
            return false; 
        }
    }

    public function deleteUser($id) {
        $sql = "DELETE FROM user_info WHERE ID_NAME = :id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindParam(':id', $id);
        return $stmt->execute();
    }



}

?>