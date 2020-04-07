<?php include('./backend/server.php') ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>BookReviewer</title>
        <link rel="shortcut icon" type="image/png" href="./images/favicon_browser.png"/>
        <link rel="stylesheet" type="text/css" href="assets/css/header.css">
        <link rel="stylesheet" type="text/css" href="assets/css/footer.css">
        <link rel="stylesheet" type="text/css" href="assets/css/main.css">
        <link rel="stylesheet" type="text/css" href="assets/css/popUps.css">
        <script src="assets/js/loadingScreen.js"></script>
        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Allerta+Stencil">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" type="text/css" href="assets/css/loadingScreen.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    <main class="content" id="page">


    <section class = "mainLayout">

      <section class = "verticalSection">

        <section  class="orizontalSection">

            <div class = "loginElement">

                <p class='greetingMessageTitle'>
                    Why do you read so much?
                </p>

                <p class = 'greetingMessage'>
                In his book How to Read and Why, Harold Bloom says that we should read slowly, with love, openness and with our inner ear cocked. He explains we should read to increase our wit and 
                imagination, our sense of intimacy (in short, our entire consciousness) and also to heal our pain.
                </p>
                <p class = 'greetingMessagequote'>
                “Until you become yourself, what benefit can you be to others.”
                </p>
                <p class = 'greetingMessage'>
                With the endless amount of perspectives and lives we can read about, books can give us an opportunity to have experiences that we haven’t had the opportunity to. While still allowing 
                us to learn the life skills they entail. Books are a fast rack to creating yourself.
                </p>
            </div>

            <div class = "loginElement">
            </div>
            
            <div class = "loginElement" id = "loginSection">
                <p id = "segment__title">
                    Welcome Back
                </p>
                <p id = "segment__message">
                    Don't miss your next best read. Sign in to stay updated.
                </p>
                <button type="button" id="popup-login">Login</button>   
                <p id = "segment__message">
                    Not registered? Click here:
                </p>       
                <button type="button" id="popup-register">Register</button>
            </div>
        </section>
      </section>


      <div>
          <p class="indentedText">
              Computing books:  
          <p>
      </div>

      <section class = "verticalSection">
        <div class="contain">
          <div class="row">
            <div class="row__inner">

              <div class="tile">
                <img class="tile__img" src="bookcovers\Computing\0000001.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Computing\0000002.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Computing\0000003.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Computing\0000004.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Computing\0000005.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Computing\0000006.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Computing\0000007.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Computing\0000008.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Computing\0000009.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Computing\0000010.jpg" alt=""  />
              </div>
            </div>
          </div>
        </div>
      </section>

      <div>
          <p class="indentedText">
              Crime-Thriller books:  
          <p>
      </div>

      <section class = "verticalSection">
        <div class="contain">
          <div class="row">
            <div class="row__inner">

              <div class="tile">
                <img class="tile__img" src="bookcovers\Crime-Thriller\0000001.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Crime-Thriller\0000002.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Crime-Thriller\0000003.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Crime-Thriller\0000004.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Crime-Thriller\0000005.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Crime-Thriller\0000006.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Crime-Thriller\0000007.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Crime-Thriller\0000008.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Crime-Thriller\0000009.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Crime-Thriller\0000010.jpg" alt=""  />
              </div>
              
            </div>
          </div>
        </div>
      </section>

      <div>
          <p class="indentedText">
              Romance books:  
          <p>
      </div>

      <section class = "verticalSection">
        <div class="contain">
          <div class="row">
            <div class="row__inner">

              <div class="tile">
                <img class="tile__img" src="bookcovers\Romance\0000001.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Romance\0000002.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Romance\0000003.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Romance\0000004.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Romance\0000005.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Romance\0000006.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Romance\0000007.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Romance\0000008.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Romance\0000009.jpg" alt=""  />
              </div>
              <div class="tile">
                <img class="tile__img" src="bookcovers\Romance\0000010.jpg" alt=""  />
              </div>
            </div>
          </div>
        </div>
      </section>

      <section class = "verticalSection">
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
      </section>

      <section class = "verticalSection">
        <section  class="orizontalSection">
            <div class="quotes">

                <img src="https://picsum.photos/100/100" id="personalityPortret">
                <ul class = "nodotlist">
                    <li>
                        <p class="quotewrt">
                        “In three words I can sum up everything I've learned about life: it goes on.”
                        </p>
                    </li>
                    <li>
                        <p class="quotewrt">Robert Frost</p>
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
      </section>

    </section>

</main>


    <footer class="mainFooter ">
<?php
        include('footer.html');
?>
    </footer>

<?php
        include('popUps.php');
?>

<div id="loading">
    <img src="images/loading.gif" class="bookGif" alt="loading screen happy book gif">
    </div>
</body>
</html>