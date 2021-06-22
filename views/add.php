<!-- Adding a titre for the template -->
<?php $title = 'Ajouter un disque'; ?>

<!-- Form validation using array -->
<?php require $_SERVER['DOCUMENT_ROOT'] . '/models/forms/add.script.php'?>

<!-- recording html after ob_start() -->
<?php ob_start(); ?>

<div class="w-10/12 mx-auto">
    <h1 class="text-3xl font-bold">Ajouter un disque</h1>
    <form id="form" action="#" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="d-flex flex-column col-12 col-md-6">
                <label class="form-label" for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="<?= $_POST['title'] ?? ''; ?>" xx>
                <p id="err_title" class="text-danger"><?= $error['title'] ?? ''; ?></p>
            </div>
            <div class="d-flex flex-column col-12 col-md-6">
                <label for="artist" class="form-label">Artiste</label>
                <select name="artist_id" id="artist" class="form-select">
                    <?php foreach ($artists as $artist) : ?>
                        <option value="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="row">
            <div class="d-flex flex-column col-12 col-md-6">
                <label class="form-label" for="year">Year</label>
                <input type="text" name="year" id="year" class="form-control" value="<?= $_POST['year'] ?? ''; ?>" xx>
                <p id="err_year" class="text-danger"><?= $error['year'] ?? ''; ?></p>
            </div>
            <div class="d-flex flex-column col-12 col-md-6">
                <label class="form-label" for="genre">Genre</label>
                <input type="text" name="genre" id="genre" class="form-control" value="<?= $_POST['genre'] ?? '' ?>" xx>
                <p id="err_genre" class="text-danger"><?= $error['genre'] ?? ''; ?></p>
            </div>
        </div>
        <div class="row">
            <div class="d-flex flex-column col-12 col-md-6">
                <label class="form-label" for="label">Label</label>
                <input type="text" name="label" id="label" class="form-control" value="<?= $_POST['label'] ?? '';?>" xx>
                <p id="err_label" class="text-danger"><?= $error['label'] ?? ''; ?></p>
            </div>
            <div class="d-flex flex-column col-12 col-md-6">
                <label class="form-label" for="price">Price</label>
                <input type="text" name="price" id="price" class="form-control" value="<?= $_POST['price'] ?? '';?>" xx>
                <p id="err_price" class="text-danger"><?= $error['price'] ?? '';?></p>
            </div>
        </div>

        <p class="form-label">Picture</p>
        <input type="file" name="disk_image" class="form-control">
        <p class="text-danger"><?= $error['disk_image'] ?? '';?></p>

        <div class="mt-4">
            <input type="submit" class="btn btn-primary" name="submit"  value="submit">
            <a class="btn btn-secondary" href="../index.php" role="button">Retour</a>
        </div>
    </form>
</div>

<script src="public/js/validateForm.js"></script>

<!-- end of recording & declaration of $content -->
<?php $content = ob_get_clean(); ?>

<!-- requiring the right template -->
<?php require $_SERVER['DOCUMENT_ROOT'].'/views/template/main.php' ?>