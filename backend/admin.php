<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../images/favicon_browser.png"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" type="text/css" href="review-style.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/admin_page.css">
    <link rel="shortcut icon" type="image/png" href="../images/favicon_browser.png" />
    <title>Admin</title>
</head>

<body>
    <?php include 'header.php'  ?>
    <?php
    if ($_SESSION['is_admin'] == 1) {
        include 'admin_page_valid.php';
    } else {
        echo "<p>The user is not an admin</p>";
    }
    ?>

    <script>
        //prevent form resubmission when page is refreshed
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>

</html>