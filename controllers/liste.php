<?php 
require './models/DiskManager.php'; 
use models\DiskManager;


function getListe()
{
    $disk_manager = new DiskManager();

    $disk_datas = $disk_manager->getDisk(); 
    $num_of_disks = $disk_manager->getNum(); 

    require $_SERVER['DOCUMENT_ROOT'].'/views/list.php'; 
}

function getDisk($id)
{
    $disk_manager = new DiskManager(); 
    $disk_data = $disk_manager->getDiskID($id); 

    require $_SERVER['DOCUMENT_ROOT'].'/views/detail.php';
}

function rmvDisk($id) 
{
    $disk_manager = new DiskManager(); 
    $disk_manager->removeDisk($id);

    header("Location: index.php?action=liste"); 
}

function updateDisk($id) 
{
    $disk_manager = new DiskManager();
    

    $disk_data = $disk_manager->getDiskID($id); 
    $artists = $disk_manager->getArtists();

    require $_SERVER['DOCUMENT_ROOT'].'/views/update.php';
}

function getAddForm()
{
    $disk_manager = new DiskManager(); 
    $artists = $disk_manager->getArtists();
    require $_SERVER['DOCUMENT_ROOT'].'/views/add.php';
}