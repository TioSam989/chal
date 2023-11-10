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

    public function store(){ //save new book obj
        $title = $_POST['title'];
        $author = $_POST['author'];
        $publishYear = $_POST['publishYear'];
        $this->model->addNewBook($title, $author, $publishYear);

        header("Location: /chal/project/ ");        
        exit();

    }

    public function edit(){
        $bookid = $_POST["bookid"];
        $title = $_POST['title'];
        $author = $_POST['author'];
        $publishYear = $_POST['publishYear'];
        $this->model->updateBook($bookid, $title, $author, $publishYear);


        header("Location: /chal/project/ ");        
        exit();
    }

    public function delete(){
        $bookid = $_POST['bookid'];
        $this->model->deleteBook($bookid);

        header("Location: /chal/project/ ");        
        exit();
    }

    // other methods remain unchanged
}
?>
