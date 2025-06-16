<?php
require '../../Database/authors_db.php';

if (isset($_POST["envoyer"])) {
    if (!empty($_POST['nom']) && !empty($_POST['prenom']) 
        && !empty($_POST['biographie']) && !empty($_FILES['photo'])) {
        
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $biographie = htmlspecialchars($_POST['biographie']);
        
        $image = $_FILES['photo'];
        $imageName = $_FILES['photo']['name'];
        $imageTempName = $_FILES['photo']['tmp_name'];
        $imageType = $_FILES['photo']['type'];
        $imageError = $_FILES['photo']['error'];
        $imageSize = $_FILES['photo']['size'];
        $imageExt = explode('.', $imageName);
        $convertir = strtolower(end($imageExt));
        $autorise = ['jpg', 'jpeg', 'png', 'webp'];

        if (in_array($convertir, $autorise)) {
            if ($imageError === 0) {
                $nouveauImage = uniqid('', true) . '.' . $convertir;
                $newDestination = '../../assets/' . $nouveauImage;

                if (move_uploaded_file($imageTempName, $newDestination)) {

                    addAuthor($nom, $prenom, $biographie, $nouveauImage); 
                    $message = "Auteur ajoute avec succes";
                    header("location: ../../views/authors/authors.php?message=" . urlencode($message));
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
        $errorMessage = "Tous les champs doivent être remplis.";
    }
}
?>
