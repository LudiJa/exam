<?php
require "dev.env.php";

try {
    $connexion_string = "mysql:dbname=c1759204c_wf3_php_intermediaire_ludivine;host=localhost";
    $connexion = new PDO($connexion_string, 'c1759204c', '67UdybfUJKnSxVe');
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    // $connexion = null;
    echo 'Erreur : ' . $e->getMessage();
}

// connexion à la base de données