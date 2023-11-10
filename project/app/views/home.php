<?php
require_once('config/database.php');
require_once('./app/models/BookModel.php');

$bookModel = new BookModel($db);
$lastBook = $bookModel->getLastAddedBook();

function getLastBook($db)
{
    $qeury = "SELECT * FROM book ORDER BY book_id DESC LIMIT 1";
    $stmt = $db->query($qeury);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include_once('head.php'); ?>
    <title>Home</title>
</head>

<body>

    <?php include('header.php'); ?>


    <section>
        <h2>Last Added Book</h2>

        <div>
            <?php

            if ($lastBook) {
                ?>

                <blockquote>
                    <p><?php echo $lastBook['title']; ?></p>
                    <p><cite>– <?php echo $lastBook['author']; ?></cite></p>
                </blockquote>


                <?php
            } else {
                echo 'No books found';
            }

            ?>
        </div>

    </section>


    <section>

        <h2>How to use</h2>
        <aside>
            <center>
                <p>
                <h3 style="margin-top: 0px">contacts</h3>
                </p>
                <p><mark>Whatsapp</mark></p>
                <p></p> <a target="_blank" href="https://wa.me/351936350279">+351 936350279</a></p>
                <p><mark>Mail</mark> <a target="_blank"
                        href="mailto:davi.neves.santos2@gmail.com">davi.neves.santos2@gmail.com</a></p>
            </center>
        </aside>
        <p>To use this one app all you need is setup the database and have fun.
            If you are having some difficulty to run the app you can contact me you any of my contacts.
            If there is missing something you can check the <a href="https://github.com/TioSam989/chal">repository</a>
            This app is justa simple CRUD app to add, remove, update and delete books and books information. I have used
            SimpleCSS but if you are having dificult to read something because of dark theme you can remove the
            <code>CSS link</code> at home.php
        </p>


    </section>


    <?php include('footer.php') ?>
</body>

</html>