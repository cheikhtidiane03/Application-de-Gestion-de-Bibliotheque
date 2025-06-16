<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
$profile_id = $_SESSION['profile_id'] ?? null;
?>
<nav class="navbar navbar-expand-lg navbar-dark bg-secondary">
  <div class="container-fluid">

    <a class="navbar-brand" href="/index.php">Gestion de bibliotheque</a>

    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
      aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav me-auto">

        <li class="nav-item">
          <a class="nav-link <?= !empty($index) ? 'active' : '' ?>" aria-current="page"
            href="/index.php">Accueil</a>
        </li>

        <?php if ($profile_id == 2): ?>
        <li class="nav-item">
          <a class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/views/recherche.php') ? 'active' : '' ?>"
            href="/views/recherche.php">Recherche</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/views/reservations/reservation.php') ? 'active' : '' ?>"
            href="/views/reservations/reservation.php">Reservation</a>
        </li>
        <?php endif; ?>

        <?php if ($profile_id == 1): ?>
        <li class="nav-item">
          <a class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/views/books/books.php') ? 'active' : '' ?>"
            href="/views/books/books.php">Gestion des Livres</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/views/authors/authors.php') ? 'active' : '' ?>"
            href="/views/authors/authors.php">Gestion des Auteurs</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/views/abonnes/abonnes.php') ? 'active' : '' ?>"
            href="/views/abonnes/abonnes.php">Gestion des Abonnes</a>
        </li>

        <li class="nav-item">
          <a class="nav-link <?= ($_SERVER['REQUEST_URI'] == '/views/ReservationBibliothecaire/reservationBi.php') ? 'active' : '' ?>"
            href="/views/ReservationBibliothecaire/reservationBi.php">Gestion des Reservations</a>
        </li>
        <?php endif; ?>

      </ul>

      <a href="/action/users/logoutAction.php" class="btn btn-danger" onclick="return confirm('Etes-vous sur de vouloir vous deconnecter ?');">
        Se déconnecter
      </a>

    </div>
  </div>
</nav>

<style>
  .navbar {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    padding: 12px 20px;
  }

  .navbar-brand {
    font-weight: bold;
    font-size: 1.3rem;
    text-transform: uppercase;
  }

  .navbar-nav .nav-link {
    font-size: 1.1rem;
    font-weight: 500;
    transition: all 0.3s ease-in-out;
  }

  .navbar-nav .nav-link:hover,
  .navbar-nav .nav-link.active {
    color: #ffcc00 !important;
    background-color: rgba(255, 255, 255, 0.1);
    border-radius: 5px;
  }

  .btn-danger {
    font-weight: bold;
    padding: 8px 15px;
    transition: all 0.3s ease-in-out;
  }

  .btn-danger:hover {
    background-color: #c82333;
    border-color: #bd2130;
  }
</style>
