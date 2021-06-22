<?php 
require '../DiskManager.php'; 
use models\DiskManager;
require '../../controllers/FileManager.php';
use controllers\FileManager;

$image_manager = new FileManager();
$disk_manager = new DiskManager(); 


//  Server side Form verification  
if (strlen($_POST['title']) < 255 and strlen($_POST['Year']) < 255 and strlen($_POST['Genre']) < 255 and strlen($_POST['Label']) < 255 and preg_match('/^[0-9]{1,6}(\.[0-9]{1,2})?$/', $_POST['Price']) and preg_match('/^[0-9]+$/', $_POST['Artist_id'])) 
{
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
}
else 
{
    header('Location: http://velvet-record.dvp/index.php?action=update&id='.$_POST['id'].'&fatal=true');
}