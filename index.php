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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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

    
    <section  class="orizontalSection">
        <div>      
          <img src="https://picsum.photos/1700/200" class= "info">    
        </div>
        <div>
            <form class="login-class">
                <ul class="nodotlist">
                    <li class = "loginElement">
                        <input type="text" name="emailOrUsername" id="loginbox" placeholder="Username or Email">
                    </li>
                    <li class = "loginElement">
                        <input type="password" name="Password" id="loginbox" placeholder="Password">
                    </li>
                    <li class = "loginElement">
                        <button type="Sign in" id="buttonlogin">Login</button>
                    </li>
                    <p class = "loginElement" id = "writinglogin">
                        Not registered? Click here:
                    </p>
                    <li class = "loginElement">
                        <button type="submit" id="buttonlogin">Register</button>
                    </li>
                </ul>
            </form>
        </div>
    </section>

    <section  class="orizontalSection">
        <div class="statistics">      
          <p class="statistics_text">
              Statistics
          </p>
        </div>
        <div>
            <img src="https://picsum.photos/1700/200" class= "info">
        </div>
    </section>

    <div>
        <p id="writinglogin">
            Latest books: 
        <p>
    </div>

    <section  class="orizontalSection">
        <img src="https://picsum.photos/200/200" class= "info">
        <img src="https://picsum.photos/200/200" class= "info">
        <img src="https://picsum.photos/200/200" class= "info">
        <img src="https://picsum.photos/200/200" class= "info">
        <img src="https://picsum.photos/200/200" class= "info">
    </section>


    <section  class="orizontalSection">
        <div class="quotes">

            <img src="https://picsum.photos/100/100" id="personalityPortret">
            <ul class = "nodotlist">
                <li>
                    <p id="quotewrt">
                    “In three words I can sum up everything I've learned about life: it goes on.”
                    </p>
                </li>
                <li>
                    <p id="quotewrt">Robert Frost</p>
                </li>
            </ul>

        </div>

        <div class= "updates">
            <div class="update__comp">
                <p>Postarile colegilor: </p>
                <p>Radu Macarof: ,,Crima din Orient Express" de Agatha Cristie</p>
                <p>Razvan Tutuianu: ,,Crima si pedeapsa" de Fyodor Dostoyevsky</p>
                <p>Andrei Patrascan: ,,Fizica cuantica pentru gradinita" de Arthur Smith</p>
            </div>

            <div class="update__comp">
                <p>Review-urile colegilor: </p>
                <p>Radu Macarof(,,Crima din Orient Express" de Agatha Cristie): ,,Palpitant!"</p>
                <p>Razvan Tutuianu(,,Crima si pedeapsa" de Fyodor Dostoyevsky): ,,Minunat scrisa"</p>
                <p>Andrei Patrascan(,,Fizica cuantica pentru gradinita" de Arthur Smith): ,,Prea greu materialul"</p>
            </div>
        </div>
    </section>


</main>




    <footer class="mainFooter ">
<?php
        include('footer.html');
?>
    </footer>

</body>


</html>