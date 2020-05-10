<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="review-style.css">
    <title>Document</title>
</head>

<body>
    <form action "search.php" method="POST">
        <input type="text" name="search" placeholder="search">
        <button type="submit" name="submint-search"></button>
    </form>
    <h1>Front Page</h1>
    <div class="article-container">
        <?php
        $db = new \PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_18acf4529517193', 'bb805e9a46b13e', '5b8a2c50');
        $sql = "SELECT book_review FROM book_reviews;";
        //$results = mysqli_query($db, $sql);
        // $queryResults = mysqli_num_rows($results);
        $sth = $db->prepare($sql);

        $sth->execute();

        if ($queryResults > 0) {
            while($row = $sth->fetch(PDO::FETCH_BOTH)){
                echo "<div class='search-content'>";
                    echo "<h3>".$row['book_name']."</h3>";
                    echo "<p>".$row['book_author']."</p>";
                    echo "<p>".$row['book_review']."</p>";
                    //echo "<p>".$row['book_review']."</p>"; //with this line you can get even the book review
                    //but don't show it because it may be too long.
                echo "</div>";
        }


        ?>

    </div>
</body>

</html>