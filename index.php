<?php include('./backend/server.php') ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>BookReviewer</title>
        <link rel="shortcut icon" type="image/png" href="./images/favicon_browser.png"/>
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
        <meta name="viewport" content="width=device-width ,initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="assets/css/top_five_books.css">
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

      <section  class="horizontalSection">

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


    <section class = "horizontalSection middlePoz">
        <?php
      //code used to get the last 5 images inserted in the database
      $db = new \PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_18acf4529517193', 'bb805e9a46b13e', '5b8a2c50');
      $sql = "SELECT * FROM book_reviews order by book_id desc";
      $sth = $db->prepare($sql);
      $sth->execute();
      
      $i = 10;
      //explanation: at every iteration we extract the image and the text from the db
      //and we fill a div with the id img_div with it
      //use PDO and prepare statements to avoid sql injection
      echo "<div class='top_five_parent'>";
      while($row = $sth->fetch(PDO::FETCH_BOTH)){
          echo "<div class='top_five_layout'>";
              echo "<img class='top_five_image' alt='One of the last added books' src='reviewedImages/".$row['book_image']."'>";
              echo "<p>".$row['book_name']."</p>";
              echo "<p>".$row['book_author']."</p>";
              echo "<p>".$row['book_genre']."</p>";
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

    <section class = "verticalSection">
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
    </section>

    <section class = "verticalSection">
      <section  class="horizontalSection_statistics">
         <div class="quotes">
              <img src="https://picsum.photos/100/200" alt="placeholderImage" id="personalityPortret">
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