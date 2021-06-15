<!-- Adding a titre for the template -->
<?php $title = 'Tous les disques'; ?>

<!-- recording html after ob_start() -->
<?php ob_start(); ?>

<div class="mt-2"">
    <div class="d-flex justify-content-between">
        <h1 class="">Liste des disques (<?= $num_of_disks ?>)</h1>
        <a class="btn btn-primary my-auto"  href="index.php?action=add" role="button">Ajouter</a>
    </div>

    <div class="mt-2 row">
        <?php foreach($disk_datas as $disk) : ?>

        <div class="col-12 col-sm-6 col-lg-4 my-2">
            <img src="/public/images/<?= $disk->disc_picture ?>" alt="" class="img-thumbnail w-100" >
            <div class="">
                <div class="" >
                    <h2 class="fs-3 text my-1 fw-bold"><?= $disk->disc_title ?></h2>
                    <h3 class="fs-5 text my-1 fw-bold"><?= $disk->artist_name ?></h3>
                    <p class="my-1"><span class="fw-bold">Label : </span><?= $disk->disc_label ?></p>
                    <p class="my-1"><span class="fw-bold">Year : </span><?= $disk->disc_year ?></p>
                    <p class="my-1"><span class="fw-bold">Genre : </span><?= $disk->disc_genre ?></p>
                </div>
                <div class="d-grid">
                    <a class="btn btn-primary my-auto" href="index.php?action=detail&id=<?= $disk->disc_id ?>" role="button">Détails</a>
                </div>
            </div>
        </div>

        <?php endforeach; ?>
    </div>

</div>

<!-- end of recording & declaration of $content -->
<?php $content = ob_get_clean(); ?>

<!-- requiring the right template -->
<?php require $_SERVER['DOCUMENT_ROOT'].'/views/template/main.php' ?>