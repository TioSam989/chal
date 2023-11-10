<?php

class BookModel
{

    private $db;
    public function __construct($database)
    {
        $this->db = $database;
    }

    public function getLastAddedBook()
    {
        $query = "SELECT * FROM book ORDER BY book_id DESC LIMIT 1";
        $stmt = $this->db->query($query);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getBooks()
    {
        $query = "SELECT * FROM book";
        $stmt = $this->db->query($query);
        $books = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $books;
        
    }

    public function getBook($bookId)
    {
        $query = "SELECT * FROM book WHERE book_id = :book_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':book_id' => $bookId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addNewBook($title, $author, $publishYear)
    {
        $query = "INSERT INTO books (title, author, publish_year) values (:title, :author, :publish_year)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':title' => $title,
            ':author' => $author,
            ':publish_year' => $publishYear
        ]);
        return $this->db->lastInsertId();
    }

    public function updateBook($bookId, $title, $author, $publishYear)
    {
        $query = "UPDATE book SET title = :title, author = :author, publish_year = :publish_year WHERE book_id = :book_id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':book_id' => $bookId,
            ':title' => $title,
            ':author' => $author,
            ':publish_year' => $publishYear
        ]);
    }

    public function deleteBook($bookId)
    {
        $query = "DELETE FROM book WHERE book_id = :book_id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':book_id' => $bookId
        ]);
    }

}

?>