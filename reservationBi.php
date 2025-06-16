<?php
require_once '../../action/reservationBibliothecaire/reservationBiAction.php';
include '../../navbar.php';
include '../../header.php';

// Vérification et nettoyage du paramètre statut
$statut = isset($_GET['statut']) ? htmlspecialchars($_GET['statut']) : null;
// if (!in_array($statut, [STATUS_EN_COURS, STATUS_TERMINEE, STATUS_ANNULEE, null])) {
//     $statut = null;
// }

$reservations = getReservations($statut);
$topLivres = getTopLivres();
?>

<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5 mb-4 text-danger fw-bold text-uppercase border-bottom pb-2">📅 Gestion des Reservations</h1>

    <?php if(isset($_GET['message'])): ?>
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <?= htmlspecialchars($_GET['message']) ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <form method="GET" class="mb-3">
        <label for="statut" class="form-label fw-bold">Filtrer par statut :</label>
        <select name="statut" id="statut" class="form-select" onchange="this.form.submit()">
            <option value="" <?= !$statut ? 'selected' : '' ?>>Tous</option>
            <option value="<?= STATUS_EN_COURS ?>" <?= $statut == STATUS_EN_COURS ? 'selected' : '' ?>>En cours</option>
            <option value="<?= STATUS_TERMINEE ?>" <?= $statut == STATUS_TERMINEE ? 'selected' : '' ?>>Terminee</option>
            <option value="<?= STATUS_ANNULEE ?>" <?= $statut == STATUS_ANNULEE ? 'selected' : '' ?>>Annulee</option>
        </select>
    </form>

    <table id="myDataTable" class="display">
        <thead>
            <tr>
                <th>ID</th>
                <th>Date</th>
                <th>Nom</th>
                <th>Livre</th>
                <th>Statut</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reservations as $res): ?>
                <tr>
                    <td><?= htmlspecialchars($res['id']) ?></td>
                    <td><?= htmlspecialchars($res['date_debut']) ?></td>
                    <td><?= htmlspecialchars($res['abonne']) ?></td>
                    <td><?= htmlspecialchars($res['livre']) ?></td>
                    <td><?= htmlspecialchars($res['statut']) ?></td>
                    <td>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  </div>
</main>

<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">📚 Livres les plus reservees</h1>
    <ul class="list-group">
        <?php foreach ($topLivres as $livre): ?>
            <li class="list-group-item"><?= htmlspecialchars($livre['title']) ?> (<?= htmlspecialchars($livre['total']) ?> reservations)</li>
        <?php endforeach; ?>
    </ul>
  </div>
</main>

<?php include '../../footer.php'; ?>
