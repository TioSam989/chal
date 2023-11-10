<?php
define('BASE_URL', 'http://localhost/chal/project/');
require_once('config/database.php'); // Adjust the path if required
require_once('./app/controllers/BookController.php');

$bookController = new BookController($db);

$requestedPage = $_SERVER['REQUEST_URI'];

switch ($requestedPage) {
    case '/chal/project/':
        include 'app/views/home.php';
        break;
    case '/chal/project/books':
        $bookController->index();
        break;
    case '/chal/project/books/add':
        include 'app/views/books/create.php';
        break;
    default:
        include('app/views/404.php');
        break;
}



error_reporting(E_ALL);
ini_set('display_errors', 1);
?>