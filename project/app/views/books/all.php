<?php
$book_list = $_REQUEST['books'];
?>
<!DOCTYPE html>
<html>

<head>
    <?php include('./app/views/head.php') ?>
    <title>All books</title>

<body>

    <?php include('./app/views/header.php') ?>

    <h1>List of Books📖</h1>

    <div class="grid-containerForAll">

        <?php foreach ($book_list as $book): ?>

            <div class="grid-itemForAll">
                <blockquote class="bookCard">
                    <p>
                    <h4 style="margin-top:0px;"><b>
                            <?php echo $book['title']; ?>
                        </b></h4> released in
                    <?php echo $book['publish_year']; ?>
                    </p>
                    <p><cite>–
                            <?php echo $book['author']; ?>
                        </cite>

                    </p>

                    <a href="<?php echo BASE_URL . 'books/show?bookId=' . $book['book_id']; ?>"><button>Edit</button></a>
                    
                    <form action="<?php echo BASE_URL ?>books/delete" method="POST" style="all: unset;">
                        <input hidden style="display:none" type="text" name="bookid" value="<?php echo $book['book_id']; ?>" >
                        <button type="submit">
                            delete
                        </button>
                    </form> <!--nao é certo fazer isso mas nao consegui fazer via GET-->
                </blockquote>
            </div>




        <?php endforeach; ?>
    </div>
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
</style>