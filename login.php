<?php
require ('../../action/users/loginAction.php');
include_once '../../header.php'
?>

<main class="flex-shrink-0 min-vh-100 d-flex align-items-center bg-light py-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-4">
                <div class="card shadow-lg rounded-4 p-4 bg-white">
                    <h1 class="text-center mb-4 text-primary">Authentification</h1>
                    
                    <?php if(isset($errorMessage)) { ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= $errorMessage ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>

                    <?php if(isset($_GET['message'])) { ?>
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            <?= $_GET['message']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php } ?>

                    <form method="POST">
                        <div class="mb-3">
                            <label for="inputEmail" class="form-label">Email</label>
                            <input type="email" class="form-control rounded-3" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" class="form-control rounded-3" name="password">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg w-100 rounded-3" name="login">
                            Se connecter
                        </button>
                        <a href="register.php" class="d-block mt-3 text-center text-decoration-none text-primary">
                            S inscrire
                        </a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
</main>
