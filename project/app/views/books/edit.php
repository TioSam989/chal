<?php
require_once('./config/database.php');
require_once('./app/models/BookModel.php');

$bookModel = new BookModel($db);
$crrBook = $bookModel->getBook($_POST['bookid']);

?>
<!DOCTYPE html>
<html>

<head>
    <?php include_once('./app/views/head.php')?>
    <title>Edit A book</title>
</head>

<body>

    <?php include('./app/views/header.php') ?>

    <h1>Update Book📖</h1>

        <form action="<?php echo BASE_URL;?>books/updateData" method="POST">
            <input type="text" name="bookid" value="<?php echo $crrBook['book_id'];?>" hidden style="display:none" disablded>
            <p>
                <label>Title</label>
                <input type="text" name="title" id="title" value="<?php echo $crrBook['title']; ?>" required>
            </p>
            
            <p>
                <label>Author</label>
                <input type="text" name="author" id="author" maxlength="80" value="<?php echo $crrBook['author']; ?>" required>
            </p>
            
            <p>
                <label>Release year</label>
                <input type="number" min="1000" max="2025" name="publishYear" value="<?php echo $crrBook['publish_year']; ?>" required>
            </p>
            
            <button type="submit">Update</button>
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