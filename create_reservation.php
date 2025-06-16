<?php
session_start(); 
require __DIR__ . '/../../action/reservations/createReservationAction.php'; 

?>
<main>
    <div class="container">
        <h2>Réserver le livre : <?= htmlspecialchars($book['title']) ?></h2>

        <?php if (!empty($message)): ?>
            <div class="alert alert-info alert-dismissible fade show" role="alert">
                <?= htmlspecialchars($message); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        <?php endif; ?>

        <form method="POST">
            <div class="form-group">
                <label for="date_debut">Date de début</label>
                <input type="date" class="form-control" id="date_debut" name="date_debut" required>
            </div>

            <div class="form-group">
                <label for="date_fin">Date de fin</label>
                <input type="date" class="form-control" id="date_fin" name="date_fin" required>
            </div>

            <button type="submit" class="btn btn-primary">Reserver</button>
        </form>
    </div>
</main>

