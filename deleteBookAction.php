
<?php
require '../../Database/books_db.php';

if (isset($_GET['id']) && !empty($_GET['id']) && filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)) {
    $resultat = getOneBook($_GET['id']);
    if ($resultat) {
        deleteBook($_GET['id']);
        $message = "Livre supprime avec succes";

        header("Location: ../../views/books/books.php?message=" . urlencode($message));
        exit();
    } else {
        $errorMessage = "L id ne correspond pas";

        header("Location: ../../views/books/books.php?message=" . urlencode($message));
        exit();
    }
} else {
    $errorMessage = "Cet livre n existe pas";

    header("Location: ../../views/books/books.php?message=" . urlencode($message));
    exit();
}
?>
