<?php
require_once '../../action/users/registerAction.php';
$register = true;
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center min-vh-100 py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="card shadow-lg rounded-4 p-4 bg-white">
                    <h2 class="text-center text-primary mb-3">Inscription</h2>

                    <?php if (isset($_SESSION['errorMessage'])): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $_SESSION['errorMessage']; unset($_SESSION['errorMessage']); ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif; ?>

                    <form method="POST" action="../../action/users/registerAction.php">
                        <div class="mb-3">
                            <label for="nom" class="form-label">Nom</label>
                            <input type="text" class="form-control rounded-3" name="nom" required>
                        </div>
                        <div class="mb-3">
                            <label for="prenom" class="form-label">Prenom</label>
                            <input type="text" class="form-control rounded-3" name="prenom" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control rounded-3" name="email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control rounded-3" name="password" required>
                        </div>
                        <div class="mb-3">
                            <label for="telephone" class="form-label">Telphone</label>
                            <input type="text" class="form-control rounded-3" name="telephone" required>
                        </div>
                        <div class="mb-3">
                            <label for="adresse" class="form-label">Adresse</label>
                            <input type="text" class="form-control rounded-3" name="adresse" required>
                        </div>
                        <div class="mb-3">
                            <label for="photo" class="form-label">Photo de profil (optionnelle)</label>
                            <input type="file" class="form-control rounded-3" name="photo">
                        </div>
                        <!-- <div class="mb-3">
                            <label for="profile_id" class="form-label">Type de profil</label>
                            <select class="form-control rounded-3" name="profile_id" required>
                                <option value="1">Abonnee</option>
                                <option value="2">Bibliothecaire</option>
                            </select>
                        </div> -->

                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-3" name="envoyer">S inscrire</button>
                    </form>
                    
                    <p class="text-center mt-3">Deja inscrit ? 
                        <a href="login.php" class="text-decoration-none text-primary">Se connecter</a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
