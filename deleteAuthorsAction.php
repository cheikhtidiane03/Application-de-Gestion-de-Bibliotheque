<?php
require '../../Database/authors_db.php';

if (isset($_GET['id']) && !empty($_GET['id']) && filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)) {
    $resultat = getAuthorById($_GET['id']);
    if ($resultat) {
        deleteAuthor($_GET['id']);
        $message = "Auteur supprime avec succes";
        header("Location: ../../views/authors/authors.php?message=" . urlencode($message));
        exit();
    } else {
        $errorMessage = "L id ne correspond pas";
        header("Location: ../../views/authors/authors.php?error=" . urlencode($errorMessage));
        exit();
    }
} else {
    $errorMessage = "Cet auteur n existe pas";
    header("Location: ../../views/authors/authors.php?error=" . urlencode($errorMessage));
    exit();
}
?>
