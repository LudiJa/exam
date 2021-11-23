<?php
require "includes/config.php";
require "includes/connect.php";

$getId = explode('=', $_SERVER['HTTP_REFERER'])[1];

echo '<pre>';
    print_r($_POST);
    echo '</pre>';

    if (!($getId == $id)) {
    header("Location:annonceDetails.php?id=$getId&error=malformedInput");
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
$reqInsertAdvert->bindValue(':reservation_message', $reservation_message);

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