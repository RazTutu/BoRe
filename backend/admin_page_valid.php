
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../assets/css/admin_page.css">
    <link rel="shortcut icon" type="image/png" href="../images/favicon_browser.png"/>
    <title>Admin page</title>

    <!--Load the AJAX API-->
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">

    // Load the Visualization API and the corechart package.
    google.charts.load('current', {'packages':['corechart']});

    // Set a callback to run when the Google Visualization API is loaded.
    google.charts.setOnLoadCallback(drawChart);

    // Callback that creates and populates a data table,
    // instantiates the pie chart, passes in the data and
    // draws it.
    function drawChart() {
        // Create the data table.
        var data = google.visualization.arrayToDataTable([
          ['Users', 'Posts'],
         <?php
         $dbh = new \PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_18acf4529517193', 'bb805e9a46b13e', '5b8a2c50');
         $sth = $dbh->prepare("select username, count(username) as number_of_reviews from book_reviews group by username
                              order by number_of_reviews desc limit 10;");
         $sth->execute();
         while($row = $sth->fetch(PDO::FETCH_BOTH)){
            echo"['".$row['username']."',".$row['number_of_reviews']."],";

         }
         ?>
        ]);

        // Set chart options
        var options = {'title':'Best 10 users by number of reviews',
                       };

        // Instantiate and draw our chart, passing in some options.
        var chart = new google.visualization.PieChart(document.getElementById('genre_statistics'));
        chart.draw(data, options);
      }
    </script>



<script type="text/javascript">

// Load the Visualization API and the corechart package.
google.charts.load('current', {'packages':['corechart']});

// Set a callback to run when the Google Visualization API is loaded.
google.charts.setOnLoadCallback(drawChart);

// Callback that creates and populates a data table,
// instantiates the pie chart, passes in the data and
// draws it.
function drawChart() {
    // Create the data table.
    var data = google.visualization.arrayToDataTable([
      ['Users', 'Posts'],
     <?php
     $dbh = new \PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_18acf4529517193', 'bb805e9a46b13e', '5b8a2c50');
     $sth = $dbh->prepare("select book_name, count(book_name) as number_of_books from book_progress
                            group by book_name order by number_of_books desc limit 10;");
     $sth->execute();
     while($row = $sth->fetch(PDO::FETCH_BOTH)){
        echo"['".$row['book_name']."',".$row['number_of_books']."],";

     }
     ?>
    ]);

    // Set chart options
    var options = {'title':'Best 10 books by progress',
                   };

    // Instantiate and draw our chart, passing in some options.
    var chart = new google.visualization.PieChart(document.getElementById('genre_statistics_2'));
    chart.draw(data, options);
  }
</script>

</head>
<body>
    <section>
    <div class="admin_statistics">
        <div class="admin_statistic_one">
            <div id="genre_statistics"></div>
        </div>
        <div class="admin_statistic_two">
            <div id="genre_statistics_2"></div>
        </div>
    </div>
    </section>

    <section>
        <div class="sectionTitle">
            <h1>Now let's go to another topic</h1>
        </div>
    </section>

</body>
</html>