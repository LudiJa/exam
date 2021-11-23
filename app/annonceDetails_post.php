<?php
require "includes/connect.php";

// recupération de l'id correspondante à l'annonce disponible dans l'URL de la page, afin que le message de réservation s'ajoute à l'annonce correspondante
$getId = explode('=', $_SERVER['HTTP_REFERER'])[1];

// si l'id récupérer ne correspond pas à l'id de l'annonce, message d'erreur (ne fonctionne pas en l'état)
    if (!($getId == $id)) {
    header('Location:annonceDetails.php?id=$getId&error=malformedInput');
    exit();}


    if(empty($_POST['reservation_message']))
    {
    header('Location:annonceDetails.php?id=$getId&error=missingInput');
        exit();

    } else {
    $reservation_message = htmlspecialchars(trim($_POST['reservation_message']));


try {
$insertAdvert = 'INSERT INTO advert (reservation_message) VALUES(:reservation_message)';
$reqInsertAdvert = $connexion->prepare($insertAdvert);
$reqInsertAdvert->bindValue(':reservation_message', $reservation_message, PDO::PARAM_STR);

if ($reqInsertAdvert->execute()) {
header('Location:annonceDetails.php?success=reservedAnnonce');
exit();
}else{
echo 'ok';
header('Location:annonceDetails.php?error=unknownError');
}
} catch (PDOException $e) {
echo $e->getMessage();
}}
?>