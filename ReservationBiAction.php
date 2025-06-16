<!-- <?php
require_once '../../database/reservationBi_db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT);
    $statut = isset($_POST['statut']) ? htmlspecialchars($_POST['statut']) : null;

    if ($id && in_array($statut, [STATUS_EN_COURS, STATUS_TERMINEE, STATUS_ANNULEE])) {
        try {
            if (updateReservationStatut($id, $statut)) {
                header('Location: ../../ReservationBibliothecaire/reservationBi.php?message=Statut mis a jour avec succes');
                exit;
            } else {
                header('Location: ../../ReservationBibliothecaire/reservationBi.php?message=Erreur lors de la mise a jour');
                exit;
            }
        } catch (PDOException $e) {
            header('Location: ../../ReservationBibliothecaire/reservationBi.php?message=Une erreur s est produite');
            exit;
        }
    } else {
        header('Location: ../../ReservationBibliothecaire/reservationBi.php?message=Donnees invalides');
        exit;
    }
}
?> -->
