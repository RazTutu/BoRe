<?php
session_start();
// Logout button will destroy the session, and 
// will unset the session variables 
// User will be headed to 'login.php' 
// after loggin out 

//this thing works perfectly if you enter the website without being logged in. I could make an error page with that
if (!isset($_SESSION['username'])) { 
    $_SESSION['msg'] = "You have to log in first"; 
    //header('location: ../index.php'); 
    echo $_SESSION['msg'];
}

//this also works. it's called when i press the logout button
if (isset($_GET['logout'])) { 
    session_destroy(); 
    unset($_SESSION['username']); 
    echo "YOU WILL BE LOGGED OUT IN 3 SECONDS";
    
    sleep(3);
    //header('location: ../index.php'); 
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


    <!-- information of the user logged in -->
        <!-- welcome message for the logged in user -->
        <?php  if (isset($_SESSION['username'])) : ?> 
            <p> 
                Hei hei hei 
                <strong> 
                    <?php echo $_SESSION['username']; ?> 
                </strong> 
            </p> 
            <p>  
                <a href="#" style="color: red;"> 
                    Click here to Logout 
                </a> 
            </p> 
           
            <form method="GET">
            <button name="logout">logout here</button>
            </form>
        <?php else : ?>
        <p></p>
         <?php endif ?>
        
</body>
</html>