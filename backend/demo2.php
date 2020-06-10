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
  <link rel="stylesheet" href="chat_style.css" />
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

  $_SESSION['option'] = $option;
  $_SESSION['username'] = $username;

  $row_count_user = $sth->rowCount();


  if ($option != FALSE) {
    echo '<script>window.location.href="group.php";</script>';
  } else {
    echo '<div class="second-part-with-classes">';
    echo ' <div class="contanter-for-text">';
    echo ' <div class="message-welcome">';
    echo  '<h1 class="question-about-classes">Not a part of any group?</h1>';
    echo '</div>';
    echo '<div class="answer-about-classes">';
    echo '<p class="answer">';
    echo ' Join an online class, here you will be in contact with other 
    reading enthusiasts interested in the same kinds of books. You will 
    be able to debate with them on different topics, share your opinion about 
    a novel you love or recommend books to other people. Stay connected with the world 
    of written thought and talk with interesting people.';
    echo ' </p>';
    echo ' </div>';
    echo '<div class="join-class">';
    echo '<form method="post" class="join-class">';
    echo   '<div class="col-for-subscribe">';
    echo '<input type="text" name="join" placeholder="Write the name of the group" required />';
    echo '<input type="submit" value="Join the group" />';
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
    echo "<h1 class='question-about-classes'>Didn't create any group?</h1>";
    echo '</div>';
    echo '<div class="answer-about-classes">';
    echo '<p class="answer">';
    echo 'Create an online class, here you can share with people who have a common interest, discuss books and more.';
    echo '</p>';
    echo '</div>';
    echo '<div class="create-class">';
    echo '<form method="post" class="create-class">';
    echo '<div class="col-for-subscribe">';
    echo '<input type="text" name="create" placeholder="Write the name of the group" required />';
    echo '<input type="submit" value="Create the group" />';
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
      echo 'Already part of a class?';
      echo '</h1>';
      echo '<p class="is-part-text">';
      echo 'Choose a group in order to communicate with the others.';
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