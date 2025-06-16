<?php
require '../../Database/user_db.php';
session_start();
    if(isset($_POST['login'])){
        if(isset($_POST['email']) && !empty($_POST['email']) &&
           isset($_POST['password']) && !empty($_POST['password'])){
            $resultat = getUserByEmail($_POST['email']);
            if($resultat->rowCount() > 0){
                $user = $resultat->fetch(PDO::FETCH_ASSOC);
                if(password_verify($_POST['password'], $user['password'])){
                    $_SESSION['islogin'] = true;
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['nom'] = $user['nom'];
                    $_SESSION['prenom'] = $user['prenom'];
                    $_SESSION['telephone'] = $user['telephone'];
                    $_SESSION['adresse'] = $user['adresse'];
                    $_SESSION['photo'] = $user['photo'];
                    $_SESSION['profile_id'] = $user['profile_id'];   
                                     
                    header('location: ../../index.php');                    
                }else $errorMessage = "Mot de Passe incorrect";
            }else $errorMessage = "Email incorrect";
        }else $errorMessage = "Veuillez remplir les champs au complet";
    }
?>