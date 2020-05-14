<?php
session_start();
$db = new \PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_18acf4529517193', 'bb805e9a46b13e', '5b8a2c50');
if (isset($_GET['title'])) {
    $search =  $_GET['title'];
    $author = $_GET['author'];

    if ($author) {
        $sql = "SELECT * FROM book_reviews WHERE book_name LIKE '%$search%' AND username LIKE '%$author%';";
    } else {
        $sql = "SELECT * FROM book_reviews WHERE book_name LIKE '%$search%';";
    }

    $sth = $db->prepare($sql);
    $sth->execute();
    $row_count = $sth->rowCount();
    $size2 = strlen($search);
    $count = 0;
    if ($row_count > 0) {
        while ($row = $sth->fetch(PDO::FETCH_BOTH)) {
            echo "<div class='article-box'>";

            echo "<h3 class='book-name'>" . "Book : " . $row['book_name'] . "</h3>";
            echo "<p class='book-author'>" . "Author : " . $row['book_author'] . "</p>";
            echo "<p class='rev'> - Review - </p>";
            echo "<p class='review'>"  . $row['book_review'] . "</p>";
            echo "<p class='review'>" . 'username: ' . $row['username'] . "</p>";
            echo "</div>";
        }
    } else {
        echo "<div>";
        echo "<h3 class='sorry'>Din pacate nu exista cartea la noi in evidenta</h3>";
        echo "<h3 class='sorry'>Va propunem o lista de carti pe care e posibil sa le gasiti interesante</h3>";
        echo "</div>";
        $sql = "SELECT * FROM book_reviews order by book_id desc";
        $sth1 = $db->prepare($sql);
        $sth1->execute();
        $i = 6;
        while ($row = $sth1->fetch(PDO::FETCH_BOTH)) {
            echo "<div class='article-box'>";
            echo "<h3 class='book-name'>" . "Book : " . $row['book_name'] . "</h3>";
            echo "<p class='book-author'>" . "Author : " . $row['book_author'] . "</p>";
            echo "<p class='rev'> - Review - </p>";
            echo "<p class='review'>"  . $row['book_review'] . "</p>";
            echo "</div>";
            $i = $i - 1;
            if ($i == 0) {
                break;
            }
        }
    }
}
