<?php
require '../../Database/authors_db.php';
include '../../navbar.php';
include '../../header.php';
$authors = getAllAuthors(); 
?>

<main class="flex-shrink-0">
  <div class="container">
  <h1 class="mt-5 mb-4 text-success fw-bold text-uppercase border-bottom pb-2">✍️Gestion des Auteurs</h1>

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

    <a type="button" class="btn btn-primary float-end mb-3" href="add_authors.php">Nouveau Auteur
      <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16">
        <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
        <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4"/>
      </svg>
    </a>

    <table id="myDataTable" class="display">
      <thead>
          <tr>
              <th>ID</th>
              <th>Nom</th>
              <th>Prenom</th>
              <th>Biographie</th>
              <th>Photo</th>
              <th>Actions</th>
          </tr>
      </thead>
      <tbody>
      <?php foreach ($authors as $author): ?>
<tr>
    <td><?= htmlspecialchars($author['id']) ?></td>
    <td><?= htmlspecialchars($author['nom']) ?></td>
    <td><?= htmlspecialchars($author['prenom']) ?></td>
    <td><?= htmlspecialchars($author['biographie']) ?></td>
    <td><img width="50" height="50" style="border-radius: 100%;" src="../../assets/<?= htmlspecialchars($author['photo']) ?>" alt=""></td>
    <td>
        <a type="button" class="btn btn-primary" href="edit_authors.php?id=<?= htmlspecialchars($author['id']) ?>">
        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325"/>
              </svg>
              </a>
              <a type="button" class="btn btn-danger" href="/action/authors/deleteAuthorsAction.php?id=<?= htmlspecialchars($author['id']) ?>" onclick="return confirm('Etes-vous sur de vouloir supprimer cet auteur ?');">
              <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                </svg>
              </a>
    </td>
</tr>
<?php endforeach; ?>

      </tbody>
    </table>
  </div>
</main>

<?php include '../../footer.php'; ?>
