<?php
require_once("connection.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
    redirect("index.php");
}

include 'headerlogged.php';
?>

<main>

</main>

    <div class="grid-container">
      <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
          <h2>Delete Workout</h2>
          <form method="post" action="sterge.php">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" required>
            <button type="submit" class="success button">Delete</button>
          </form>
          <br>
          <a href="admin_workouts.php" class="button">Back to Workouts</a>
        </div>
      </div>
    </div>
  </div>

<?php include 'footer.php'; ?>
