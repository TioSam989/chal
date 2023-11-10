<?php
// $book_list = $_REQUEST['books'];
?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once('./app/views/head.php')?>
    <title>Add New book</title>
</head>

<body>

    <?php include('./app/views/header.php') ?>

    <h1>Add New Book📖</h1>

    <form action="<?php echo BASE_URL;?>books/storeBook" method="POST">
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
        <button type="submit">Add+</button>
    </form>

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