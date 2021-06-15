<!-- Adding a titre for the template -->
<?php $title = 'Modification' ?>

<!-- recording html after ob_start() -->
<?php ob_start(); ?>

<div class="">
    <h1 class="">Details</h1>
    <form id="form" action="../models/forms/update.script.php" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="d-flex flex-column col-12 col-md-6">
                <label for="title" class="form-label" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="<?= $disk_data->disc_title ?>">
                <p id="err_title" class="text-danger"></p>
            </div>

            <div class="d-flex flex-column col-12 col-md-6">
                <label for="Artist" class="form-label">Artiste</label>
                <select name="Artist_id" id="Artist" class="form-select">
                    <?php foreach ($artists as $artist) : ?>
                        <option value="<?= $artist->artist_id ?>" <?= $artist->artist_id == $disk_data->artist_id ? 'selected' : '' ?>><?= $artist->artist_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="d-flex flex-column col-12 col-md-6">
                <label for="Year" class="form-label">Year</label>
                <input type="text" name="Year" id="Year" class="form-control" value="<?= $disk_data->disc_year ?>">
                <p id="err_year" class="text-danger"></p>
            </div>
            <div class="d-flex flex-column col-12 col-md-6">
                <label for="Genre" class="form-label">Genre</label>
                <input type="text" name="Genre" id="Genre" class="form-control" value="<?= $disk_data->disc_genre ?>">
                <p id="err_genre" class="text-danger"></p>
            </div>
        </div>
        <div class="row">
            <div class="d-flex flex-column col-12 col-md-6">
                <label for="Label" class="form-label">Label</label>
                <input type="text" name="Label" id="Label" class="form-control" value="<?= $disk_data->disc_label ?>">
                <p id="err_label" class="text-danger"></p>
            </div>
            <div class="d-flex flex-column col-12 col-md-6">
                <label for="Price" class="form-label">Price</label>
                <input type="text" name="Price" id="Price" class="form-control" value="<?= $disk_data->disc_price ?>">
                <p id="err_price" class="text-danger"></p>
            </div>
        </div>
        <input type="hidden" name="id" value="<?= $disk_data->disc_id ?>">

    <p class="form-label">Picture</p>
    <input type="file" name="disk_image" class="form-control">
    <?= isset($_GET['err']) ? '<p class="text-danger">Type de fichier incorrect</p>' : '' ?>

    <div class="mt-4">
        <img src="/public/images/<?= $disk_data->disc_picture ?>" alt="" class="col-10 col-sm-8 col-lg-4">
    </div>

    

    <div class="mt-4">
        <button type="submit" class="btn btn-primary">Envoyer</button>
        <a class="btn btn-secondary"
            href="index.php?action=detail&id=<?= $disk_data->disc_id ?>" role="button">Retour</a>
        <a class="btn btn-secondary"
                href="index.php?action=liste" role="button">Liste</a>
    </div>
    </form>
</div>

<script src="../public/js/update.form.js"></script>

<!-- end of recording & declaration of $content -->
<?php $content = ob_get_clean(); ?>

<!-- requiring the right template -->
<?php require $_SERVER['DOCUMENT_ROOT'].'/views/template/main.php' ?>