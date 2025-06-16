<?php
  require '../../Database/authors_db.php';
  include '../../navbar.php';
  include '../../header.php';

  if (isset($_GET['id']) && !empty($_GET['id']) && filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT)) {
      $author = getAuthorById($_GET['id']);
      if (!$author) {
          $errorMessage = "L auteur n existe pas";
          echo "<div class='alert alert-danger'>$errorMessage</div>";
          exit();
      }
  } else {
      $errorMessage = "ID de l auteur invalide";
      echo "<div class='alert alert-danger'>$errorMessage</div>";
      exit();
  }
?>

<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Modifier Auteur</h1>

    <?php if (isset($_GET['message'])): ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($_GET['message']) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <?php if (isset($_GET['error'])): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($_GET['error']) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <form method="POST" action="../../action/authors/editAuthorsAction.php">
      <input type="hidden" name="id" value="<?= htmlspecialchars($author['id']) ?>">

      <div class="mb-3">
        <label for="nom" class="form-label">Nom</label>
        <input type="text" class="form-control" id="nom" name="nom" value="<?= htmlspecialchars($author['nom']) ?>" required>
      </div>

      <div class="mb-3">
        <label for="prenom" class="form-label">Prenom</label>
        <input type="text" class="form-control" id="prenom" name="prenom" value="<?= htmlspecialchars($author['prenom']) ?>" required>
      </div>

      <div class="mb-3">
        <label for="biographie" class="form-label">Biographie</label>
        <textarea class="form-control" id="biographie" name="biographie" rows="3" required><?= htmlspecialchars($author['biographie']) ?></textarea>
      </div>

      <div class="mb-3">
        <label for="photo" class="form-label">Photo</label>
        <input type="file" class="form-control" id="photo" name="photo" value="<?= htmlspecialchars($author['photo']) ?>" required>
      </div>

      <button type="submit" class="btn btn-primary">Modifier Auteur</button>
    </form>
  </div>
</main>

<?php include '../../footer.php'; ?>
