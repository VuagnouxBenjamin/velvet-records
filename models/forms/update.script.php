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

if (isset($_POST['submit']) == 'submit')
{
    // image management
    // if an image is uploaded
    if ($_FILES['disk_image']['size'] > 0)
    {
        $is_valid_image = $image_manager->check_img('disk_image', $_POST['title']);

        // if image is valid
        if($is_valid_image)
        {
            // update image name in db.
            $disk_manager->updateImage($_POST['id'], $is_valid_image);
        }
        else
        {
            $error['disk_image'] = 'type de fichier non autorisé';
        }
    }


    $disk_manager->updateDisk(
        $_POST['id'],
        $_POST['title'],
        $_POST['year'],
        $_POST['label'],
        $_POST['genre'],
        $_POST['price'],
        $_POST['artist_id']);

    if (!$error)
    {
        header('Location: index.php');
    }
}
//else
//{
//    header('Location: index.php?action=update&id='.$_POST['id'].'&fatal=true');
//}