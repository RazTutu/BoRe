<?php

if (isset($_POST['emailAdress'])) {
    $to = ($_POST['emailAdress']);
    $db = new \PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_18acf4529517193', 'bb805e9a46b13e', '5b8a2c50');
    $sth = $db->prepare("INSERT INTO  email_sub(user_email) values (' $to');");
    $sth->execute();
    require('Mail/phpmailer/PHPMailerAutoload.php');
    $mail = new PHPMailer;
    $mail->isSMTP(); //CAND E HOSTAT VA TREBUI SA FIE DEZACTIVAT
    $mail->Host = 'smtp.gmail.com';
    $mail->Port = 587;
    $mail->SMTPSecure = 'tls';
    $mail->SMTPAuth = true;
    $mail->Username = 'send.email.for.tw@gmail.com';
    $mail->Password = '123456qwertY';
    $mail->setFrom('send.email.for.tw@gmail.com');
    $mail->addAddress($to);
    $mail->isHTML(true);
    $mail->Subject = 'Welcome to BoRe!';
    $mail->Body = '<h1 align=center> We are glad to have you in our community</h1?<br><h4 align=center>We hope you will enjoy the information and the people you meet here.You will receive information on various topics you are interested in</h4>';
    if (!$mail->send()) {
        echo "A crapat";
    } else {

        echo '<script>window.location.href="index.php";</script>';
    }
}
