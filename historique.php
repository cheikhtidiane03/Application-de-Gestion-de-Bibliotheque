<?php
$historique = true;
include '../../navbar.php';
include '../../header.php';
require '../../Database/abonnes_db.php';

if (isset($_GET['id']) && !empty($_GET['id'])) {
    $abonne_id = $_GET['id']; 
    $reservations = getHistoriqueReservations($abonne_id);
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des Reservations</title>
    <!-- Liens vers les fichiers CSS de DataTables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.3/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Historique des Reservations de l Abonne </h1>
        <table id="reservationsTable" class="table table-striped table-bordered">
        <thead>
                <tr>
                    <th>ID Reservation</th>
                    <th>Date de Debut</th>
                    <th>Date de Fin</th>
                    <th>Nom du Livre</th>
                    <th>Statut</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($reservations) && count($reservations) > 0): ?>
                    <?php foreach ($reservations as $reservation): ?>
                    <tr>
                        <td><?php echo $reservation['id']; ?></td>
                        <td><?php echo $reservation['date_debut']; ?></td>
                        <td><?php echo $reservation['date_fin']; ?></td>
                        <td><?php echo $reservation['livre']; ?></td>
                        <td><?php echo $reservation['statut']; ?></td>
                    </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="5">Aucune reservation</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.3/js/jquery.dataTables.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#reservationsTable').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.13.3/i18n/fr_fr.json"
                }
            });
        });
    </script>
</body>
</html>
