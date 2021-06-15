<!-- Adding a titre for the template -->
<?php $title = 'Ajouter un disque'; ?>

<!-- recording html after ob_start() -->
<?php ob_start(); ?>

<div class="w-10/12 mx-auto">
    <h1 class="text-3xl font-bold">Ajouter un disque</h1>
    <form id="form" action="../models/forms/add.script.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="d-flex flex-column col-12 col-md-6">
                <label class="form-label" for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="" required>
                <p id="err_title" class="text-danger"></p>
            </div>
            <div class="d-flex flex-column col-12 col-md-6">
                <label for="Artist" class="form-label">Artiste</label>
                <select name="Artist_id" id="Artist" class="form-select">
                    <?php foreach ($artists as $artist) : ?>
                        <option value="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="d-flex flex-column col-12 col-md-6">
                <label class="form-label" for="Year">Year</label>
                <input type="text" name="Year" id="Year" class="form-control" value="" required>
                <p id="err_year" class="text-danger"></p>
            </div>
            <div class="d-flex flex-column col-12 col-md-6">
                <label class="form-label" for="Genre">Genre</label>
                <input type="text" name="Genre" id="Genre" class="form-control" value="" required>
                <p id="err_genre" class="text-danger"></p>
            </div>
        </div>
        <div class="row">
            <div class="d-flex flex-column col-12 col-md-6">
                <label class="form-label" for="Label">Label</label>
                <input type="text" name="Label" id="Label" class="form-control" value="" required>
                <p id="err_label" class="text-danger"></p>
            </div>
            <div class="d-flex flex-column col-12 col-md-6">
                <label class="form-label" for="Price">Price</label>
                <input type="text" name="Price" id="Price" class="form-control" value="" required>
                <p id="err_price" class="text-danger"></p>
            </div>
        </div>

        <p class="form-label">Picture</p>
        <input type="file" name="disk_image" class="form-control">
        <?= isset($_GET['err']) ? '<p class="text-danger">Type de fichier incorrect</p>' : '' ?>

        <div class="mt-4">
            <button type="submit" class="btn btn-primary">Envoyer</button>
            <a class="btn btn-secondary" href="../index.php" role="button">Retour</a>
        </div>
    </form>
</div>

<script src="../public/js/update.form.js"></script>

<!-- end of recording & declaration of $content -->
<?php $content = ob_get_clean(); ?>

<!-- requiring the right template -->
<?php require $_SERVER['DOCUMENT_ROOT'].'/views/template/main.php' ?>