<?php
require "includes/config.php";
require "includes/connect.php";

//  on vérifie que les champs du formulaire sont correctement remplis...
if(empty($_POST['title']) || empty($_POST['description']) || empty($_POST['postal_code']) || empty($_POST['city']) || empty($_POST['type']) || empty($_POST['price']))
{
    header('Location:addAnnonce.php?error=missingInput');
    exit();
    // ... si c'est le cas, on initialise les variables avec assainissement pour limiter les risque d'injections SQL
} else {
    $title = htmlspecialchars(trim($_POST['title']));
    $description = htmlspecialchars(trim($_POST['description']));
    $postal_code = htmlspecialchars(trim($_POST['postal_code']));
    $city = htmlspecialchars(trim($_POST['city']));
    $type = htmlspecialchars(trim($_POST['type']));
    $price = htmlspecialchars(trim($_POST['price']));
  

// on ajoute les informations des champs dans la base de données
try {
    $insertAdvert = 'INSERT INTO advert (title, description, postal_code, city, type, price) VALUES(:title, :description, :postal_code, :city, :type, :price)';
    $reqInsertAdvert = $connexion->prepare($insertAdvert);

    $reqInsertAdvert->bindValue(':title', $title, PDO::PARAM_STR);
    $reqInsertAdvert->bindValue(':description', $description, PDO::PARAM_STR);
    $reqInsertAdvert->bindValue(':postal_code', $postal_code, PDO::PARAM_STR);
    $reqInsertAdvert->bindValue(':city', $city, PDO::PARAM_STR);
    $reqInsertAdvert->bindValue(':type', $type, PDO::PARAM_STR);
    $reqInsertAdvert->bindValue(':price', $price);
    if ($reqInsertAdvert->execute()) {
        header('Location:addAnnonce.php?success=addedAnnonce');
        exit();
    }else{
        echo 'ok';
        header('Location:addAnnonce.php?error=unknownError');
    }
} catch (PDOException $e) {
    echo $e->getMessage();
}}
?>