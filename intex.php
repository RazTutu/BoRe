<!DOCTYPE html>
<html lang="en">
    <head>
        <title>BoRe</title>
        <link rel="stylesheet" type="text/css" href="assets/css/header.css">
        <link rel="stylesheet" type="text/css" href="assets/css/footer.css">
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
        <script src="assets/js/loadingScreen.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/loadingScreen.css">
       
        <link href="fonts/fontsDropdown/css/fontawesome.css" rel="stylesheet">
        <link href="fonts/fontsDropdown/css/brands.css" rel="stylesheet">
        <link href="fonts/fontsDropdown/css/solid.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width ,initial-scale=1.0"/>
        <style>
     
    </style>
    </head>
<body class="body">
 
    <header class="header">

    <?php
        include('header.html');
    ?>

    </header>
    <main class="content">
    <div class = "login">
        <form class="login-class">
            <ul class="listForLogin">
                <li class = "loginElement">
                    <input type="text" name="emailOrUsername" placeholder="Username or Email">
                </li>
                <li class = "loginElement">
                    <input type="password" name="Password" placeholder="Password">
                </li>
                <li class = "loginElement">
                    <button type="Sign in">Login</button>
                </li>
                <p class = "loginElement">
                    Not registered? Click here:
                </p>
                <li class = "loginElement">
                    <button type="submit">Register</button>
                </li>
            </ul>
        </form>
    </div>


</main>




    <footer class="mainFooter ">
<?php
        include('footer.html');
?>
    </footer>

</body>


</html>