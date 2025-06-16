<?php
require '../../Database/abonnes_db.php';

if (isset($_GET['activer'])) {
    $id = $_GET['activer'];
    activateUser($id); 
    header('Location: abonnes.php?message=Abonne active avec succes');
    exit;
}

if (isset($_GET['desactiver'])) {
    $id = $_GET['desactiver'];
    deactivateUser($id);
    header('Location: abonnes.php?message=Abonne desactive avec succes');
    exit;
}
