<?php
require '../../Database/abonnes_db.php';
$abonnes = getAllUsers();

include '../../navbar.php';
include '../../header.php';
?>

<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5 mb-4 text-warning fw-bold text-uppercase border-bottom pb-2">👥 Gestion des Abonnés</h1>
    
    <?php if (isset($_GET['message'])): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($_GET['message']) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <table id="myDataTable" class="display">
      <thead>
        <tr>
          <th>ID</th>
          <th>Photo</th>
          <th>Nom</th>
          <th>Email</th>
          <th>Statut</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($abonnes as $abonne): ?>
          <tr>
            <td><?= $abonne['id']; ?></td>
            <td>
              <?php if (!empty($abonne['photo'])): ?>
                <img src="../../uploads/<?= htmlspecialchars($abonne['photo']); ?>" alt="Photo de <?= htmlspecialchars($abonne['nom']); ?>" width="50" height="50" class="rounded-circle">
              <?php else: ?>
                <img src="../../assets/default.jpg" alt="Photo par défaut" width="50" height="50" class="rounded-circle">
              <?php endif; ?>
            </td>
            <td><?= htmlspecialchars($abonne['nom']); ?></td>
            <td><?= htmlspecialchars($abonne['email']); ?></td>
            <td><?= $abonne['status'] ? 'ACTIVE' : 'INACTIVE'; ?></td>
            <td>
              <a href="actions.php?activer=<?= $abonne['id']; ?>" class="btn btn-success">Activer</a>
              <a href="actions.php?desactiver=<?= $abonne['id']; ?>" class="btn btn-danger">Désactiver</a>
              <a href="historique.php?id=<?= $abonne['id']; ?>" class="btn btn-info">Historique</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</main>

<?php include '../../footer.php'; ?>
