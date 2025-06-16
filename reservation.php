<?php
session_start();
require __DIR__ . '/../../header.php';
require __DIR__ . '/../../navbar.php';
require __DIR__ . '/../../Database/books_db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php'); 
    exit;
}

$user_id = $_SESSION['user_id'];
$reservations = getReservationsByUser($user_id);
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historique des Reservations</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
</head>
<body>

<div class="container mt-4">
    <h2> Historique de mes Reservations</h2>

    <table id="reservationsTable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Livre</th>
                <th>Date de debut</th>
                <th>Date de fin</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $reservation): ?>
                <tr>
                    <td><?= htmlspecialchars($reservation['id']) ?></td>
                    <td><?php echo $reservation['books']; ?></td>
                    <td><?= htmlspecialchars($reservation['date_debut']) ?></td>
                    <td><?= htmlspecialchars($reservation['date_fin']) ?></td>
                    <td>
                        <?php if ($reservation['statut'] == 'en_cours'): ?>
                            <span class="badge bg-success">En cours</span>
                        <?php elseif ($reservation['statut'] == 'terminee'): ?>
                            <span class="badge bg-warning text-dark">Terminee</span>
                            <?php elseif ($reservation['statut'] == 'annulee'): ?>
                                <span class="badge bg-warning text-dark">Anmulee</span>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script>
    $(document).ready( function () {
        $('#reservationsTable').DataTable({
            "language": {
                "url": "//cdn.datatables.net/plug-ins/1.11.5/i18n/French.json"
            }
        });
    });
</script>

</body>
</html>
