<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

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
    </select>
</div>
<div id="reviews" class="article-container"></div>

<script>
    const searchbar = document.getElementById('search-bar');
    const author = "<?php echo $_SESSION['username']; ?>";

    const fetchResults = async (title = '', author = '') => {
        const fetchedValues = await fetch(`search.php?title=${title}&author=${author}`);
        const results = await fetchedValues.text();

        document.getElementById("reviews").innerHTML = results;
    }

    const handleKeyPress = () => {
        const KEYCODES = {
            BACKSPACE: 8
        }
        searchbar.addEventListener('keyup', (event) => {
            if (event.keyCode === KEYCODES.BACKSPACE) {
                fetchResults('');
            } else {
                fetchResults(event.target.value);
            }
        })
    }

    const handleDropdownChange = () => {
        const dropdown = document.getElementById('dropdown');
        dropdown.addEventListener('change', (event) => {
            const {
                value
            } = event.target;
            const currentAuthor = value === 'All reviews' ? '' : author;
            fetchResults(searchbar.value, currentAuthor);
        })
    }

    handleKeyPress();
    handleDropdownChange();
    window.onload = () => fetchResults('', '');
</script>