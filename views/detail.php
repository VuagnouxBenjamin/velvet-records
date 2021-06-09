<!-- Adding a titre for the template -->
<?php $title = $disk_data->disc_title; ?>

<!-- recording html after ob_start() -->
<?php ob_start(); ?>

<div class="w-10/12 mx-auto">
    <h1 class="text-3xl font-bold">Details</h1>
    <div class="flex my-2">
        <div class="flex flex-col w-80">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" class="border" value="<?= $disk_data->disc_title ?>" disabled>
        </div>
        <div class="flex flex-col w-80 ml-10">
            <label for="Artist">Artist</label>
            <input type="text" name="Artist" id="Artist" class="border" value="<?= $disk_data->artist_name ?>" disabled>
        </div>
    </div>
    <div class="flex my-2">
        <div class="flex flex-col w-80">
            <label for="Year">Year</label>
            <input type="text" name="Year" id="Year" class="border" value="<?= $disk_data->disc_year ?>" disabled>
        </div>
        <div class="flex flex-col w-80 ml-10">
            <label for="Genre">Genre</label>
            <input type="text" name="Genre" id="Genre" class="border" value="<?= $disk_data->disc_genre ?>" disabled>
        </div>
    </div>
    <div class="flex my-2">
        <div class="flex flex-col w-80">
            <label for="Label">Label</label>
            <input type="text" name="Label" id="Label" class="border" value="<?= $disk_data->disc_label ?>" disabled>
        </div>
        <div class="flex flex-col w-80 ml-10">
            <label for="Price">Price</label>
            <input type="text" name="Price" id="Price" class="border" value="<?= $disk_data->disc_price ?> €" disabled>
        </div>
    </div>

    <p>Picture</p>
    <img src="/public/images/<?= $disk_data->disc_picture ?>" alt="" class="w-96">

    <div class="flex mt-5">
        <a class="bg-blue-700 text-white px-5 py-2 rounded-lg hover:bg-blue-600 mr-2"  href="index.php?action=update&id=<?= $disk_data->disc_id ?>" role="button">Modifier</a>
        <a class="bg-blue-700 text-white px-5 py-2 rounded-lg hover:bg-blue-600 mr-2"  href="index.php?action=remove&id=<?= $disk_data->disc_id ?>" role="button">Supprimer</a>
        <a class="bg-blue-700 text-white px-5 py-2 rounded-lg hover:bg-blue-600 mr-2"  href="index.php?action=liste" role="button">Retour</a>
    </div>

</div>


<!-- end of recording & declaration of $content -->
<?php $content = ob_get_clean(); ?>

<!-- requiring the right template -->
<?php require $_SERVER['DOCUMENT_ROOT'].'/views/template/main.php' ?>