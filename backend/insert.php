<?php
    session_start();
    include('database.php');
    
    $group_name = $_SESSION['option'];
    $username = $_SESSION['username'];

    $trans_message = "";
    if (isset($_POST['Comment'])) {
        $trans_message = $_POST['Comment'];
        
        if(strlen($trans_message)>0){
            $data = date("Y-m-j h:i:s");
            $sth = $db->prepare("INSERT INTO group_messages(group_name, username, message ,date) values ('$group_name', '$username','$trans_message', '$data');");
            $sth->execute();
            $trans_message = "";
            header("Refresh:0");
        }
    }
    echo '<script>window.location.href="group.php";</script>';
?>