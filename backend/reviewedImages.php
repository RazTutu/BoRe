<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

$sliderValue = 0;
$number_of_pages = 0;

$msg = "";
//if upload button is pressed
if (isset($_POST['upload'])) {
    //the path to store the uploaded image
    $target = "../reviewedImages/" . basename($_FILES['image']['name']);
    //All the form errors(empty fields for example) will be stored inside errors array
    $errors = array();
    //connect to the db
    include('database.php');
    //get the subbmited data
    $image = $_FILES['image']['name'];
    $text = $_POST['text'];
    $username = $_SESSION['username'];
    $book_name = $_POST['book_name'];
    $book_genre = $_POST['book_genre'];
    $book_author = $_POST['book_author'];

    if (empty($username)) { array_push($errors, "Username is required."); } 
    if (empty($book_name)) { array_push($errors, "Book name is required."); } 
    if (empty($book_author)) { array_push($errors, "Book author is required."); } 
    if (empty($book_genre)) { array_push($errors, "Book genre is required."); } 
    if (empty($text)) { array_push($errors, "You forgot to fill the review zone."); } 
    if (empty($image)) { array_push($errors, "You forgot to upload an image."); } 

    if (count($errors) == 0) { 
    
    //now save the local file
    if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
        $msg = "Image uploaded successfully";
    } else {
        $msg = "There was a problem uploading image";
    }

    if (count($errors) == 0) {
        //execute sql statement
        $sth = $db->prepare("INSERT INTO book_reviews(username, book_name, book_author, book_genre, book_review, book_image, review_date) values ('$username', '$book_name', '$book_author', '$book_genre', '$text', '$image', NOW());");
        $sth->execute();
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


}

//if post progress button is pressed
if (isset($_POST['upload_progress_form'])) {
    //All the form errors(empty fields for example) will be stored inside errors array
    $errors = array();
    //connect to the db
    include('database.php');
    //get the subbmited data
    $username = $_SESSION['username'];
    $book_name = $_POST['progress_book_name'];
    $progress_book_pages = $_POST['progress_book_pages'];
    $progress_book_current_page = $_POST['progress_book_current_page'];

    if (empty($book_name)) { array_push($errors, "Progress book name required."); } 
    if (empty($progress_book_pages)) { array_push($errors, "Book number of pages required."); } 
    if (empty($progress_book_current_page)) { array_push($errors, "Progress book current page required."); } 

    if (count($errors) == 0) {
        //$sql = "INSERT INTO book_progress(username, book_name, number_of_pages, current_page, progress_Date) values ('$username', '$book_name', '$progress_book_pages', '$progress_book_current_page', NOW())";
        $sth = $db->prepare("INSERT INTO book_progress(username, book_name, number_of_pages, current_page, progress_Date) values ('$username', '$book_name', '$progress_book_pages', '$progress_book_current_page', NOW());");
    
       // $sth = $db->prepare($sql);
        $sth->execute();
    }


}

if(isset($_POST['updateProgress'])){
    include('database.php');
    $progressValue = $_POST['progress_bar_value'];
    $name_of_user = $_SESSION['username'];
    $name_of_book = $_SESSION['last_progress_session'];
    $sth = $db->prepare("UPDATE book_progress SET current_page = '$progressValue'
    where username = '$name_of_user' and book_name= '$name_of_book';");
    // $sth = $db->prepare($sql);
    $sth->execute();
}

?>

<?php

if (isset($_GET['logout'])) {
  session_destroy();
  unset($_SESSION['username']);
  header("location: ../index.php");
}
?>


    <?php include 'header.php';  ?>
    <div class="content_validated">
        <form method="post" enctype="multipart/form-data" class="add_review_form">
            <?php
            //$db = mysqli_connect('eu-cdbr-west-02.cleardb.net', 'bb805e9a46b13e', '5b8a2c50', 'heroku_18acf4529517193', '3306');
            include('database.php');
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
            <input type="text" name="book_name" id="book_name_id" placeholder="Book name" class="input_field" required>
            <br>

            <input type="text" name="book_author" id="book_author" placeholder="Book author" class="input_field" required>
            <br>
            <input type="text" name="book_genre" id="book_genre_id" placeholder="Book genre" class="input_field" required>
            <br>
            <div class="review_input">
                <label for="review_zone_id" class="review_zone_label">Review of the book:</label>
                <textarea name="text" cols="40" rows="4" placeholder="Your review goes here." id="review_zone_id" class="review_zone_text" required></textarea>
            </div>


            <div>
                <label for="upload_image_button">Image of the book</label>
                <input type="file" id="upload_image_button" name="image" required>
            </div>

            <div class="upload_review_button">
                <input type="submit" name="upload" value="Upload review" class="button_style">
            </div>
        </form>


    </div>

    <div class="progress_content">
        <div class="progress_form">
            <form method="post" enctype="multipart/form-data" class="add_progress">
                <h2>Book not finished?</h2>
                <h3>Tell us and we manage your progress.</h3>
                <label for="progress_book_name">Book name:</label>
                <input type="text" id="progress_book_name" name="progress_book_name" class="progress_field" required>
                <br>
                <label for="progress_book_pages">Number of pages:</label>
                <input type="number" id="progress_book_pages" name="progress_book_pages" class="progress_field" required>
                <br>
                <label for="progress_book_current_page">Your current page:</label>
                <input type="number" id="progress_book_current_page" name="progress_book_current_page" class="progress_field" required>
                <div class="upload_review_button">
                <input type="submit" name="upload_progress_form" value="Upload progress" class="button_style">
                </div>
            </form>
        </div>
        <div class="last_progress">
            <h2>Your latest book progress</h2>
            
            <?php
                include('database.php');
                $sth = $dbh->prepare("SELECT * from book_progress WHERE username=" . "'" . $_SESSION['username'] . "'" . 
                "ORDER BY progress_Date DESC
                LIMIT 1" . ";");
                $sth->execute();
                while($row = $sth->fetch(PDO::FETCH_BOTH)){
                    echo "<div class='top_five_layout'>";
                        //echo "<img class='top_five_image' alt='One of the last added books' src='reviewedImages/".$row['book_image']."'>";
                        echo "<h3>".$row['book_name']."</h3>";
                        $sliderValue = $row['current_page'];
                        $_SESSION['last_progress_session'] = $row['book_name'];
                        $number_of_pages = $row['number_of_pages'];
                        //echo "<p>".$row['book_review']."</p>"; //with this line you can get even the book review
                        //but don't show it because it may be too long.
                    echo "</div>";
                }


            ?>

            
            <form method="post" enctype="multipart/form-data" class="updateLatestProgress">
            <div class="rangeZone">
	            <span class="rangeZoneInner"><span id="rangeValue"><?php echo $sliderValue ?></span><span> / <span><?php  echo $number_of_pages ?></span> Pages read</span></span>
	            <input class="range" type="range" name="progress_bar_value" value="<?php echo $sliderValue ?>" min="0" max="<?php echo $number_of_pages?>"
	            onChange="rangeSlide(this.value)" onmousemove="rangeSlide(this.value)">
            </div>
            <input type="submit" name="updateProgress" value="Update progress" class="button_style">
            
            </form>
            <script>
                function rangeSlide(value){
                    document.getElementById('rangeValue').innerHTML = value;
                    $sliderValue = value;
                }
            </script>


            
        </div>
    </div>

    <script>
        //prevent form resubmission when page is refreshed
        if (window.history.replaceState) {
            window.history.replaceState(null, null, window.location.href);
        }
    </script>
    </div>
    </div>
    

</body>
</html>