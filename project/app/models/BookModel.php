<?php 

class BookModel {
    private function __construct($database) {
        $this->db = $database;
    }

    public function getBooks() {
        $query = "SELECT * FROM book";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getBook($bookId) {
        $query = "SELECT * FROM book WHERE book_id = :book_id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':book_id' => $bookId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function addNewBook($title, $author, $publishYear){
        $query = "INSERT INTO books (title, author, publish_year) values (:title, :author, :publish_year)";
        $stmt = $this->db->prepare($query);
        $stmt->execute([
            ':title' => $title,
            ':author' => $author,
            ':publish_year' => $publishYear
            ]);
        return $this->db->lastInsertId();
    }

    public function updateBook($bookId, $title, $author, $publishYear){
        $query = "UPDATE book SET title = :title, author = :author, publish_year = :publish_year WHERE book_id = :book_id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':book_id' => $bookId,
            ':title' => $title,
            ':author' => $author,
            ':publish_year' => $publishYear
        ]);
    }

    public function deleteBook($bookId){
        $query = "DELETE FROM book WHERE book_id = :book_id";
        $stmt = $this->db->prepare($query);
        return $stmt-> execute([
            ':book_id' => $bookId
        ]);
    }

}

?>