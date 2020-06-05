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