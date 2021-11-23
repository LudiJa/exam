<?php
require "dev.env.php";

try {
    $connexion_string = "mysql:host=localhost;dbname=xxxxxx";
    $connexion = new PDO($connexion_string, 'xxxxx', 'xxxxx');
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo 'Erreur : ' . $e->getMessage();
}

// connexion à la base de données
