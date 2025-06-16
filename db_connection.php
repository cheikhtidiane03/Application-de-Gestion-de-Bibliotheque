<?php
    $host = "localhost";
    $db_user = "root";
    $db_password = "";
    $db_port = 3306;
    $db_name = "library";

    $dsn = "mysql:host=$host;dbname=$db_name;port=$db_port;charset=utf8";

    try{
        $connexion = new PDO($dsn, $db_user, $db_password);
    }
    catch(PDOException $e){
        die("Erreur: ".$e->getMessage());
    }

    




?>