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
        <h2>Search Workout</h2>
        <form method="post" action="cauta.php">  
          <div class="row">
            <div class="large-8 medium-8 small-12 columns">
              Title: <input type="text" name="title">
            </div>
            <div class="large-8 medium-8 small-8 columns">
              <button type="submit" class="success button" name="submit">Search</button>
            </div>
          </div>
        </form>

        </br>
        <a href="admin_workouts.php" class="button">Back to Workouts</a>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
