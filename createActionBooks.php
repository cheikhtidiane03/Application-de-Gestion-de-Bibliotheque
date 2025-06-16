<?php
require '../../Database/books_db.php';

if (isset($_POST["envoyer"])) {
    if (!empty($_POST['title']) && !empty($_POST['description']) 
        && !empty($_POST['nombre_exemplaire']) && !empty($_POST['date_publication'])
        && !empty($_POST['author_id']) && isset($_FILES['photo']) && !empty($_FILES['photo']['name'])) {

        $title = htmlspecialchars($_POST['title']);
        $description = htmlspecialchars($_POST['description']);
        $nombre_exemplaire = intval($_POST['nombre_exemplaire']);
        $date_publication = $_POST['date_publication'];
        $author_id = intval($_POST['author_id']);
        $date_creation = $_POST['date_creation'];
        $date_modification = $_POST['date_modification'];
        $date_creation = $_POST['date_creation'];
        $date_modification = $_POST['date_modification'];

        $image = $_FILES['photo'];
        $imageName = $_FILES['photo']['name'];
        $imageTempName = $_FILES['photo']['tmp_name'];
        $imageType = $_FILES['photo']['type'];
        $imageError = $_FILES['photo']['error'];
        $imageSize = $_FILES['photo']['size'];
        $imageExt = explode('.', $imageName);
        $imageNewExt = strtolower(end($imageExt));
        $allowedExt = ['jpg', 'jpeg', 'png', 'webp'];

        // Vérifier si l'extension de l'image est autorisée
        if (in_array($imageNewExt, $allowedExt)) {
            if ($imageError === 0) {
                $imageNewName = uniqid('', true) . '.' . $imageNewExt;
                $newDestination = '../../assets/' . $imageNewName;

                if (move_uploaded_file($imageTempName, $newDestination)) {
                    addBook($title, $description, $imageNewName, $nombre_exemplaire, $date_publication, $author_id, $date_creation, $date_modification);
                    $message = "Livre ajoute avec succes";
                    header("location: ../../views/books/books.php?message=" . urlencode($message));
                    exit();
                } else {
                    $errorMessage = "Erreur lors du deplacement du fichier.";
                }
            } else {
                $errorMessage = "Erreur lors du telechargement.";
            }
        } else {
            $errorMessage = "Ce type de fichier n est pas autorise.";
        }
    } else {
        $errorMessage = "Veuillez remplir tous les champs.";
    }
}
?>
