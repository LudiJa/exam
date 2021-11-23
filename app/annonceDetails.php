<?php
include_once "_navbar.php";
include "_annonceDetails.php";

// protocole permettant de prévenir des erreurs eventuelles lors du remplissage du formulaire 
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

// recherche de l'erreur de l'envoie du message reservation_message
echo $id
?>

<section class="text-center p-2 m-5">
    <div class="card w-75 mx-auto">
        <div class="col-md-12">
            <div class="card-header">
                <?php
    if ($annonce['reservation_message'] == NULL ) { ?>
                <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; left: 0.5rem">
                    <?php echo $annonce['type']; }else{ ?>
                    <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; left: 0.5rem">
                        Reservé
                        <?php } ?>
                    </div>
                </div>

                <h2 class="card-title text-center mt-5 mb-"><?php echo strtoupper($annonce['title']);?></h2>
                <h4>Situé à <?php echo $annonce['city']?>, <?php echo $annonce['postal_code']?></h4>
                <h3>Prix : <?php echo $annonce['price']; ?>€.</h3>

            </div>

            <div class="card-body p-3 border-top-4 ">
                <p class="fw-bold">Description :</p>
                <p><?php echo $annonce['description']; ?></p>

            </div>

            <!-- formulaire de communication si bien non reservé, sinon message de notification-->
            <div class="card-footer p-4 pt-1 border-top-1">
                <?php
    if ($annonce['reservation_message'] == NULL ) { ?>
                <form action="annonceDetails_post.php" method="POST">

                    <?php echo $alert ? "<div class='alert alert-{$type} mt-2'>{$message}</div>" : ''; ?>

                    <div class="mb-3">
                        <label for="reservation_message" class="form-label mt-2 p-2">
                            <h5>Vous souhaitez réserver ? Contactez le
                                propriétaire:</h5>

                        </label>
                        <textarea class="form-control" name="reservation_message" rows="3"></textarea>
                    </div>
                    <div class="mt-4 mb-2">
                        <input type="submit" value="Je réserve" name="submit_annonce"
                            class="btn btn-outline-dark mt-auto" />
                    </div>
                </form>
                <?php
                }else{ ?>
                <div>
                    Reservé </div>
                <?php } ?>


            </div>
        </div>
    </div>
    </div><a href="annonce.php" class="btn btn-outline-dark mt-4 col-5">Revenir aux annonces</a>
</section>

<?php
include_once "_footer.php";
?>