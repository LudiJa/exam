<?php
include_once "_navbar.php";
include_once "_header.php";
include "_viewAnnonce.php";

?>

<section class="py-5">
    <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
            <?php
            $i=0;
        foreach($annonces as $annonces){
            if (++$i == 16) break;
        ?>
            <div class="col-md-4">
                <div class="card h-100">
                    <div class="card-header">
                        <?php
    if ($annonces['reservation_message'] == NULL ) { ?>
                        <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; left: 0.5rem">
                            <?php echo $annonces['type']; }else{ ?>
                            <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; left: 0.5rem">
                                Reservé
                                <?php } ?>
                            </div>
                            <div class="badge bg-warning text-black position-absolute"
                                style="top: 0.5rem; right: 0.5rem">
                                <?php echo $annonces['price']; ?> €
                            </div>
                            <div class="text-center mt-5 mb-3">
                                <h5 class="fw-bolder"><?php echo strtoupper($annonces['title']); ?></h5>
                            </div>
                        </div>
                        <div class="card-body p-3 ">
                            <span class="text-muted"><?php echo $annonces['city']; ?>,
                                <?php echo $annonces['postal_code']; ?></span>
                        </div>
                        <div class="text-center">
                            <p><?php echo $annonces['description']; ?></p>

                        </div>

                        <div class="card-footer p-4 pt-1 border-top-0 bg-transparent">
                            <div class="text-center"><a class="btn btn-outline-dark mt-auto"
                                    href="annonceDetails.php?id=<?php echo $annonces['id']; ?>">En
                                    savoir
                                    plus</a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }?>
            </div>
        </div>
</section>

<?php
include_once "_footer.php" ?>