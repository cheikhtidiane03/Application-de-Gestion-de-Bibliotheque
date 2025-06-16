<?php

require __DIR__ . '/../../database/books_db.php';

if (isset($_GET['title']) || isset($_GET['author'])) {
    $title = isset($_GET['title']) ? $_GET['title'] : '';
    $author = isset($_GET['author']) ? $_GET['author'] : '';


    $searchStmt = searchBooks($title, $author);
    $books = $searchStmt->fetchAll(PDO::FETCH_ASSOC);

    if (empty($books)) {
        $error = 'Aucune correspondance.';
    }
}
?>
