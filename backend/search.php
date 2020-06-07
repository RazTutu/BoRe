
<?php
session_start();
$db = new \PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_18acf4529517193', 'bb805e9a46b13e', '5b8a2c50');
//globals $GENRES = ['ACTION', 'HORROR'];
if (isset($_GET['title'])) {
    $search =  $_GET['title'];
    $author = $_GET['author'];
    $genre = $_GET['genre'];
    $all_data = "";
    $response = "";

    if (strncmp($author, "autor", 3) == 0) {
        if (!empty($genre)) {
            $sql = "SELECT * FROM book_reviews WHERE book_author LIKE '%$search%' AND book_genre LIKE '%$genre%'";
        } else {
            $sql = "SELECT * FROM book_reviews WHERE book_author LIKE '%$search%'; ";
        }
    } else if (strncmp($author, "genre", 3) == 0) {
        if (!empty($genre)) {
            $sql = "SELECT * FROM book_reviews WHERE book_name LIKE '%$search%'AND book_genre LIKE '%$genre%'";
        } else {
            $sql = "SELECT * FROM book_reviews WHERE book_name LIKE '%$search%'";
        }
    } else if ($author) {
        $sql = "SELECT * FROM book_reviews WHERE book_name LIKE '%$search%' AND username LIKE '%$author%';";
    } else {
        if (!empty($genre)) {
            $sql = "SELECT * FROM book_reviews WHERE book_name LIKE '%$search%' AND book_genre LIKE '%$genre%'";
        } else {
            $sql = "SELECT * FROM book_reviews WHERE book_name LIKE '%$search%'";
        }
    }
    echo $sql;
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
            echo "<p class='book-genre'>" . "Genre : " . $row['book_genre'] . "</p>";
            echo "<p class='rev'> - Review - </p>";
            $len = strlen($row['book_review']);
            if ($len > 200) {
                echo "<p class='review'>"  . substr($row['book_review'], 0, 200) . "<span class='dots'>...</span><span class='more'>" . substr($row['book_review'], 201, $len) . "</span>" . "</p>";
            } else {
                echo "<p class='review'>"  . substr($row['book_review'], 0, 200) . "<span class='dots'></span><span class='more'>" . substr($row['book_review'], 201, $len) . "</span>" . "</p>";
            }
            echo "<button  class='myBtn'>Read more</button>";
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
            $len = strlen($row['book_review']);
            echo "<p class='rev'> - Review - </p>";
            if ($len > 200) {
                echo "<p class='review'>"  . substr($row['book_review'], 0, 200) . "<span class='dots'>...</span><span class='more'>" . substr($row['book_review'], 201, $len) . "</span>" . "</p>";
            } else {
                echo "<p class='review'>"  . substr($row['book_review'], 0, 200) . "<span class='dots'></span><span class='more'>" . substr($row['book_review'], 201, $len) . "</span>" . "</p>";
            }
            echo "<button  class='myBtn'>Read more</button>";
            echo "<p class='review'>" . 'username: ' . $row['username'] . "</p>";
            echo "</div>";
            $i = $i - 1;
            if ($i == 0) {
                break;
            }
        }
    }
}
