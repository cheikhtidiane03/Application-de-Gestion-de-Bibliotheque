<?php
require 'db_connection.php';

// Fonction pour recuperer tous les abonnes
function getAllUsers() {
    global $connexion;
    $stmt = $connexion->prepare("SELECT * FROM users");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fonction pour recuperer un abonne par son id
function getUserById($id) {
    global $connexion;
    $stmt = $connexion->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

//Fonction pour activer un abonne
function activerUser($id) {
    global $connexion;
    $stmt = $connexion->prepare("UPDATE users SET actif = 1 WHERE id = ?");
    $stmt->execute([$id]);
}

//Fonction pour desactiver un abonne
function desactiverUser($id) {
    global $connexion;
    $stmt = $connexion->prepare("UPDATE users SET inactif = 0 WHERE id = ?");
    $stmt->execute([$id]);
}

//Fonction pouur reupere l'historique des reservations d'un abonne
function getHistoriqueReservations($abonne_id) {
    global $connexion;
    $query = "SELECT r.id, r.date_debut, r.date_fin, b.title AS livre, r.statut 
              FROM reservations r 
              JOIN books b ON r.book_id = b.id 
              WHERE r.user_id = :abonne_id";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":abonne_id", $abonne_id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
