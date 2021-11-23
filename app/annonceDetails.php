<?php
include_once "_navbar.php";
include "_annonceDetails.php";

$alert = false;

if(isset($_GET["error"])){

    if($_GET['error'] == "missingInput"){
        $alert = true;
        $type = "danger";
        $message = "Tous les champs sont requis.";
}}

if (isset($_GET['success'])) {
    if ('reservedAnnonce' == $_GET['success']) {
        $alert = true;
        $type = 'success';
        $message = 'Votre demande de réservation a été envoyé !';
    }
}
?>

<div class="card m-4" style="w-75 text-center">
    <h3 class="card-title"><?php echo $annonce['type'];?> pour personnes à
        <?php echo $annonce['city']?>.</h3>
    <p class="fw-bold">Description :</p>
    <p><?php echo $annonce['description']; ?></p>
    <hr>
    <p>Prix du séjour : <?php echo $annonce['price']; ?>€.</p>
    <hr>
    <form action="annonceDetails_post.php" method="POST">

        <?php echo $alert ? "<div class='alert alert-{$type} mt-2'>{$message}</div>" : ''; ?>


        <div class="mb-3">
            <label for="reservation_message" class="form-label">Vous souhaitez réserver ? Contactez le propriétaire
                :</label>
            <textarea class="form-control" name="reservation_message" rows="3"></textarea>
        </div>
        <div class="mt-4">
            <input type="submit" value="Reserver" name="submit_annonce" class="btn btn-primary" />
        </div>
    </form>
</div>

</div><a href="annonce.php" class="btn btn-info col-5">Revenir aux annonces</a>


<?php
include_once "_footer.php";
?>