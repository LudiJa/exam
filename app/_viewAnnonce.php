<!-- récupération dans la BDD des données de la table advert. Les annonces seront affichées par ordre décroissant d'id (auto-incrémenté, donc les annonces les plus récentes ont les id les plus élevées) grâce à ORDER BY-->

<?php
$viewAnnonces = "SELECT * from advert ORDER BY id DESC";
$reqViewAnnonces = $connexion->query($viewAnnonces);
$annonces = $reqViewAnnonces->fetchAll();
?>