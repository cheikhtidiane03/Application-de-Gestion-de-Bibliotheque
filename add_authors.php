<?php
  require '../../action/authors/createActionAuthors.php';
  include '../../header.php';
  include_once '../../Database/authors_db.php';
  $authors = getAllAuthors();
?>

<main class="flex-shrink-0">
  <div class="container">
    <h1 class="mt-5">Nouveau Auteur</h1>
    <?php if (isset($errorMessage)) { ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <?php echo $errorMessage; ?>
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php } ?>
    <form class="row g-3" method="post" enctype="multipart/form-data">
      <div class="col-md-6">
        <div class="col-12">
          <label for="inputAddress" class="form-label">Nom</label>
          <input type="text" class="form-control" name="nom" required>
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Prenom</label>
          <input type="text" class="form-control" name="prenom" required>
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Biographie</label>
          <input type="text" class="form-control" name="biographie" required>
        </div>
        <div class="col-12">
          <label for="photo" class="form-label">Image</label>
          <input type="file" class="form-control" id="photo" name="photo" accept="image/*" required>
        </div>
        <div class="col-12">
          <button type="submit" class="btn btn-primary" name="envoyer">Creer</button>
        </div>
      </div>
    </form>
  </div>
</main>

<?php
  include '../../footer.php';
?>
