<?php
require_once 'db_connection.php';

// Fonction pour recuperer tous les auteurs
function getAllAuthors() {
        global $connexion;
        $stmt = $connexion->query("SELECT * FROM authors");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

//Fonction pour recuperer un auteur par son id
function getAuthorById($id) {
        global $connexion;
        $stmt = $connexion->prepare("SELECT * FROM authors WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

//Fonction pour ajouter un auteur
function addAuthor($nom, $prenom, $biographie, $photo) {
        global $connexion;
        $stmt = $connexion->prepare("INSERT INTO authors (nom, prenom, biographie, photo) VALUES (?, ?, ?, ?)");
        $stmt->execute([$nom, $prenom, $biographie, $photo]);
    }

//Fonction pour modifier un auteur
function updateAuthor($id, $nom, $prenom, $biographie, $photo) {
        global $connexion;
        $stmt = $connexion->prepare("UPDATE authors SET nom = ?, prenom = ?, biographie = ?, photo = ? WHERE id = ?");
        $stmt->execute([$nom, $prenom, $biographie, $photo, $id]);
    }

//Fonction pour supprimer un auteur
function deleteAuthor($id) {
        global $connexion;
            $stmt = $connexion->prepare("DELETE FROM authors WHERE id = ?");
            $stmt->execute([$id]);
    }

?>
