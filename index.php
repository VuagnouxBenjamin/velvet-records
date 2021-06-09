<?php 
require 'controllers/liste.php'; 


// Metadata management 
if (!isset($title)) 
{
    $title = 'Velvet Records';
} else {
    $title = $title ;
}

// Default index 
if (!isset($_GET['action']))
{
    $_GET['action'] = "liste"; 
}

// router 
if ($_GET['action'] === "liste") {
    getListe(); 
} 
elseif ($_GET['action'] === "detail" and isset($_GET['id']))
{
    getDisk($_GET['id']);
}
elseif ($_GET['action'] === "remove" and isset($_GET['id']))
{
    rmvDisk($_GET['id']);
}
elseif ($_GET['action'] === "update" and isset($_GET['id']))
{
    updateDisk($_GET['id']);
}
elseif ($_GET['action'] === "add")
{
    getAddForm();
}
else 
{
    header("HTTP/1.0 404 Not Found");
}

