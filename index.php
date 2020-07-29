<?php include('./backend/server.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="viewport" content="width=device-width ,initial-scale=1.0" />
    <title>BookReviewer</title>
    <link rel="shortcut icon" type="image/png" href="./images/favicon_browser.png" />
    <meta name="description" content="Add book reviews so you can read them whenever you want.">
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

    <link rel="stylesheet" type="text/css" href="assets/css/top_five_books.css">
    <style>

    </style>
</head>

<body class="body">
    <div id="loading">
        <div class="loading_image">
            <img src="images/loading.gif" class="bookGif" alt="loading screen happy book gif">
        </div>
    </div>
    <div class="header">

        <?php
        include('header.html');
        ?>

    </div>

<main class="content" id="page">
  <section class = "mainLayout">

      <div class="text_login_section">

        <div class="main_message_container">

              <h2 class='main_paragrapf_title'>
                  Why do you read so much?
              </h2>

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

          
          
          <div class="login_container">
              <p id = "segment__title">
                  Welcome Back
              </p>
              <p id = "segment__message">
                  Sign in to stay updated
              </p>
              <button type="button" id="popup-login" class="login-btn">Login</button>   
              <p>
                  Not registered? Click here:
              </p>       
              <button type="button" id="popup-register">Register</button>
          </div>
      </div>
    <section class="latest-books-style">
        <?php
      //code used to get the last 5 images inserted in the database
      $db = new \PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_18acf4529517193', 'bb805e9a46b13e', '5b8a2c50');
      $sql = "SELECT * FROM book_reviews order by book_id desc";
      $sth = $db->prepare($sql);
      $sth->execute();
      
      $i = 6;
      //explanation: at every iteration we extract the image and the text from the db
      //and we fill a div with the id img_div with it
      //use PDO and prepare statements to avoid sql injection
      echo "<h2 class = 'last_books_text'> Latest reviewed books </h2>";
      echo "<div class='top_five_parent'>";
      while($row = $sth->fetch(PDO::FETCH_BOTH)){
          echo "<div class='top_five_layout'>";
              echo "<img class='top_five_image' alt='One of the last added books' src='reviewedImages/".$row['book_image']."'>";
              echo "<p class='book_name'>Name: ".$row['book_name']."</p>";
              echo "<p>Author: ".$row['book_author']."</p>";
              
              //echo "<p>".$row['book_review']."</p>"; //with this line you can get even the book review
              //but don't show it because it may be too long.
          echo "</div>";
          $i-=1;
          if($i == 0){
              break;
          }
      }
      echo "</div>"; //end of the top_five_parent div
      ?>
    </section>

    <!-- <section class = "verticalSection">
      <section  class="horizontalSection_statistics">
          <div class="statistics">      
          <p class="statistics_text">
              Statistics
          </p>
          </div>
          <div>
              <img src="https://picsum.photos/1700/200" alt="placeholderImage" class= "info">
          </div>
      </section>
    </section> -->
        <div class="second_part_container">
            <div class="second_part">
                <p class="quote_greeting">How about some insightful quotes? Here are some of our favourite: </p>
                <section class="horizontalSection_statistics">

                    <div>
                        <div>
                            <img class="ranking-image" src="images/George_R._R._Martin.jpg" alt="placeholderImage">
                            <p class="ranking-quote">“Sleep is good, he said, and books are better.”</p>
                            <p class="ranking-name">George R.R. Martin</p>
                        </div>
                    </div>

                    <script type="text/javascript">
                        var count1 = 1;
                        var count2 = 1;
                        var count3 = 1;

                        var images = [];
                        images[0] = "images/George_R._R._Martin.jpg"
                        images[1] = "images/Charles_W._Eliot.jpg"
                        images[2] = "images/Jane Smiley.jpg"
                        images[3] = "images/IsabelAllende.jpg"
                        images[4] = "images/J.K. Rowling.jpg"
                        images[5] = "images/Carl Sagan.jpg"
                        images[6] = "images/Neil Gaiman.jpg"
                        images[7] = "images/E.B. White.jpg"
                        images[8] = "images/Charles Baudelaire.jpg"

                        var names = ['George R.R. Martin', 'Charles W. Eliot', 'Jane Smiley', 'Isabel Allende', 'J.K. Rowling', 'Carl Sagan', 'Neil Gaiman', 'E.B. White', 'Charles Baudelaire'];
                        var quotes = ['“Sleep is good, he said, and books are better.”', '“Books are the quietest and most constant of friends; they are the most accessible and wisest of counselors, and the most patient of teachers.”', '“Many people, myself among them, feel better at the mere sight of a book.”', '“The library is inhabited by spirits that come out of the pages at night.”', '“If you don’t like to read, you haven’t found the right book.”', '“One glance at a book and you hear the voice of another person, perhaps someone dead for 1,000 years. To read is to voyage through time.”', '“Fairy tales are more than true: not because they tell us that dragons exist, but because they tell us that dragons can be beaten.”', '“Books are good company, in sad times and happy times, for books are people – people who have managed to stay alive by hiding between the covers of a book.”', '“A book is a garden, an orchard, a storehouse, a party, a company by the way, a counselor, a multitude of counselors.”'];


                        var quotesContainer = document.getElementsByClassName('ranking-quote');
                        var namesContainer = document.getElementsByClassName('ranking-name');
                        var imagesContainer = document.getElementsByClassName("ranking-image");

                        setInterval(function() {
                            for (var i = 0; i < 8; i++) {
                                imagesContainer[i].src = images[count3];
                                count3++;
                                if (count3 == images.length) {
                                    count3 = 0;
                                };
                            }
                        }, 3000);


                        setInterval(function() {
                            for (var i = 0; i < 8; i++) {
                                quotesContainer[i].innerHTML = quotes[count1];
                                count1++;
                                if (count1 == quotes.length) {
                                    count1 = 0;
                                };
                            }
                        }, 3000);

                        setInterval(function() {
                            for (var i = 0; i < 8; i++) {
                                namesContainer[i].innerHTML = names[count2];
                                count2++;
                                if (count2 == names.length) {
                                    count2 = 0;
                                };
                            }
                        }, 3000);
                    </script>
                </section>
            </div>
        
            <div class="rss">
                
                <?php
      //code used to get the last 5 images inserted in the database
      $db = new \PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_18acf4529517193', 'bb805e9a46b13e', '5b8a2c50');
      $sql = "SELECT * FROM book_reviews order by review_date desc";
      $sth = $db->prepare($sql);
      $sth->execute();
      
      $i = 4;
      //explanation: at every iteration we extract the image and the text from the db
      //and we fill a div with the id img_div with it
      //use PDO and prepare statements to avoid sql injection
      echo "<h2 class = 'rss_headline'> RSS: Latest users that posted a review</h2>";
      echo "<div>";
      while($row = $sth->fetch(PDO::FETCH_BOTH)){
          echo "<div>";
             
              echo "<p>".$row['username']." posted a review for ".$row['book_name']." on ".$row['review_date']."</p>";
              
              //echo "<p>".$row['book_review']."</p>"; //with this line you can get even the book review
              //but don't show it because it may be too long.
          echo "</div>";
          $i-=1;
          if($i == 0){
              break;
          }
      }
      echo "</div>"; //end of the top_five_parent div
      ?>
            </div>

    </div>
        </section>
    </main>


    <footer class="mainFooter ">
        <?php
        include('footer.php');
        ?>
    </footer>

    <?php
    include('popUps.php');
    ?>


</body>

</html>