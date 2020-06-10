<div class="chat_emvelop">

    <h2> Chat Messages </h2>

    <div class="chat_container">
        <?php
        $group_name_1 = $_SESSION['option'];
        $sql = "SELECT * FROM (SELECT * from group_messages WHERE group_name LIKE BINARY '%$group_name_1%'  order by date desc limit 30) as T order by date;";
        $sth = $db->prepare($sql);
        $sth->execute();
        $row_count = $sth->rowCount();

        if ($row_count > 0) {
            while ($row = $sth->fetch(PDO::FETCH_BOTH)) {
                echo "<p class='chat_user'>" . $row['username'] . ":" . $row['message'] . "</p>";
            }
        }
        ?>
    </div>

    <form method="post" action="insert.php" class="chatInput">
        <label class="chatLabel">
            <input class="chatCommentLabel" type="text" name="Comment" placeholder="Scrieti un mesaj" />
        </label>
        <input type="submit" class="submitChatButton1" value="Submit" />
    </form>

</div>
</div>
</div>
</div>
<script>
    var objDiv = document.getElementByClassName("chat_container");
    objDiv.scrollTop = objDiv.scrollHeight;
</script>