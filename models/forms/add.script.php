<?php 
require '../DiskManager.php';
use models\DiskManager; 
require '../../controllers/imageManager.class.php'; 
use controllers\ImageManager; 

$image_manager = new ImageManager(); 
$disk_manager = new DiskManager(); 

// server side form validation
if (strlen($_POST['title']) < 255 and strlen($_POST['Year']) < 255 and strlen($_POST['Genre']) < 255 and strlen($_POST['Label']) < 255 and preg_match('/^[0-9]{1,6}(\.[0-9]{1,2})?$/', $_POST['Price']) and preg_match('/^[0-9]+$/', $_POST['Artist_id'])) 
{
    // image management
    if ($_FILES['disk_image']['size'] > 0)
    {
        $name = $image_manager->check_img('disk_image', $_POST['title']); 
    
        if($name)
        {
            // update image name in db.
            $disk_manager->addDisk($_POST['title'], $_POST['Year'], $_POST['Label'], $_POST['Genre'], $_POST['Price'], $_POST['Artist_id'], $name); 
    
            header('Location: http://velvet-record.dvp/index.php');
            
        }
        else 
        {
            header('Location: http://velvet-record.dvp/index.php?action=add&err=true');
            $error = true;
        }
    }
    else 
    {
        $disk_manager->addDisk($_POST['title'], $_POST['Year'], $_POST['Label'], $_POST['Genre'], $_POST['Price'], $_POST['Artist_id']); 
    
        header('Location: http://velvet-record.dvp/index.php');
    }
}
else 
{
        header('Location: http://velvet-record.dvp/index.php');
}
