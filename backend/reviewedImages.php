<?php
$msg = "";
//if upload button is pressed
if(isset($_POST['upload'])){
    //the path to store the uploaded image
    $target = "../reviewedImages/".basename($_FILES['image']['name']);
    //connect to the db
    $db = mysqli_connect('eu-cdbr-west-02.cleardb.net', 'bb805e9a46b13e', '5b8a2c50', 'heroku_18acf4529517193', '3306');
    //get the subbmited data
    $image = $_FILES['image']['name'];
    $text = $_POST['text'];
    $username = $_SESSION['username'];
    $book_name = $_POST['book_name'];
    $book_genre = $_POST['book_genre'];
    $book_author = $_POST['book_author'];

    $sql = "INSERT INTO book_reviews(username, book_name, book_author, book_genre, book_review, book_image) values ('$username', '$book_name', '$book_author', '$book_genre', '$text', '$image')";
    mysqli_query($db, $sql);
    //now save the local file
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        $msg = "Image uploaded successfully";
    } else {
        $msg = "There was a problem uploading image";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Document</title>
</head>
<body>

    <div id="content">
        <form method="post" enctype="multipart/form-data">
            <input type="hidden" name="size" value="100000">
            
                <label for="book_name_id">Name of the book:</label>
                <input type="text" name="book_name" id="book_name_id">
                <br>
                <label for="book_genre_id">Genre of the book:</label>
                <input type="text" name="book_genre" id="book_genre_id">
                <br>
                <label for="book_author">Author of the book:</label>
                <input type="text" name="book_author" id="book_author">
                <br>
                <div>
                <label for="review_zone_id">Review of the book:</label>
                <textarea name="text" cols="40" rows="4" placeholder="Your review goes here." id="review_zone_id"></textarea>
                </div>


            <div>
                <label for="upload_image_button">Image of the book</label>
                <input type="file" id="upload_image_button" name="image">
            </div>
            
            <div>
                <input type="submit" name="upload" value="Upload review">
            </div>
        </form>


    </div>


<script>
//prevent form resubmission when page is refreshed
    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>

</body>
</html>