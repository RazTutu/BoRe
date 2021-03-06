<?php
session_start();
// Logout button will destroy the session, and 
// will unset the session variables 
// User will be headed to 'login.php' 
// after loggin out 

$username = "";
if (!isset($_SESSION['username'])) {
    $_SESSION['msg'] = "You have to log in first";
    //header('location: ../index.php'); 
    echo $_SESSION['msg'];
} else {
    $username = $_SESSION['username'];
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: ../index.php");
}

//save admin checker value inside is_admin session variable
$dbh = new \PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_18acf4529517193', 'bb805e9a46b13e', '5b8a2c50');
$sth = $dbh->prepare("SELECT is_admin from users WHERE username=" . "'" . $username . "'" . ";");
$sth->execute();
$is_admin = $sth->fetchColumn();
if ($is_admin != 1) {
    $is_admin = 0;
}
$_SESSION['is_admin'] = $is_admin;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../images/favicon_browser.png" />
    <link rel="stylesheet" type="text/css" href="review_image_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">

    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" type="text/css" href="review-style.css">
    <title>BookReviewer</title>
</head>

<body>


    <?php if (isset($_SESSION['success'])) : ?>

        <?php
        unset($_SESSION['success']);
        ?>

    <?php endif ?>


    <!-- information of the user logged in -->
    <!-- welcome message for the logged in user -->
    <?php if (isset($_SESSION['username'])) : ?>
        <?php include 'reviewedImages.php'; ?>

        <!-- <a href="reviewedImages.php">Go to reviewedImages</a> -->
        <!-- Include the addReviews page -->

    <?php endif ?>

