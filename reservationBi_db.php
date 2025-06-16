<?php
require_once 'db_connection.php';

// Constantes pour les statuts de 
define('STATUS_EN_COURS', 'EN_COURS');
define('STATUS_TERMINEE', 'TERMINEE');
define('STATUS_ANNULEE', 'ANNULEE');

// Fonction pour recuperer toutes les reservations avec filtrage par statut
function getReservations($statut = null) {
    global $connexion;

    $sql = "SELECT r.id, r.date_debut, r.statut, u.nom AS abonne, b.title AS livre 
            FROM reservations r 
            JOIN users u ON r.user_id = u.id 
            JOIN books b ON r.book_id = b.id";

    if (!empty($statut)) {
        $sql .= " WHERE r.statut = :statut";
    }

    $stmt = $connexion->prepare($sql);
    
    if (!empty($statut)) {
        $stmt->bindValue(':statut', $statut, PDO::PARAM_STR);
    }

    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fonction pour mettre a jour le statut d un utilisateur
function updateReservationStatut($id, $statut) {
    global $connexion;
    $stmt = $connexion->prepare("UPDATE reservations SET statut = :statut WHERE id = :id");
    $stmt->bindValue(':statut', $statut, PDO::PARAM_STR);
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    return $stmt->execute();
}

// Fonction pour recuperer les livres les plus reserves
function getTopLivres() {
    global $connexion;
    $sql = "SELECT b.title, COUNT(r.id) AS total 
            FROM reservations r 
            JOIN books b ON r.book_id = b.id
            GROUP BY b.title 
            ORDER BY total DESC 
            LIMIT 5";

    $stmt = $connexion->query($sql);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

// Fonction pour recuperer les resdervations d'un utilisateur 
function getReservationsByUser($user_id) {
    global $connexion; 

    try {
        $sql = "SELECT books.title, reservations.date_debut, reservations.date_fin, reservations.statut
                FROM reservations
                JOIN books ON reservations.book_id = books.id
                WHERE reservations.user_id = :user_id
                ORDER BY reservations.date_debut DESC";

        $stmt = $connexion->prepare($sql);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        die("Erreur SQL : " . $e->getMessage());
    }
}
?>
