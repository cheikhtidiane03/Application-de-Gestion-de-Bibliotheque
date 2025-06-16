<?php
require 'db_connection.php'; 

// Fonction pour recuperer tous les livres
function getAllBooks() {
        global $connexion;
        $sql = "SELECT books.*, authors.nom AS author_name FROM books LEFT JOIN authors ON books.author_id = authors.id";
        $stmt = $connexion->query($sql); 
        $books = [];
    
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
            $books[] = $row;
        }
    
        return $books;
    }

// Fonction pour ajouter un livre
function addBook($title, $description, $image, $nombres_exemplaires, $date_publication, $author_id, $date_creation, $date_modification) {
        global $connexion;
        $query = "INSERT INTO books(title, description, image, nombres_exemplaires, date_publication, author_id, date_creation, date_modification) 
                  VALUES(?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = $connexion->prepare($query);
        $stmt->execute([$title, $description, $image, $nombres_exemplaires, $date_publication, $author_id, $date_creation, $date_modification]);
        $stmt->closeCursor();
    }

// Fonction pour recuperer un livre par son id    
function getOneBook($id) {
        global $connexion;
        $query = "SELECT * FROM books WHERE id=?";
        $stmt = $connexion->prepare($query);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

// Fonction pour modifier un livre    
function editBook($title, $description, $image, $nombres_exemplaires, $date_publication, $author_id, $id) {
        global $connexion;
    
        if (!empty($image)) {
            $query = "UPDATE books SET title=?, description=?, image=?, nombres_exemplaires=?, 
                      date_publication=?, author_id=?, date_modification=NOW() WHERE id=?";
            $params = [$title, $description, $image, $nombres_exemplaires, $date_publication, $author_id, $id];
        } else {
            $query = "UPDATE books SET title=?, description=?, nombres_exemplaires=?, 
                      date_publication=?, author_id=?, date_modification=NOW() WHERE id=?";
            $params = [$title, $description, $nombres_exemplaires, $date_publication, $author_id, $id];
        }
    
        $stmt = $connexion->prepare($query);
        $stmt->execute($params);
        $stmt->closeCursor();
    }

// Fonction pour supprimer un livre    
function deleteBook($id) {
        global $connexion;
        $query = "DELETE FROM books WHERE id = ?";
        $stmt = $connexion->prepare($query);
        $stmt->execute([$id]);
    }
    
    
//Fonction pour telecharger une image
function uploadBookImage($id, $image) {
        global $connexion;
        $query = "UPDATE books SET image=? WHERE id=?";
        $stmt = $connexion->prepare($query);
        $stmt->execute([$image, $id]);
        $stmt->closeCursor();
    }

// Fonction pour rechercher des livres
function searchBooks($title, $author_id) {
        global $connexion;
    
        $sql = 'SELECT b.* FROM books b 
                LEFT JOIN authors a ON b.author_id = a.id 
                WHERE b.title LIKE :title';
    
        if ($author_id) {
            $sql .= ' AND a.id = :author_id';
        }
    
        $stmt = $connexion->prepare($sql);
    
        // Paramètres pour éviter des erreurs
        $params = ['title' => '%' . $title . '%'];
    
        if ($author_id) {
            $params['author_id'] = $author_id;
        }
    
        $stmt->execute($params);
    
        return $stmt;
    }

// Fonction pour recuperer un livre par son id
function getBookById($book_id) {
        global $connexion;
        $stmt = $connexion->prepare("SELECT * FROM books WHERE id = :book_id");
        $stmt->execute(['book_id' => $book_id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }


    function createReservation($book_id, $user_id, $date_debut, $date_fin) {
        global $connexion;
    
        $statut = 'en_cours';  // Valeur par défaut
    
        $query = "INSERT INTO reservations (book_id, date_debut, date_fin, user_id, statut) 
                VALUES (:book_id, :date_debut, :date_fin, :user_id, :statut)";
    
        $stmt = $connexion->prepare($query);
        $stmt->bindParam(':book_id', $book_id, PDO::PARAM_INT);
        $stmt->bindParam(':date_debut', $date_debut, PDO::PARAM_STR);
        $stmt->bindParam(':date_fin', $date_fin, PDO::PARAM_STR);
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        $stmt->bindParam(':statut', $statut, PDO::PARAM_STR);
    
        return $stmt->execute();
    }
    


//Fonction pour recuperer les reservations d un abonne
function getReservationsByUser($user_id) {
    global $connexion;

        $query = "SELECT r.id, r.date_debut, r.date_fin, r.statut, b.title AS books, b.image
                FROM reservations r
                INNER JOIN books b ON r.book_id = b.id
                WHERE r.user_id = :user_id
                ORDER BY r.date_debut DESC"; // On trie par date de début

        $stmt = $connexion->prepare($query);
        
        // Lier le paramètre user_id
        $stmt->bindParam(':user_id', $user_id, PDO::PARAM_INT);
        
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function getUserStatus($user_id) {
    global $connexion;

    $stmt = $connexion->prepare("SELECT status FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $result = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($result) {
        return trim(strtolower($result['status'])); // Supprime les espaces et met en minuscule
    }

    return null; // Retourne null si aucun résultat
}






?>
