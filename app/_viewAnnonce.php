<?php
$viewAnnonces = "SELECT * from advert ORDER BY id DESC";
$reqViewAnnonces = $connexion->query($viewAnnonces);
$annonces = $reqViewAnnonces->fetchAll();
?>