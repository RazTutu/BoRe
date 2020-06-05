<?php

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: ../index.php");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" type="image/png" href="../images/favicon_browser.png"/>
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Social Sidebar Menu</title>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
  <link rel="stylesheet" href="style.css" />
  <link rel="stylesheet" type="text/css" href="review-style.css">
</head>

<body class="main">
  <div class="top_navbar">
    <div class="top_menu">
      <div class="logo">
        <p>
          Welcome
          <strong>
            <?php echo $_SESSION['username']; ?>
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
    <div id="content">