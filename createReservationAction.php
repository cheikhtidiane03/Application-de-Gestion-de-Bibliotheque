<?php
ob_start();
require __DIR__ . '/../../header.php';
require __DIR__ . '/../../navbar.php';
require __DIR__ . '/../../Database/books_db.php';

$message = '';

// Vérification et récupération de l'ID du livre
$book_id = isset($_GET['book_id']) ? $_GET['book_id'] : NULL;

if (!$book_id) {
    header('location: ../../index.php');
    exit;
}

$book = getBookById($book_id);
if (!$book) {
    $message = 'Livre non trouvé.';
    exit;
}

$user_id = $_SESSION['user_id']; 
$user_status = getUserStatus($user_id);

//Vérifier si l'utilisateur est actif
if ($user_status !== 'active') {
    $message = 'Votre compte est inactif. Vous ne pouvez pas effectuer de réservation.';
} else {
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['date_debut']) && isset($_POST['date_fin'])) {
        $date_debut = $_POST['date_debut'];
        $date_fin = $_POST['date_fin'];

      
        if ($date_debut > $date_fin) {
            $message = 'La date de debut doit etre inferieure a la date de fin.';
        } else {
            try {
                if (createReservation($book_id, $user_id, $date_debut, $date_fin)) {
                    $_SESSION['success_message'] = 'Reservation effectuee avec succès!';
                    header('location: ../../views/recherche.php');
                    exit;
                } else {
                    $message = 'Une erreur est survenue.';
                }
            } catch (Exception $e) {
                $message = 'Une erreur est survenue: ' . $e->getMessage();
            }
        }
    } else {
        $message = 'Veuillez remplir tous les champs.';
    }
}
}
?>
