<?php 
require 'controllers/Router.php';
use controllers\Router;

$router = new Router();

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
    $router->getListe();
} 
elseif ($_GET['action'] === "detail" and isset($_GET['id']))
{
    $router->getDisk($_GET['id']);
}
elseif ($_GET['action'] === "remove" and isset($_GET['id']))
{
    $router->rmvDisk($_GET['id']);
}
elseif ($_GET['action'] === "update" and isset($_GET['id']))
{
    $router->updateDisk($_GET['id']);
}
elseif ($_GET['action'] === "add")
{
    $router->getAddForm();
}
else 
{
    header("HTTP/1.0 404 Not Found");
}

