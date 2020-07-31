<?php

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
include('database.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/png" href="../images/favicon_browser.png" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" />
    <link rel="stylesheet" href="style.css" />
    <link rel="stylesheet" type="text/css" href="review-style.css">
    <title>Admin</title>
</head>

<body>

    <?php include 'header.php'  ?>
    <div class="cob1">
        <input type="text" id="search-bar" name="search" placeholder="Search reviews">
        <div class="css-for-drop">
            <select id="dropdown">
                <option class="opt1">
                    All reviews
                </option>
                <option class="opt2">
                    Your reviews
                </option>
                <option>
                    By Book Author
                </option>
                <option>
                    By Book Genre
                </option>
            </select>
            <select id="dropdown-actions">
                <option class="opt1">
                    All genres
                </option>
                <?php
                $sql = "SELECT DISTINCT book_genre from book_reviews ";
                $sth = $db->prepare($sql);
                $sth->execute();
                while ($row = $sth->fetch(PDO::FETCH_BOTH)) {
                    echo "<option class='opt1'>";
                    echo $row['book_genre'];
                    echo "</option>";
                }
                ?>

            </select>
        </div>
    </div>
    <div id="reviews" class="article-container"></div>

    <script>
        function showMore() {

            console.log([...document.getElementsByClassName("article-box")]);
            [...document.getElementsByClassName("article-box")].forEach((element) => {
                console.log("ajunge aici");
                var moreText = element.getElementsByClassName("more")[0];
                var dots = element.getElementsByClassName("dots")[0];
                var btn = element.getElementsByClassName("myBtn")[0];
                console.log(moreText);
                console.log(dots);
                console.log(btn);
                btn.addEventListener('click', () => {
                    console.log("am apasat ceva");
                    if (dots.style.display === "none") {
                        dots.style.display = "inline";
                        moreText.style.display = "none";

                    } else {

                        dots.style.display = "none";
                        moreText.style.display = "inline";
                    }
                })

            });


        }

        const searchbar = document.getElementById('search-bar');
        const author = "<?php echo $_SESSION['username']; ?>";
        const dropdown = document.getElementById('dropdown');
        const actionsDropdown = document.getElementById('dropdown-actions');

        const fetchResults = async (title = '', author = '', genre) => {
            let reviewGenre = genre;
            if (reviewGenre === 'All genres') {
                reviewGenre = '';
            }
            const fetchedValues = await fetch(`search.php?title=${title}&author=${author}&genre=${reviewGenre}`);
            const results = await fetchedValues.text();
            console.log('title: ', title);
            console.log('author: ', author);
            console.log('genre: ', reviewGenre);
            document.getElementById("reviews").innerHTML = results;
            showMore();
        }

        const handleKeyPress = () => {
            const KEYCODES = {
                BACKSPACE: 8
            }
            searchbar.addEventListener('keyup', (event) => {
                let currentAuthor;
                fetchResults(searchbar.value, mapDropdownValues(), actionsDropdown.value)
            })
        }

        const handleDropdownChange = () => {

            dropdown.addEventListener('change', (event) => {
                const {
                    value
                } = event.target;
                let currentAuthor;

                fetchResults(searchbar.value, mapDropdownValues(), actionsDropdown.value)
            })
        }

        const handleActionsDropDownChange = () => {
            actionsDropdown.addEventListener('change', (event) => {
                fetchResults(searchbar.value, mapDropdownValues(), actionsDropdown.value)
            });
        }

        function mapDropdownValues() {
            const values = {
                'All reviews': '',
                'By Book Author': 'autor',
                'By Book Genre': 'genre',
                'Your reviews': author
            }

            return values[dropdown.value];
        }


        handleKeyPress();
        handleDropdownChange();
        handleActionsDropDownChange();
        window.onload = () => fetchResults(searchbar.value, mapDropdownValues(), actionsDropdown.value);
    </script>

    </div>
    </div>
</body>

</html>