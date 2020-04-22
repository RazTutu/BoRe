<?php
session_start();
// Logout button will destroy the session, and 
// will unset the session variables 
// User will be headed to 'login.php' 
// after loggin out 

if (!isset($_SESSION['username'])) { 
    $_SESSION['msg'] = "You have to log in first"; 
    //header('location: ../index.php'); 
    echo $_SESSION['msg'];
}

if (isset($_GET['logout'])) { 
    session_destroy(); 
    unset($_SESSION['username']); 
    header("location: ../index.php"); 
} 

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../images/favicon_browser.png"/>
    <title>BookReviewer</title>
</head>
<body>

<?php if (isset($_SESSION['success'])) : ?> 
            <div class="error success" > 
                <h3> 
                    <?php
                        echo $_SESSION['success'];  
                        unset($_SESSION['success']); 
                    ?> 
                </h3> 
            </div> 
        <?php endif ?> 


    <!-- information of the user logged in -->
        <!-- welcome message for the logged in user -->
        <?php  if (isset($_SESSION['username'])) : ?> 
            <?php //the page will be included inside this if ?>
            <p> Welcome  
                <strong> 
                    <?php echo $_SESSION['username']; ?> 
                </strong> 
            </p> 
           

            <form method="GET">
            <button name="logout">logout here</button>
            </form>


        <!-- <a href="reviewedImages.php">Go to reviewedImages</a> -->
        <!-- Include the addReviews page -->
        <?php include 'reviewedImages.php';?>

         <?php endif ?>
        
</body>
</html>