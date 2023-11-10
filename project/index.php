<?php
define('BASE_URL', 'http://localhost/chal/project/');
require_once('config/database.php'); // Adjust the path if required
require_once('./app/controllers/BookController.php');

$bookController = new BookController($db);

$requestedPage = $_SERVER['REQUEST_URI'];

switch ($requestedPage) {

    case '/chal/project/': //home page
        include 'app/views/home.php';
        break;

    case '/chal/project/books': //show all books
        $bookController->index();
        break;

    case '/chal/project/books/add': //add book page
        include 'app/views/books/create.php';
        break;

    case '/chal/project/books/storeBook': //add book function
        $bookController->store();
        break;

    case '/chal/project/books/modify': //add edit page
        include 'app/views/books/edit.php';
        break;

    case '/chal/project/books/updateData':
        $bookController->edit();

    case '/chal/project/books/delete':
        $bookController->delete();
        break;

    default:
        include('app/views/404.php');
        break;
}



error_reporting(E_ALL);
ini_set('display_errors', 1);
?>