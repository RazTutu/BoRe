<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$msg = "";
//if upload button is pressed
if (isset($_POST['upload'])) {
    //the path to store the uploaded image
    $target = "../reviewedImages/" . basename($_FILES['image']['name']);
    //All the form errors(empty fields for example) will be stored inside errors array
    $errors = array();
    //connect to the db
    $db = mysqli_connect('eu-cdbr-west-02.cleardb.net', 'bb805e9a46b13e', '5b8a2c50', 'heroku_18acf4529517193', '3306');
    //get the subbmited data
    $image = $_FILES['image']['name'];
    $text = $_POST['text'];
    $username = $_SESSION['username'];
    $book_name = $_POST['book_name'];
    $book_genre = $_POST['book_genre'];
    $book_author = $_POST['book_author'];

    if (empty($username)) {
        array_push($errors, "Username is required.");
    }
    if (empty($book_name)) {
        array_push($errors, "Book name is required.");
    }
    if (empty($book_author)) {
        array_push($errors, "Book author is required.");
    }
    if (empty($book_genre)) {
        array_push($errors, "Book genre is required.");
    }
    if (empty($text)) {
        array_push($errors, "You forgot to fill the review zone.");
    }
    if (empty($image)) {
        array_push($errors, "You forgot to upload an image.");
    }

    if (count($errors) == 0) {
        $sql = "INSERT INTO book_reviews(username, book_name, book_author, book_genre, book_review, book_image) values ('$username', '$book_name', '$book_author', '$book_genre', '$text', '$image')";
        mysqli_query($db, $sql);
        //now save the local file
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $msg = "Image uploaded successfully";
        } else {
            $msg = "There was a problem uploading image";
        }
    } else {
        //print the user input errors
        echo "<div class='form_errors'>";
        for ($i = 0; $i < count($errors); $i++) {
            echo '<pre>';
            echo $errors[$i];
            echo '</pre>'; //using pre allows us to print each error on a new line
        }
        //echo "</div>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="review_image_style.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <title>review_image</title>
</head>

<body>
    <?php include 'header.php'  ?>
    <div id="content">
        <form method="post" enctype="multipart/form-data" class="add_review_form">

            <?php
            //$db = mysqli_connect('eu-cdbr-west-02.cleardb.net', 'bb805e9a46b13e', '5b8a2c50', 'heroku_18acf4529517193', '3306');
            $dbh = new \PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_18acf4529517193', 'bb805e9a46b13e', '5b8a2c50');
            $sth = $dbh->prepare("SELECT count(username) as total from book_reviews WHERE username=" . "'" . $_SESSION['username'] . "'" . ";");
            $sth->execute();
            $number_of_rows = $sth->fetchColumn();
            echo "<div class='book_nr_paragraph'>";
            if ($number_of_rows > 0) {
                echo "<p>You have " . $number_of_rows . " reviews posted!</p>";
            } else {
                echo "<p>You have 0 reviews posted!</p>";
            }
            echo "</div>";
            ?>

            <h1 class="header_message">Add a book review</h1>
            <input type="text" name="book_name" id="book_name_id" placeholder="Book name" class="input_field">
            <br>

            <input type="text" name="book_author" id="book_author" placeholder="Book author" class="input_field">
            <br>
            <input type="text" name="book_genre" id="book_genre_id" placeholder="Book genre" class="input_field">
            <br>
            <div class="review_input">
                <label for="review_zone_id" class="review_zone_label">Review of the book:</label>
                <textarea name="text" cols="40" rows="4" placeholder="Your review goes here." id="review_zone_id" class="review_zone_text"></textarea>
            </div>


            <div>
                <label for="upload_image_button">Image of the book</label>
                <input type="file" id="upload_image_button" name="image">
            </div>

            <div class="upload_review_button">
                <input type="submit" name="upload" value="Upload review" class="button_style">
            </div>
        </form>


    </div>


    <script>
        //prevent form resubmission when page is refreshed
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>

</body>

</html>