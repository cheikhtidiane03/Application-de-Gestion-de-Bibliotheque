<?php
require '../../Database/authors_db.php';

if (isset($_POST['id']) && !empty($_POST['id']) && filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT)) {
    $id = $_POST['id'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $biographie = $_POST['biographie'];
    $photo = $_POST['photo'];

    $resultat = getAuthorById($id);
    if ($resultat) {
        updateAuthor($id, $nom, $prenom, $biographie, $photo);
        $message = "Auteur modifie avec succes";
        header("Location: ../../views/authors/authors.php?message=" . urlencode($message));
        exit();
    } else {
        $errorMessage = "L auteur n existe pas";

        header("Location: ../../views/authors/authors.php?error=" . urlencode($errorMessage));
        exit();
    }
} else {
    $errorMessage = "Erreur lors de la modification de l auteur";

    header("Location: ../../views/authors/authors.php?error=" . urlencode($errorMessage));
    exit();
}
?>
