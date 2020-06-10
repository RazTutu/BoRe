<?php
if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: ../index.php");
}
?>

<?php
session_start();
?>
<?php
$errors = array();
$errors1 = array();
$username = $_SESSION['username'];
$db = new \PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_18acf4529517193', 'bb805e9a46b13e', '5b8a2c50');
if (isset($_POST['create'])) {
  $name_for_class = $_POST['create'];
  if (empty($name_for_class)) {
    array_push($errors, "You need to write the name of the class");
  }
  if (count($errors) == 0) {
    $sth = $db->prepare("SELECT * FROM group_users where group_name LIKE BINARY '% $name_for_class%'");
    $sth->execute();
    $row_count = $sth->rowCount();
    if ($row_count == 0) {
      $sth = $db->prepare("INSERT INTO group_users(group_name, username,is_group_admin) values (' $name_for_class', '$username','1');");
      $sth->execute();
    }
  }
}
if (isset($_POST['join'])) {
  $name_class = $_POST['join'];
  if (empty($name_class)) {
    array_push($errors1, "You need to write the name of the class");
  }
  if (count($errors1) == 0) {

    $sth = $db->prepare("SELECT * FROM group_users where group_name LIKE BINARY '%$name_class%'");
    $sth->execute();
    $row_count = $sth->rowCount();

    if ($row_count > 0) {
      $sth = $db->prepare("INSERT INTO group_users(group_name, username,is_group_admin) values (' $name_class', '$username','0');");
      $sth->execute();
    }
  }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="shortcut icon" type="image/png" href="../images/favicon_browser.png" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" type="text/css" href="review-style.css">
  <title>Admin</title>
</head>

<body>
  <?php include 'header.php'  ?>
  <?php

  $is_part_of_any_class;
  $sth = $db->prepare("SELECT * FROM group_users where username LIKE BINARY '%$username%'");
  $sth->execute();
  $option = isset($_POST['taskOption']) ? $_POST['taskOption'] : FALSE;
  $row_count_user = $sth->rowCount();


  if($option != FALSE){
      $sql = "SELECT br.book_name, br.book_author, br.book_genre, br.book_review, br.username
      from book_reviews br join group_users gu on br.username = gu.username
      where gu.group_name LIKE '%$option%'";
      
      $sth = $db->prepare($sql);
      $sth->execute();
      $row_count = $sth->rowCount();
      

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
        echo "<h3 class='sorry'>Adauga un review si revino mai tarziu.</h3>";
        echo "</div>";
      }
  }
  else{
    echo '<div class="second-part-with-classes">';
  echo ' <div class="contanter-for-text">';
  echo ' <div class="message-welcome">';
  echo  '<h1 class="question-about-classes">Nu esti parte din nicio clasa?</h1>';
  echo '</div>';
  echo '<div class="answer-about-classes">';
  echo '<p class="answer">';
  echo ' Alatura-te unei clase online, aici vei putea fi in contact cu alti pasionati de lectura care sunt interesati in aceleasi genuri de carti. Vei putea
            dezbate alaturi de ei pe diferite teme, schimba parerei legate de carti sau chiar recomanda carti altor persoane.
            Ramai conectat cu lume cartilor si socializeaza cu persoane interesante.';
  echo ' </p>';
  echo ' </div>';
  echo '<div class="join-class">';
  echo '<form method="post" class="join-class">';
  echo   '<div class="col-for-subscribe">';
  echo '<input type="text" name="join" placeholder="Scie numele grupului" required />';
  echo '<input type="submit" value="Alatura-te grupului" />';
  echo '</div>';
  echo '</form>';
  echo '</div>';

  echo '</div>';
  echo '<div class="place-holder-img-group">';
  echo '<img src="../images/group.jpg" alt="image with a group" class="photo-for-first-part" height="500" width="600" />';
  echo  '</div>';

  echo '</div>';
  echo '<div class="third-part-with-classes">';
  echo '<div class="contanter-for-text">';
  echo '<div class="message-welcome2">';
  echo '<h1 class="question-about-classes">Nu ai creat nicio clasa?</h1>';
  echo '</div>';
  echo '<div class="answer-about-classes">';
  echo '<p class="answer">';
  echo 'Creaza o clasa online, aici vei putea socializa cu persoane ce au interes comun, discuta despre carti si nu numai.';
  echo '</p>';
  echo '</div>';
  echo '<div class="create-class">';
  echo '<form method="post" class="create-class">';
  echo '<div class="col-for-subscribe">';
  echo '<input type="text" name="create" placeholder="Scie numele grupului" required />';
  echo '<input type="submit" value="Creaza grupul" />';
  echo '</div>';
  echo '</form>';
  echo '</div>';

  echo '</div>';
  echo '<div class="place-holder-img-group">';
  echo '<img src="../images/r-group.jpg" alt="image with a group" class="photo-for-first-part" height="500" width="600" />';
  echo '</div>';
  echo '</div>';
  echo '<div class="first-part-opt">';
  $sql = "SELECT DISTINCT group_name from group_users  WHERE username LIKE BINARY '%$username%'";
  $sth = $db->prepare($sql);
  $sth->execute();
  $row_co = $sth->rowCount();
  if ($row_co > 0) {
    echo '<div class="secont-type-of-user-choese">';
    echo '<h1 class="is-part-of">';
    echo 'Esti parte dintr-o clasa deja?';
    echo '</h1>';
    echo '<p class="is-part-text">';
    echo 'Atunci alege clasa pentru a putea comunica cu persoanele din interiorul clasei.';
    echo '</p>';
    echo '</div>';
    echo '<div class="opt-class">';
    echo '<form method="post" class="cob">';
    echo '<select class="dropdown-for-classes" name="taskOption">';

    while ($row = $sth->fetch(PDO::FETCH_BOTH)) {
      echo "<option class='opt1'>";
      echo $row['group_name'];
      echo "</option>";
    }

    echo '</select>';
    echo ' <input type="submit" value="Submit the form"/>';
    echo '</form>';
    echo '</div>';
  }
  echo '</div>';
  }
  ?>

  </div>
  </div>

  <?php include 'footer.html' ?>