<?php
require '../../Database/abonnes_db.php';

if (isset($_GET['activer'])) {
    $id = $_GET['activer'];
    activateUser($id);
    header('Location: abonnes.php?message=Abonne active avec succes');
    exit;
}

if (isset($_GET['desactiver'])) {
    $id = $_GET['desactiver'];
    deactivateUser($id);
    header('Location: abonnes.php?message=Abonne desactive avec succes');
    exit;
}

// Fonction pour activer un utilisateur
function activateUser($id) {
    global $connexion;
    $query = "UPDATE users SET status = 'Active' WHERE id = :id";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}

// Fonction pour désactiver un utilisateur
function deactivateUser($id) {
    global $connexion;
    $query = "UPDATE users SET status = 'Inactive' WHERE id = :id";
    $stmt = $connexion->prepare($query);
    $stmt->bindParam(":id", $id);
    $stmt->execute();
}
?>
