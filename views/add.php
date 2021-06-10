<!-- Adding a titre for the template -->
<?php $title = 'Ajouter un disque'; ?>

<!-- recording html after ob_start() -->
<?php ob_start(); ?>

<div class="w-10/12 mx-auto">
    <h1 class="text-3xl font-bold">Ajouter un disque</h1>
    <form id="form" action="../models/forms/add.script.php" method="post" enctype="multipart/form-data">
        <div class="flex my-2">
            <div class="flex flex-col w-80">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="border" value="" required>
                <p id="err_title" class="text-red-500"></p>
            </div>
            <div class="flex flex-col w-80 ml-10">
                <select name="Artist_id" id="Artist">
                    <?php foreach ($artists as $artist) : ?>
                        <option value="<?= $artist->artist_id ?>"><?= $artist->artist_name ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="flex my-2">
            <div class="flex flex-col w-80">
                <label for="Year">Year</label>
                <input type="text" name="Year" id="Year" class="border" value="" required>
                <p id="err_year" class="text-red-500"></p>
            </div>
            <div class="flex flex-col w-80 ml-10">
                <label for="Genre">Genre</label>
                <input type="text" name="Genre" id="Genre" class="border" value="" required>
                <p id="err_genre" class="text-red-500"></p>
            </div>
        </div>
        <div class="flex my-2">
            <div class="flex flex-col w-80">
                <label for="Label">Label</label>
                <input type="text" name="Label" id="Label" class="border" value="" required>
                <p id="err_label" class="text-red-500"></p>
            </div>
            <div class="flex flex-col w-80 ml-10">
                <label for="Price">Price</label>
                <input type="text" name="Price" id="Price" class="border" value="" required>
                <p id="err_price" class="text-red-500"></p>
            </div>
        </div>

    <p>Picture</p>
    <input type="file" name="disk_image"> 
    <?= isset($_GET['err']) ? '<p class="text-red-500">Type de fichier incorrect</p>' : '' ?>

    <div class="flex mt-5">
    <button type="submit" class="bg-blue-700 text-white px-5 py-2 rounded-lg hover:bg-blue-600 mr-2">Envoyer</button>
        <a class="bg-gray-200 px-5 py-2 rounded-lg hover:bg-gray-100 mr-2"
            href="../index.php" role="button">Retour</a>
    </div>
    </form>
</div>

<script src="../public/js/update.form.js"></script>

<!-- end of recording & declaration of $content -->
<?php $content = ob_get_clean(); ?>

<!-- requiring the right template -->
<?php require $_SERVER['DOCUMENT_ROOT'].'/views/template/main.php' ?>