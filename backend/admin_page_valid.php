<?php
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

<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
function alert($msg)
{
    echo "<script>alert('$msg');</script>";
}

//connect to db
$db = new \PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_18acf4529517193', 'bb805e9a46b13e', '5b8a2c50');
$data_export = "";
$response = "";
$data_export1 = "";
$response1 = "";
$adminFound = "";
if (isset($_POST['updateAdmin'])) {
    $username = $_POST['username'];
    $query = "SELECT * FROM users WHERE username= '$username'";
    $sth = $db->prepare($query);
    $sth->execute();
    if ($sth->rowCount() > 0) {
        $second_sth = $db->prepare("UPDATE users SET is_admin = 1
        where username = '$username';");
        $second_sth->execute();
        $adminFound = "The selected user is now admin.";
    } else {
        $adminFound = "User not found.";
    }
}

$userFound = "";
if (isset($_POST['update_remove'])) {
    $username = $_POST['username_remove'];
    $query = "SELECT * FROM users WHERE username= '$username'";
    $sth = $db->prepare($query);
    $sth->execute();
    if ($sth->rowCount() > 0) {
        $second_sth = $db->prepare("DELETE FROM users
        WHERE username = '$username';");
        $second_sth->execute();
    } else {
        $userFound = "User not found.";
    }
}

$bookUserFound = "";
if (isset($_POST['book_remove'])) {
    $book_name = $_POST['bookname_remove'];
    $username = $_POST['book_username_remove'];
    $query = "SELECT * FROM book_reviews WHERE username= '$username' and book_name = '$book_name';";
    $sth = $db->prepare($query);
    $sth->execute();
    if ($sth->rowCount() > 0) {
        $second_sth = $db->prepare("DELETE FROM book_reviews
        WHERE username = '$username' AND book_name = '$book_name';");
        $second_sth->execute();
    } else {
        $bookUserFound = "Book or user not found.";
    }
}

?>

    <!--Load the AJAX API-->
    <script src="https://www.gstatic.com/charts/loader.js"></script>
    <script>
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {
            'packages': ['corechart']
        });

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
                while ($row = $sth->fetch(PDO::FETCH_BOTH)) {
                    echo "['" . $row['username'] . "'," . $row['number_of_reviews'] . "],";
                    $data_export1 .= $row['username'] . ',' .  $row['number_of_reviews'] . "\n";
                    $response1 = "data:text/csv;charset=UTF-8, username,number_of_reviews,\n";
                    $response1 .= $data_export1;
                }



                ?>
            ]);

            // Set chart options
            var options = {
                'title': 'Best 10 users by number of reviews',
            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('genre_statistics'));
            chart.draw(data, options);
            $(window).resize(function() {
                drawChart();
            });
        }
    </script>



    <script>
        // Load the Visualization API and the corechart package.
        google.charts.load('current', {
            'packages': ['corechart']
        });

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

                while ($row = $sth->fetch(PDO::FETCH_BOTH)) {
                    echo "['" . $row['book_name'] . "'," . $row['number_of_books'] . "],";
                }
                $sth1 = $dbh->prepare("select book_name,book_author, count(book_review) as number_of_reviews from book_reviews group by book_name,book_author order by number_of_reviews desc;");
                $sth1->execute();

                while ($row1 = $sth1->fetch(PDO::FETCH_BOTH)) {
                    $data_export .= $row1['book_name'] . ',' .  $row1['number_of_reviews'] . ',' . $row1['book_author'] . "\n";
                    $response = "data:text/csv;charset=UTF-8, book_name,number_of_reviews,book_author,\n";
                    $response .= $data_export;
                }
                ?>
            ]);

            // Set chart options
            var options = {
                'title': 'Best 10 books by progress',
            };

            // Instantiate and draw our chart, passing in some options.
            var chart = new google.visualization.PieChart(document.getElementById('genre_statistics_2'));
            chart.draw(data, options);

            $(window).resize(function() {
                drawChart();
            });
        }
    </script>




    <div>
        <div class="admin_statistics">
            <div class="admin_statistic_one">
                <div id="genre_statistics"></div>
            </div>
            <div class="admin_statistic_two">
                <div id="genre_statistics_2"></div>
            </div>
        </div>
    </div>

    <div>
        <div class="makeAdmin">
            <h3 class="admin_title"> Type here the name of a user you want to make admin. </h3>
            <?php
            echo "<p class='admin_not_found'>$adminFound</p>";
            ?>
            <form method="post" class="make_admin_form">
                <input type="text" name="username" placeholder="Username" class="admin_field" required>
                <input type="submit" name="updateAdmin" value="Create admin" class="admin_button">
                <br>
            </form>


            <h3 class="admin_title"> Type here the name of a user you want to remove. </h3>
            <?php
            echo "<p class='admin_not_found'>$userFound</p>";
            ?>
            <form method="post" class="make_admin_form">
                <input type="text" name="username_remove" placeholder="Username" class="admin_field" required>
                <input type="submit" name="update_remove" value="Delete" class="admin_button">
            </form>

            <h3 class="admin_title"> Remove a book review. </h3>
            <?php
            echo "<p class='admin_not_found'>$bookUserFound</p>";
            ?>
            <form method="post" class="delete_review_form">
                <div class="remove_inputs">
                    <input type="text" name="bookname_remove" placeholder="Book name" class="admin_field" required>
                    <input type="text" name="book_username_remove" placeholder="User who posted it" class="admin_field" required>
                </div>
                <input type="submit" name="book_remove" value="Delete" class="remove_review_button">
            </form>

        </div>
        <div class="export-container">
            <?php
            echo '<a class="export-data" href="' . $response . '" download="export.csv">Download statistics for books</a>';
            echo '<a class="export-data" href="' . $response1 . '" download="export.csv">Download statistics for users</a>';

            ?>
        </div>
    </div>
    </div>
    </div>
