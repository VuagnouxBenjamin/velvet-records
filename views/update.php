<!-- Adding a titre for the template -->
<?php $title = 'Modification' ?>

<!-- Form validation using array -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/models/forms/update.script.php'?>

<!-- recording html after ob_start() -->
<?php ob_start(); ?>

<div class="">
    <h1 class="">Details</h1>
    <form id="form" action="#" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="d-flex flex-column col-12 col-md-6">
                <label for="title" class="form-label" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="<?= $_POST['title'] ?? $disk_data->disc_title ?>">
                <p id="err_title" class="text-danger"><?= $error['title'] ?? ''?></p>
            </div>

            <div class="d-flex flex-column col-12 col-md-6">
                <label for="artist" class="form-label">Artiste</label>
                <select name="artist_id" id="artist" class="form-select">
                    <?php foreach ($artists as $artist) : ?>
                        <option value="<?= $artist->artist_id ?>" <?= $artist->artist_id == $disk_data->artist_id ? 'selected' : '' ?>><?= $artist->artist_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="d-flex flex-column col-12 col-md-6">
                <label for="year" class="form-label">Year</label>
                <input type="text" name="year" id="year" class="form-control" value="<?= $_POST['year'] ?? $disk_data->disc_year ?>">
                <p id="err_year" class="text-danger"><?= $error['year'] ?? ''?></p>
            </div>
            <div class="d-flex flex-column col-12 col-md-6">
                <label for="genre" class="form-label">Genre</label>
                <input type="text" name="genre" id="genre" class="form-control" value="<?= $_POST['genre'] ?? $disk_data->disc_genre ?>">
                <p id="err_genre" class="text-danger"><?= $error['genre'] ?? ''?></p>
            </div>
        </div>
        <div class="row">
            <div class="d-flex flex-column col-12 col-md-6">
                <label for="label" class="form-label">Label</label>
                <input type="text" name="label" id="label" class="form-control" value="<?= $_POST['label'] ?? $disk_data->disc_label ?>">
                <p id="err_label" class="text-danger"><?= $error['label'] ?? ''?></p>
            </div>
            <div class="d-flex flex-column col-12 col-md-6">
                <label for="price" class="form-label">Price</label>
                <input type="text" name="price" id="price" class="form-control" value="<?= $_POST['price'] ?? $disk_data->disc_price ?>">
                <p id="err_price" class="text-danger"><?= $error['price'] ?? ''?></p>
            </div>
        </div>
        <input type="hidden" name="id" value="<?= $disk_data->disc_id ?>">

    <p class="form-label">Picture</p>
    <input type="file" name="disk_image" class="form-control">
    <p class="text-danger"><?= $error['disk_image'] ?? '' ?></p>

    <div class="mt-4">
        <img src="/public/images/<?= $disk_data->disc_picture ?>" alt="" class="col-10 col-sm-8 col-lg-4">
    </div>

    

    <div class="mt-4">
        <input type="submit" class="btn btn-primary" name="submit" value="submit">
        <a class="btn btn-secondary"
            href="index.php?action=detail&id=<?= $disk_data->disc_id ?>" role="button">Retour</a>
        <a class="btn btn-secondary"
                href="index.php?action=liste" role="button">Liste</a>
    </div>
    </form>
</div>

<!--<script src="../public/js/validateForm.js"></script>-->

<!-- end of recording & declaration of $content -->
<?php $content = ob_get_clean(); ?>

<!-- requiring the right template -->
<?php require $_SERVER['DOCUMENT_ROOT'].'/views/template/main.php' ?>