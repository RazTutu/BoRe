<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>Admin</title>
</head>
<body>

<?php
if($_SESSION['is_admin'] == 1){
    echo "<p>The user is an admin</p>";
} else {
    echo "<p>The user is not an admin</p>";
}
?>

<script>
//prevent form resubmission when page is refreshed
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</body>
</html>