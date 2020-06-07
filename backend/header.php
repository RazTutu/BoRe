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