<?php
  require '../../action/books/createActionBooks.php';
  include '../../header.php';
  include_once '../../Database/books_db.php';
  $books = getAllBooks();
?>


<main class="flex-shrink-0">
  <div class="container mt-4">
    <h1 class="mt-3">Nouveau Livre</h1>


    <?php if(isset($errorMessage) && !empty($errorMessage)): ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?php echo $errorMessage; ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif; ?>

    <form class="row g-3" method="post" enctype="multipart/form-data">
      

    <div class="col-md-6 mb-3">
        <label class="form-label">Titre</label>
        <input type="text" class="form-control" name="title" required>
      </div>


      <div class="col-md-6 mb-3">
        <label class="form-label">Description</label>
        <textarea class="form-control" name="description" rows="3" required></textarea>
      </div>


      <div class="col-md-6 mb-3">
        <label class="form-label">Image</label>
        <input type="file" class="form-control" name="photo" accept="image/*" required>
      </div>


      <div class="col-md-6 mb-3">
        <label class="form-label">Nombre d Exemplaires</label>
        <input type="number" class="form-control" name="nombre_exemplaire" required>
      </div>


      <div class="col-md-6 mb-3">
        <label class="form-label">Date de Publication</label>
        <input type="date" class="form-control" name="date_publication" required>
      </div>


      <div class="col-md-6 mb-3">
        <label class="form-label">ID Auteur</label>
        <input type="number" class="form-control" name="author_id" required>
      </div>


      <div class="col-md-6 mb-3">
        <label class="form-label">Date Creation</label>
        <input type="date" class="form-control" name="date_creation" required>
      </div>


      <div class="col-12">
        <button type="submit" class="btn btn-primary" name="envoyer">Créer</button>
      </div>

    </form>
  </div>
</main>

<?php include '../../footer.php'; ?>
