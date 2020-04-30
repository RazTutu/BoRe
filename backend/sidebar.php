<div id="sidebar">
  <ul>
    <li>
      <a href="reviewedImages.php" class="link">
        <span class="label">Write a review</span>
        <i class="fas fa-file-signature"></i>
      </a>
    </li>
    <li>
      <a href="demo2.php" class="link">
        <span class="label">Classes</span>
        <i class="fas fa-graduation-cap"></i>
      </a>
    </li>
    <li>
      <a href="#" class="link">
        <span class="label">Your reviews</span>
        <i class="fas fa-book"></i>
      </a>
    </li>


    <?php
    if ($_SESSION['is_admin'] == 1) {
      echo "<li>";
      echo "<a href='admin.php' class='link'>";
      echo "<span class='label'>Admin</span>";
      echo " <i class='fas fa-users-cog'></i>";
      echo "</a>";
      echo "</li>";
    }
    ?>
  </ul>
</div>