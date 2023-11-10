<?php 
require_once(__DIR__ . '/../models/BookModel.php');

class BookController {
    private $model;

    public function __construct($database) {
        $this->model = new BookModel($database);
    }

    public function index(){ //to show all, base func
        $books = $this->model->getBooks();

        $_REQUEST['books'] = $books;

        // require_once  'views/books/all.php';
        include  './app/views/books/all.php';
         
    }

    public function show($bookid){ //get last book 
        $this->model->getBook($bookid);
    }

    public function store($title, $author, $publishYear){ //save new book obj
        $title = $_POST['title'];
        $author = $_POST['author'];
        $publishYear = $_POST['publishYear'];
        $this->model->addNewBook($title, $author, $publishYear);
    }

    public function edit($bookid, $title, $author, $publishYear){
        $title = $_POST['title'];
        $author = $_POST['author'];
        $publishYear = $_POST['publishYear'];
        $this->model->updateBook($bookid, $title, $author, $publishYear);
    }

    public function delete($bookid){
        $this->model->deleteBook($bookid);
    }

    // other methods remain unchanged
}
?>
