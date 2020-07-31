<?php
// Starting the session, necessary 
// for using session variables 
session_start(); 

// Declaring and hoisting the variables 
$username = ""; 
$email    = ""; 
$errors = array();  
$_SESSION['success'] = ""; 
include('errors.php');
// DBMS connection code -> hostname, 
// username, password, database name 
//heroku database information
include('database.php');

if (isset($_POST['reg_user'])) { 
    // Receiving the values entered and storing 
    // in the variables 
    // Data sanitization is done to prevent 
    // SQL injections 
    $username = $_POST['username']; 
    $email = $_POST['email']; 
    $password_1 = $_POST['password_1']; 
    $password_2 = $_POST['password_2']; 

    // Ensuring that the user has not left any input field blank 
    // error messages will be displayed for every blank input 
    if (empty($username)) { array_push($errors, "Username is required"); } 
    if (empty($email)) { array_push($errors, "Email is required"); } 
    if (empty($password_1)) { array_push($errors, "Password is required"); } 
   
    if ($password_1 != $password_2) { 
        array_push($errors, "The two passwords do not match"); 
        // Checking if the passwords match 
    } 

    // If the form is error free, then register the user 
    if (count($errors) == 0) { 
          
        // Password encryption to increase data security 
        $password = md5($password_1); 
          
        // Inserting data into table 
        $query = "INSERT INTO users (username, email, password)  
        VALUES('$username', '$email', '$password')";  
        $sth = $db->prepare($query);
        $sth->execute();
        
        // Storing username of the logged in user, 
        // in the session variable 
        $_SESSION['username'] = $username; 
          
        // Welcome message 
        $_SESSION['success'] = "You have logged in"; 
          
        // Page on which the user will be  
        // redirected after logging in 
        header('location: ./backend/user_logged.php');  
    } 

}
if (isset($_POST['login_user'])) { 
    // Data sanitization to prevent SQL injection 
    $username = $_POST['username']; 
    $password = $_POST['password']; 

     // Error message if the input field is left blank 
     if (empty($username)) { 
        array_push($errors, "Username is required"); 
    } 
    if (empty($password)) { 
        array_push($errors, "Password is required"); 
    } 
   
     // Checking for the errors 
     if (count($errors) == 0) { 
          
        // Password matching 
        $password = md5($password); 
          
        $query = "SELECT * FROM users WHERE username= 
                '$username' AND password='$password'";
        $sth = $db->prepare($query);
        $sth->execute();  
        
        // $results = 1 means that one user with the 
        // entered username exists 
        if ($sth->rowCount() > 0) { 
              
            // Storing username in session variable 
            $_SESSION['username'] = $username; 
              
            // Welcome message 
            $_SESSION['success'] = "You have logged in!"; 
              
            // Page on which the user is sent 
            // to after logging in 
            header('location: ./backend/user_logged.php'); 
        } 
        else { 
              
            // If the username and password doesn't match 
            array_push($errors, "Username or password incorrect for login");  
        } 
    }

}

?>