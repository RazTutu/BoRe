<!DOCTYPE html>
<html lang="en">
    <head>
        <title>BoRe</title>
        <link rel="stylesheet" type="text/css" href="assets/css/header.css">
        <link rel="stylesheet" type="text/css" href="assets/css/footer.css">
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
        <link rel="stylesheet" type="text/css" href="assets/css/loadingScreen.css">
        <script src="assets/js/loadingScreen.js"></script>
        <link href="fonts/fontsDropdown/css/fontawesome.css" rel="stylesheet">
        <link href="fonts/fontsDropdown/css/brands.css" rel="stylesheet">
        <link href="fonts/fontsDropdown/css/solid.css" rel="stylesheet">
        <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
        <meta name="viewport" content="width=device-width ,initial-scale=1.0"/>
    </head>
<body>
<div class="contentWrapper" id="page">
    <?php
        include('header.html');
    ?>

<main>
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



</div>

<!-- loading screen implemented here. Don't touch it! -->
<div id="loading">
    <img src="images/loading.gif" class="bookGif" alt="loading screen happy book gif">
</div>


<footer class="mainFooter">
        <div class="footerElement">
            <h1>BoRe</h2>
             <p>The more you learn the more chances you have to pass</p>
              <div class="socialMedia">
                <a href="">
                    <i class="fa fa-facebook" aria-hidden="true">facabook.com/BoRe</i>
                </a>
                <a href="">
                    <i class="fa fa-instagram" aria-hidden="true">instagram.com/BoRe</i>
                </a>
                <a href="">
                    <i class="fa fa-twitter-square" aria-hidden="true">twiter.com/BoRe</i>
                </a>
            </div>
        </div>
        <div class="footerElement1">
            <div class="borderStyle">
            <h2>Quick links</h2>
            <div class="border1"></div>
        </div>
            <ul>
                <a href="">Careers<li></li></a>
                <a href="">About us<li></li></a>
                <a href="">Terms<li></li></a>
                <a href="">Privacy<li></li></a>
                <a href="">Help<li></li></a>
            </ul>
        </div>
        <div class="footerElement2">
            <h2>Work with us</h2>
                <div class="border2"></div>
                <ul>
                    <a href="">Authors<li></li></a>
                    <a href="">Advertise<li></li></a>
                    <a href="">Books Festivals<li></li></a>
                    <a href="">Prizes<li></li></a>
                    <a href="">Best users<li></li></a>
                </ul>
        </div>
        <div class="footerElementforLocation">
            <h2>Contact Us</h2>
            <div class="border3"></div>
            <ul>
                <li>
                    <i class="fa fa-map-signs" aria-hidden="true">Cuza Voda Street, Iasi Country</i>
                </li>
                <li>
                    <i class="fa fa-phone" aria-hidden="true">0232452963</i>
                </li>
                <li>
                    <i class="fa fa-question-circle" aria-hidden="true">BoRe@info.uaic.ro</i>
                </li>
            </ul>
           
           
        </div>
    <div class="bootomFooter">
        Copyright &copy; BoRe 2020
    </div>

</footer>



</body>
</html>