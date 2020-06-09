<?php
    $db = new \PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_18acf4529517193', 'bb805e9a46b13e', '5b8a2c50');
    $errors = array();
    $given_name = "";
    $given_prename = "";
    $given_email = "";
    $given_comment = "";
    $i=0;
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

    if (count($errors) == 0) {
        $sth = $db->prepare("INSERT INTO mesaje_contact(nume, prenume,email,mesaj) values ('$given_name', '$given_prename','$given_email', '$given_comment');");
        $sth->execute();
      }
    else {
        $popup_message = "You need to add ";
        foreach($errors as $e){
            if($e != null)$popup_message.=$e.",";
        }
        $popup_message = rtrim($popup_message, ",");
        echo "<script type='text/javascript'>alert('$popup_message');</script>";
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="assets/css/contact-body.css">
    <title>Contact</title>
</head>
<body>
    <div>
        <div class="mapWrapper">
            <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3044.357764105738!2d27.573841870545714!3d47.17323883843487!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40cafb61af5ef507%3A0x95f1e37c73c23e74!2sAlexandru%20Ioan%20Cuza%20University!5e0!3m2!1sen!2sro!4v1587732151416!5m2!1sen!2sro" 
            width=100% 
            height="400" 
            frameborder="0" 
            style="border:0;" 
            allowfullscreen="" 
            aria-hidden="false" 
            tabindex="0">
            </iframe>
        </div>
        <p class = "formMessage">
            Dacă intâmpini probleme sau dorești pur si simplu sa ne contactezi, completează formul alăturat:
        </p>

        <form method="post" class = "contactForm">
            <label class = "contactLabel">
            <span> Nume*</span>
            <input class = "contactInput" type="text" name="Nume">
            </label>
            <label class = "contactLabel">
                <span> Prenume*</span>
                <input class = "contactInput" type="text" name="Prenume">
            </label>
            <label class = "contactLabel">
                <span> Email*</span>
                <input class = "contactInput" type="text" name="Email">
            </label>
            <label class = "contactLabel">
                <span> Lasati un mesaj privind site-ul/informatii pe care doriti sa le stim*</span>
                <textarea class = "contactCommentLabel" type="text" name="Comment"> </textarea>
            </label>

            <button type="submit" class = "submitContactButton"> Submit </button>
        </form>
    </div>
</body>
</html>