<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
$db = new \PDO('mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_18acf4529517193', 'bb805e9a46b13e', '5b8a2c50');
?>

<?php include 'header.php'  ?>
<div class="cob">
    <input type="text" id="search-bar" name="search" placeholder="Search reviews">

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