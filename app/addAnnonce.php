<?php
include_once "_navbar.php";

// On prépare les messages d'erreurs ou de validation du formulaire pour l'utilisateur
$alert = false;

if(isset($_GET["error"])){

    if($_GET['error'] == "missingInput"){
        $alert = true;
        $type = "danger";
        $message = "Tous les champs sont requis.";
}}

if (isset($_GET['success'])) {
    if ('addedAnnonce' == $_GET['success']) {
        $alert = true;
        $type = 'success';
        $message = 'Votre annonce a été posté !';
    }
}
?>

<!-- on fait un formulaire approprié : echo alert ? pour les messages ci-dessus ; name correspondant aux variables initiées dans addAnnonce_post pour l'ajout à la BDD ; required pour que le champs soit obligatoire. -->
<div class="w-75 mx-auto">
    <h2 class="text-center mt-4">Ajouter un bien en location ou en vente :</h2>
    <form action="addAnnonce_post.php" method="POST" class="w-50 mx-auto p-4 mt-5 shadow rounded">

        <?php echo $alert ? "<div class='alert alert-{$type} mt-2'>{$message}</div>" : ''; ?>

        <div class="col-md-12">
            <label for="title" class="form-label">Titre de l'annonce :</label>
            <input type="text" class="form-control" name="title" required>
        </div>
        <div class="col-md-12">
            <label for="description" class="form-label">Description du bien :</label>
            <textarea class="form-control" name="description" rows="3" required></textarea>
        </div>

        <div class="col-md-8">
            <label for="type" class="form-label">Type de vente :</label>
            <select class="form-select" name="type" required>
                <option value="Location">Location</option>
                <option value="Vente">Vente</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="price" class="form-label">Prix :</label>
            <input type="number" class="form-control" name="price" required>
        </div>
        <div class="col-md-8">
            <label for="city" class="form-label">Ville :</label>
            <input type="text" class="form-control" name="city" required>
        </div>
        <div class="col-md-4">
            <label for="postal_code" class="form-label">Code postal :</label>
            <input type="text" class="form-control" name="postal_code" required>
        </div>
        <div class="col-12">
        </div>
        <div class="mt-4">
            <input type="submit" value="Ajouter l'annonce" name="submit_annonce" class="btn btn-outline-dark mt-auto" />
        </div>
    </form>
</div>
<br />
<?php
include_once "_footer.php" ?>