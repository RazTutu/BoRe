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
  $option = isset($_POST['taskOption']) ? $_POST['taskOption'] : false;
  $row_count_user = $sth->rowCount();
  if ($row_count_user == 0) { //daca utilizatorul nu e parte din vreun grup
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
    echo '<div class="secont-type-of-user-choese">';
    echo '<h1>';
    echo 'Esti parte dintr-o clasa deja?';
    echo '</h1>';
    echo '<p>';
    echo 'Atunci alege clasa pentru a putea comunica cu persoanele din interiorul clasei.';
    echo '</p>';
    echo '</div>';
    echo '<div class="opt-class">';
    echo '<form method="post">';
    echo '<select class="dropdown-for-classes" name="taskOption">';

    $sql = "SELECT DISTINCT group_name from group_users";
    $sth = $db->prepare($sql);
    $sth->execute();
    while ($row = $sth->fetch(PDO::FETCH_BOTH)) {
      echo "<option class='opt1'>";
      echo $row['group_name'];
      echo "</option>";
    }

    echo '</select>';
    echo '</form>';
    echo '</div>';
    echo '</div>';

    echo $option;
    echo "baaaaaaaa11111111111111111";
  } else if (
    $option or
    $row_count_user > 0
  ) {
    echo "baaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
    echo '<div class="secont-type-of-user-choese">';
    echo '<h1>';
    echo 'Bun venit inapoi!';
    echo '</h1>';
    echo '<p>';
    echo 'Alege clasa dorita pentru a avea acces la informatiile din interiorul ei.';
    echo '</p>';
    echo '</div>';
    echo '<div class="opt-class">';
    echo '<form method="post">';
    echo '<select class="dropdown-for-classes" name="taskOption">';

    $sql = "SELECT DISTINCT group_name from group_users";
    $sth = $db->prepare($sql);
    $sth->execute();
    while ($row = $sth->fetch(PDO::FETCH_BOTH)) {
      echo "<option class='opt1'>";
      echo $row['group_name'];
      echo "</option>";
    }

    echo '</select>';
    echo '</form>';
    echo '</div>';
  }


  ?>

  </div>
  </div>

  <?php include 'footer.html' ?>