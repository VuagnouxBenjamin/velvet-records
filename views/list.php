<!-- Adding a titre for the template -->
<?php $title = 'Tous les disques'; ?>

<!-- recording html after ob_start() -->
<?php ob_start(); ?>

<div class="w-10/12 mx-auto">
    <div class="mt-10 flex justify-between">
        <h1 class="text-4xl font-bold">Liste des disques (<?= $num_of_disks ?>)</h1>
        <a class="bg-blue-700 text-white px-5 py-2 rounded-lg hover:bg-blue-600"  href="index.php?action=add" role="button">Ajouter</a>
    </div>

    <div class="mt-5 flex flex-wrap justify-between">
        <?php foreach($disk_datas as $disk) : ?>

        <div class="flex mt-5">
            <img src="/public/images/<?= $disk->disc_picture ?>" alt="" class="w-80" >
            <div class="flex flex-col justify-between my-5 mx-10">
                <div class="w-60" >
                    <h2 class="text-2xl font-bold"><?= $disk->disc_title ?></h2>
                    <h3 class="text-xl"><?= $disk->artist_name ?></h3>
                    <p><span class="font-bold">Label : </span><?= $disk->disc_label ?></p>
                    <p><span class="font-bold">Year : </span><?= $disk->disc_year ?></p>
                    <p><span class="font-bold">Genre : </span><?= $disk->disc_genre ?></p>
                </div>
                <a class="bg-blue-700 text-white px-5 py-2 rounded-lg hover:bg-blue-600" href="index.php?action=detail&id=<?= $disk->disc_id ?>" role="button">Détails</a>
            </div>
        </div>

        <?php endforeach; ?>
    </div>

</div>

<!-- end of recording & declaration of $content -->
<?php $content = ob_get_clean(); ?>

<!-- requiring the right template -->
<?php require $_SERVER['DOCUMENT_ROOT'].'/views/template/main.php' ?>