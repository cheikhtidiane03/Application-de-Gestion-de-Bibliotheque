<?php
require '../../Database/books_db.php';

if (isset($_POST['id']) && !empty($_POST['id']) && filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT)) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $image = !empty($_POST['image']) ? $_POST['image'] : null; 
    $nombres_exemplaires = $_POST['nombres_exemplaires'];
    $date_publication = $_POST['date_publication'];
    $author_id = $_POST['author_id'];


    $book = getOneBook($id);
    if ($book) {

        editBook($title, $description, $image, $nombres_exemplaires, $date_publication, $author_id, $id);
        $message = "Livre modifie avec succes";
        header("Location: ../../views/books/books.php?message=" . urlencode($message));
        exit();
    } else {
        $errorMessage = "Livre non trouve";
        header("Location: ../../views/books/books.php?error=" . urlencode($errorMessage));
        exit();
    }
} else {
    $errorMessage = "Erreur lors de la modification du livre";
    header("Location: ../../views/books/books.php?error=" . urlencode($errorMessage));
    exit();
}
?>
