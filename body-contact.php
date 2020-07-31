<?php
include('database.php');
$errors = array();
$given_name = "";
$given_prename = "";
$given_email = "";
$given_comment = "";
$i = 0;
if (isset($_POST['Nume'])) {
    $given_name = $_POST['Nume'];
    if (empty($given_name)) {
        array_push($errors, "the last name");
    }
}
if (isset($_POST['Prenume'])) {
    $given_prename = $_POST['Prenume'];
    if (empty($given_name)) {
        array_push($errors, "the first name");
    }
}
if (isset($_POST['Email'])) {
    $given_email = $_POST['Email'];
    if (empty($given_name)) {
        array_push($errors, "the email");
    }
}
if (isset($_POST['Comment'])) {
    $given_comment = $_POST['Comment'];
    if (empty($given_name)) {
        array_push($errors, "a message");
    }
}

if(isset($_POST['upload'])){
if (count($errors) == 0) {
    $sth = $db->prepare("INSERT INTO mesaje_contact(nume, prenume,email,mesaj) values ('$given_name', '$given_prename','$given_email', '$given_comment');");
    $sth->execute();
} else {
    $popup_message = "You need to add ";
    foreach ($errors as $e) {
        if ($e != null) $popup_message .= $e . ",";
    }
    $popup_message = rtrim($popup_message, ",");
    echo "<script type='text/javascript'>alert('$popup_message');</script>";
}
}
?>




<div>
    <div class="mapWrapper">
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3044.357764105738!2d27.573841870545714!3d47.17323883843487!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40cafb61af5ef507%3A0x95f1e37c73c23e74!2sAlexandru%20Ioan%20Cuza%20University!5e0!3m2!1sen!2sro!4v1587732151416!5m2!1sen!2sro" width="1920" height="400" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0">
        </iframe>
    </div>


    <!-- TESTING -->
    <div class="contact-zone">
    <div class="contact-form-parent-final">
        <form method="post" enctype="multipart/form-data" class="add_review_form">

            <h1 class="header_message">Contact us</h1>
            <input type="text" name="Nume" id="book_name_id" placeholder="First name" class="input_field" required>
            <br>

            <input type="text" name="Prenume" id="book_author" placeholder="Last Name" class="input_field" required>
            <br>
            <input type="text" name="Email" id="book_genre_id" placeholder="Email" class="input_field" required>
            <br>
            <div class="review_input">
                <label for="review_zone_id" class="review_zone_label">Message:</label>
                <textarea name="Comment" cols="40" rows="4" placeholder="Your text goes here." id="review_zone_id" class="review_zone_text" required></textarea>
            </div>

            <div class="upload_review_button">
                <input type="submit" name="upload" value="Send message" class="button_style">
            </div>
        </form>
            </div>

        <div class="contact-image">
            <h3 class="contact-top-text">Talk with us about anything you want</h3>
            <div class="chat-image">
                <img src="./images/contact-image.jpg" class="contact-book-image"/>
            </div>
        </div>

    </div>
</div>