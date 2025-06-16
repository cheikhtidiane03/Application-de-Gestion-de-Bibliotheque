<?php
require '../../Database/user_db.php';
session_start(); 
if (isset($_POST['envoyer'])) {

    if (!empty($_POST['nom']) && !empty($_POST['prenom']) &&
        !empty($_POST['email']) && !empty($_POST['password']) &&
        !empty($_POST['telephone']) && !empty($_POST['adresse'])) {


        $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
        if (!$email) {
            $_SESSION['errorMessage'] = "L email est incorrect!";
            header('Location: ../../views/users/register.php');
            exit();
        }

        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $telephone = htmlspecialchars($_POST['telephone']);
        $adresse = htmlspecialchars($_POST['adresse']);
        $profile_id = isset($_POST['profile_id']) ? intval($_POST['profile_id']) : 2;

        $resultat = getUserByEmail($email);
        if ($resultat && $resultat->rowCount() > 0) {
            $_SESSION['errorMessage'] = "Cet email existe";
            header('Location: ../../views/users/register.php');
            exit();
        }

        // Gestion de l'upload de la photo
        $photo = '';
        if (isset($_FILES['photo']) && $_FILES['photo']['error'] == 0) {
            $photo = $_FILES['photo'];

            $allowedTypes = ['image/jpeg', 'image/png', 'image/gif'];
            if (in_array($photo['type'], $allowedTypes)) {

                $photoName = uniqid() . '.' . pathinfo($photo['name'], PATHINFO_EXTENSION);
                move_uploaded_file($photo['tmp_name'], '../../uploads/' . $photoName);
                $photo = $photoName;
            } else {
                $_SESSION['errorMessage'] = "Le format de la photo n'est pas valide. Utilisez jpg, png ou gif.";
                header('Location: ../../views/users/register.php');
                exit();
            }
        }


        registerUser($nom, $prenom, $email, $password, $telephone, $adresse, $photo, $profile_id);

        
        $_SESSION['successMessage'] = "Inscription reussie avec succes!";
        header("Location: ../../views/users/login.php"); 
        exit();
    
        

    } else {
        $_SESSION['errorMessage'] = "Veuillez remplir tous les champs.";
        header('Location: ../../views/users/register.php');
        exit();
    }
}
?>
