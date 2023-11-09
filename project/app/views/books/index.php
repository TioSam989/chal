<?php
require_once('../../../config/database.php')
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Main page</title>
</head>

<body>
    <?php
    $books = $db->query("SELECT * FROM book ORDER BY book_id DESC");

    if ($books->rowCount() <= 0) {
        ?>
        <ul>
            <li>
                <h2>empty</h2>
            </li>
        </ul>
        <ul>
        <?
    }

    while ($book = $books->fetch(PDO::FETCH_ASSOC)) {
        ?>

            <li>
                <h2>Title: <?php  $book['title']?></h2><br>
                <h2>Author: <?php  $book['author']?></h2><br>
                <h2>Published: <?php $book['publish_year']?></h2>
            </li>
            <?php
    }
    ?>
    </ul>
</body>

</html>