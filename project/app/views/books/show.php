<?php
require_once('./config/database.php');
require_once('./app/models/BookModel.php');

if(!isset($_POST['book_id'])){
    header('Location: /chal/project/');
}

$bookModel = new BookModel($db);
$crrBook = $bookModel->getBook($_POST['book_id']);


?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once('./app/views/head.php')?>
    <title>Edit A book</title>
</head>

<body>

    <?php include('./app/views/header.php') ?>

    <h1></h1>

        <p><strong>Add book info properly</strong></p>

        <p>
            <label>Title</label>
            <input type="text" name="title" id="title" required>
        </p>

        <p>
            <label>Author</label>
            <input type="text" name="author" id="author" maxlength="80" required>
        </p>

        <p>
            <label>Release year</label>
            <input type="number" min="1000" max="2025" name="publishYear" required>
        </p>

    <?php include('./app/views/footer.php') ?>

</body>

</html>

<style>
    .grid-containerForAll {
        display: grid;
        grid-template-columns: repeat(3, auto);
        /* Define três colunas de largura automática */
    }

    .grid-itemForAll {
        margin: 0 10px;
        /* Define uma margem horizontal entre os itens */
    }
    .mainColor {
        color: aqua
    }
</style>