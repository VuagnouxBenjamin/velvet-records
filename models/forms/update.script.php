<?php 
require '../DiskManager.php'; 
use models\DiskManager;
require '../../controllers/imageManager.class.php'; 
use controllers\ImageManager; 

$image_manager = new ImageManager(); 
$disk_manager = new DiskManager(); 


// image management
if ($_FILES['disk_image']['size'] > 0)
{
    $name = $image_manager->check_img('disk_image', $_POST['title']); 

    if($name)
    {
        // update image name in db. 
        $disk_manager->updateImage($_POST['id'], $name);
    }
    else 
    {
        header('Location: http://velvet-record.dvp/index.php?action=update&id='.$_POST['id'].'&err=true');
        $error = true;
    }
}


$disk_manager->updateDisk($_POST['id'], $_POST['title'], $_POST['Year'], $_POST['Label'], $_POST['Genre'], $_POST['Price'], $_POST['Artist_id']);

if (!$error)
{
    header('Location: http://velvet-record.dvp/index.php');
}

//  Server side Form verification  

// TODO 

