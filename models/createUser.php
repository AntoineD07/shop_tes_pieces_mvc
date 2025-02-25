<?php

class createUser {
    //co bdd
    private $connexion;

    public function __construct($connexion){
        $this->connexion = $connexion;
    }

    public function emailExist($email){
        //cherche si l'email exister deja
        $sql = "SELECT COUNT(*) FROM user_info WHERE email = :email";
        //prepare la requete sql^
        $stmt = $this->connexion->prepare($sql);
        //lie :email a la variable $email
        $stmt->bindParam(':email',$email);
        //execute la requete
        $stmt->execute();
        //retourne si email existe deja
        return $stmt->fetchColumn() > 0;
    }

    public function phoneExist($telephone){
        $sql = "SELECT COUNT(*) FROM user_info WHERE phone = :phone";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindParam(':phone',$telephone);
        $stmt->execute();
        return $stmt->fetchColumn() > 0;
    }
//relie les variable a chaque colonne de la bdd et envoie la requete
    public function newUser($nom,$prenom,$telephone,$adresse,$email,$password){
        $sql = "INSERT INTO user_info (firstname,lastname,phone,address,email,password)
                VALUES (:firstname,:lastname,:phone,:address,:email,:password)";
        
        $stmt = $this ->connexion->prepare($sql);
        $stmt->bindParam(':firstname',$nom);
        $stmt->bindParam(':lastname', $prenom);
        $stmt->bindParam(':phone', $telephone);
        $stmt->bindParam(':address', $adresse);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password', $password);
        return $stmt->execute();

      
    }


}
?>