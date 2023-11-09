<?php
class BookModel {
    private $db;

    public function __construct($database) {
        $this->db = $database;
    }

    public function getAllBooks() {
        $query = "SELECT * FROM books";
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Other CRUD methods using $this->db for database operations
}
?>
