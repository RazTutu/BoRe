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


$db = new \PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_18acf4529517193', 'bb805e9a46b13e', '5b8a2c50');
$option = $_SESSION['option'];?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" type="text/css" href="review-style.css">
    <link rel="stylesheet" href="chat_style.css" />
    <title>Group</title>
</head>

<body>
    <?php include 'header.php'?>

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
        echo "<p class='review'>"  . substr($row['book_review'], 0, 200) . "<span class='dots'>...</span><span class='more'>" . substr($row['book_review'], 201, $len) . "</span>" . "</p>";
    } else {
        echo "<p class='review'>"  . substr($row['book_review'], 0, 200) . "<span class='dots'></span><span class='more'>" . substr($row['book_review'], 201, $len) . "</span>" . "</p>";
    }
    echo "<button  class='myBtn'>Read more</button>";
    echo "<p class='review'>" . 'username: ' . $row['username'] . "</p>";
    echo "</div>";
}
}
else{
echo "<div>";
echo "<h3 class='sorry'>Nu exista review-uri pentru carti in acest grup.</h3>";
echo "<h3 class='sorry'>Adauga un review si revino mai tarziu</h3>";
echo "</div>";
}

echo '</div>';

include ('chat.php');
?>

</body>