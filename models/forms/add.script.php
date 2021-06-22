<?php 
require_once $_SERVER['DOCUMENT_ROOT'] . '/models/DiskManager.php';
use models\DiskManager; 
require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/FileManager.php';
use controllers\FileManager;
require_once $_SERVER['DOCUMENT_ROOT'] . '/controllers/FormValidator.php';
use controllers\FormValidator;

$image_manager = new FileManager();
$disk_manager = new DiskManager();
$form_validator = new FormValidator();

// server side form validation

// Form error handling
if (isset($_POST['submit']) == 'submit') {
    $error = $form_validator->validate($_POST, array(
        'title' => '/^[\d\w\s,éèà]+$/',
        'genre' => '/^[\d\w\s,éèà]+$/',
        'year' => '/^\d{1,4}$/',
        'label' => '/^[\d\w\s,éèà]+$/',
        'price' => '/^\d{1,6}(\.\d{1,2})*$/'
    ));
}

// image management
if (isset($_POST['submit'])) {

    if ($_FILES['disk_image']['size'] > 0 && empty($error))
    {
        $is_valid_img = $image_manager->check_img('disk_image', $_POST['title']);

        if($is_valid_img)
        {
            // send data in db.
            $disk_manager->addDisk(
                $_POST['title'],
                $_POST['year'],
                $_POST['label'],
                $_POST['genre'],
                $_POST['price'],
                $_POST['artist_id'],
                $is_valid_img);

            header('Location: index.php?1=1');

        }
        else
        {
            $error['disk_image'] = 'Format d\'image interdit';
        }
    }
    elseif (empty($error))
    {
        $disk_manager->addDisk(
            $_POST['title'],
            $_POST['year'],
            $_POST['label'],
            $_POST['genre'],
            $_POST['price'],
            $_POST['artist_id']);

        header('Location: index.php?1=2');
    }
}
