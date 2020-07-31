<?php
session_start();


if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You have to log in first";
    //header('location: ../index.php'); 
    echo $_SESSION['msg'];
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ../index.php");
}

include('database.php');
$option = $_SESSION['option']; ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" type="text/css" href="review-style.css">
    <link rel="stylesheet" href="chat_style.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <title>Group</title>
</head>

<body>
    <?php
    $username = "";
    if (!isset($_SESSION['username'])) {
        $_SESSION['msg'] = "You have to log in first";
        //header('location: ../index.php'); 
        echo $_SESSION['msg'];
    } else {
        $username = $_SESSION['username'];
    }
    ?>

    <div class="top_navbar">
        <div class="top_menu">
            <div class="logo">
                <p>
                    Welcome
                    <strong>
                        <?php echo $username; ?>
                    </strong>
                </p>
            </div>
            <div class="logout-bt">
                <form method="GET">
                    <button class="logout" name="logout">Logout here</button>
                </form>
            </div>
        </div>
    </div>
    <div class="container">
        <?php include 'sidebar.php' ?>
        <div class="content_validated">
            <div class="cont-for-responsive-page">

                <?php
                $sql = "SELECT br.book_name, br.book_author, br.book_genre, br.book_review, br.username
from book_reviews br join group_users gu on br.username = gu.username
where gu.group_name LIKE '%$option%'";

                $sth = $db->prepare($sql);
                $sth->execute();
                $row_count = $sth->rowCount();

                echo "<div class='class_layout'>";
                if ($row_count > 0) {
                    while ($row = $sth->fetch(PDO::FETCH_BOTH)) {
                        echo "<div class='article-box'>";
                        echo "<h3 class='book-name'>" . "Book : " . $row['book_name'] . "</h3>";
                        echo "<p class='book-author'>" . "Author : " . $row['book_author'] . "</p>";
                        echo "<p class='book-genre'>" . "Genre : " . $row['book_genre'] . "</p>";
                        echo "<p class='rev'> - Review - </p>";
                        $len = strlen($row['book_review']);
                        if ($len > 200) {
                            echo "<p class='review'>"  . substr($row['book_review'], 0, 200) . substr($row['book_review'], 201, $len)  . "</p>";
                        } else {
                            echo "<p class='review'>"  . substr($row['book_review'], 0, 200) . substr($row['book_review'], 201, $len) . "</p>";
                        }

                        echo "<p class='review'>" . 'username: ' . $row['username'] . "</p>";
                        echo "</div>";
                    }
                } else {
                    echo "<div>";
                    echo "<h3 class='sorry'>Nu exista review-uri pentru carti in acest grup.</h3>";
                    echo "<h3 class='sorry'>Adauga un review si revino mai tarziu</h3>";
                    echo "</div>";
                }

                echo '</div>';

                include('chat.php');
                ?>

</body>