<?php
require 'db_connection.php';

//Fonction pour inscrire un utilisateur
function registerUser($nom, $prenom, $email, $password, $telephone, $adresse, $photo, $profile_id) {
    global $connexion;

        $query = "INSERT INTO users(nom, prenom, email, password, telephone, adresse, photo, profile_id) 
                  VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connexion->prepare($query);
        $stmt->execute([$nom, $prenom, $email, $password, $telephone, $adresse, $photo, $profile_id]);
        $stmt->closeCursor();
    }

//Fonction pour recuperer les informations d un utilisateur par son email
function getUserByEmail($email) {
    global $connexion;
    $query = "SELECT * FROM users WHERE email = ?";
    $stmt = $connexion->prepare($query);
    $stmt->execute([$email]);
    return $stmt;
}
?>
