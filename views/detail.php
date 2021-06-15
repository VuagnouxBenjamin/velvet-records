<!-- Adding a titre for the template -->
<?php $title = $disk_data->disc_title; ?>

<!-- recording html after ob_start() -->
<?php ob_start(); ?>

<div class="">
    <h1 class="">Details</h1>
    <div class="row">
        <div class="d-flex flex-column col-12 col-md-6 mt-2">
            <label for="title" class="form-label">Title</label>
            <input type="text" name="title" id="title" class="form-control" value="<?= $disk_data->disc_title ?>" disabled>
        </div>
        <div class="d-flex flex-column col-12 col-md-6 mt-2">
            <label for="Artist" class="form-label">Artist</label>
            <input type="text" name="Artist" id="Artist" class="form-control" value="<?= $disk_data->artist_name ?>" disabled>
        </div>
    </div>
    <div class="row">
        <div class="d-flex flex-column col-12 col-md-6 mt-2">
            <label for="Year" class="form-label">Year</label>
            <input type="text" name="Year" id="Year" class="form-control" value="<?= $disk_data->disc_year ?>" disabled>
        </div>
        <div class="d-flex flex-column col-12 col-md-6 mt-2">
            <label for="Genre" class="form-label">Genre</label>
            <input type="text" name="Genre" id="Genre" class="form-control" value="<?= $disk_data->disc_genre ?>" disabled>
        </div>
    </div>
    <div class="row">
        <div class="d-flex flex-column col-12 col-md-6 mt-2">
            <label for="Label" class="form-label">Label</label>
            <input type="text" name="Label" id="Label" class="form-control" value="<?= $disk_data->disc_label ?>" disabled>
        </div>
        <div class="d-flex flex-column col-12 col-md-6 mt-2">
            <label for="Price" class="form-label">Price</label>
            <input type="text" name="Price" id="Price" class="form-control" value="<?= $disk_data->disc_price ?> €" disabled>
        </div>
    </div>

    <p class="my-1 form-label">Picture</p>
    <div class="mt-4">
        <img src="/public/images/<?= $disk_data->disc_picture ?>" alt="" class="col-10 col-sm-8 col-lg-4">
    </div>

    <div class="mt-2">
        <a class="btn btn-primary"  href="index.php?action=update&id=<?= $disk_data->disc_id ?>" role="button">Modifier</a>
        <a class="btn btn-secondary"  href="index.php?action=remove&id=<?= $disk_data->disc_id ?>" role="button">Supprimer</a>
        <a class="btn btn-danger"  href="index.php?action=liste" role="button">Retour</a>
    </div>

</div>


<!-- end of recording & declaration of $content -->
<?php $content = ob_get_clean(); ?>

<!-- requiring the right template -->
<?php require $_SERVER['DOCUMENT_ROOT'].'/views/template/main.php' ?>