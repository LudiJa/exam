<?php

$id = $_GET['id'];

$viewAnnonce = "SELECT * from advert WHERE id = :id";
$reqViewAnnonce = $connexion->prepare($viewAnnonce);
$reqViewAnnonce->bindValue(':id',$id);
$reqViewAnnonce->execute();
$annonce = $reqViewAnnonce->fetch();
if(empty($annonce)){
    header('Location:index.php?error=noId');
        exit();
}

?>