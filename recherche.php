<?php 
session_start();
require('../action/books/searchBookAction.php');
$recherche = true;
include_once '../header.php';
include_once '../navbar.php';

?>

<main class="flex-shrink-0">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Recherche de Livres</h1>
        
        <form method="GET" class="mb-4">
            <div class="row g-3 justify-content-center">
                <div class="col-md-4">
                    <input type="text" class="form-control" name="title" placeholder="Titre du livre">
                </div>
                <div class="col-md-4">
                    <input type="text" class="form-control" name="author" placeholder="Auteur ID">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Rechercher</button>
                </div>
            </div>
        </form>

        <?php if (!empty($error)) { ?>
            <div class="alert alert-danger text-center">
                <?= $error ?>
            </div>
        <?php } ?>


        <div class="row">
            <?php if (!empty($books)) { 
                foreach ($books as $book) { ?>
                    <div class="col-md-4 mb-4">
                        <div class="card shadow-sm">
                            <div class="card-body">
                                <h5 class="card-title"><?= htmlspecialchars($book['title']) ?></h5>
                                <p class="card-text">
                                    <strong>Auteur ID :</strong> <?= htmlspecialchars($book['author_id']) ?><br>
                                    <strong>Date de publication :</strong> <?= htmlspecialchars($book['date_publication']) ?><br>
                                    <strong>Nombre d exemplaires :</strong> <?= htmlspecialchars($book['nombres_exemplaires']) ?><br>
                                </p>
                                <a href="reservations/create_reservation.php?book_id=<?= $book['id'] ?>" 
                                   class="btn btn-success w-100">Reserver</a>
                            </div>
                        </div>
                    </div>
            <?php } }   
             ?>
        </div>
    </div>
</main>
