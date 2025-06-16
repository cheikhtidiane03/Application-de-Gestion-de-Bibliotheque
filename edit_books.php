<?php
require '../../Database/books_db.php';

if (isset($_GET['id']) && filter_var($_GET['id'], FILTER_VALIDATE_INT)) {
    $book = getOneBook($_GET['id']);
    if (!$book) {
        $errorMessage = "Livre introuvable.";
    }
} else {
    $errorMessage = "ID invalide.";
}

include_once '../../header.php';
?>

<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Modifier Livre</h1>
    <?php if (isset($errorMessage)): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <?= $errorMessage; ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    <?php endif; ?>

    <?php if (isset($book)): ?>
    <form class="row g-3" method="post" action="../../action/books/editBooksAction.php">
      <input type="hidden" name="id" value="<?= $book['id']; ?>">

      <div class="col-md-6">
        <label class="form-label">Titre</label>
        <input type="text" class="form-control" name="title" value="<?= htmlspecialchars($book['title']); ?>" required>
      </div>
      
      <div class="col-md-6">
        <label class="form-label">Description</label>
        <input type="text" class="form-control" name="description" value="<?= htmlspecialchars($book['description']); ?>" required>
      </div>

      <div class="col-12">
        <label class="form-label">Image</label>
        <input type="text" class="form-control" name="image" value="<?= htmlspecialchars($book['image']); ?>">
      </div>

      <div class="col-12">
        <label class="form-label">Nombre d exemplaires</label>
        <input type="number" class="form-control" name="nombres_exemplaires" value="<?= $book['nombres_exemplaires']; ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Date de Publication</label>
        <input type="date" class="form-control" name="date_publication" value="<?= $book['date_publication']; ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Auteur ID</label>
        <input type="number" class="form-control" name="author_id" value="<?= $book['author_id']; ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Date Creation</label>
        <input type="date" class="form-control" name="date_creation" value="<?= $book['date_creation']; ?>" required>
      </div>

      <div class="col-md-6">
        <label class="form-label">Date Modification</label>
        <input type="date" class="form-control" name="date_modification" value="<?= $book['date_modification']; ?>" required>
      </div>

      <div class="col-12">
        <button type="submit" class="btn btn-primary">Mettre a jour</button>
      </div>
    </form>
    <?php endif; ?>
  </div>
</main>

<?php include '../../footer.php'; ?>
