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
        <h2>Search Results</h2>
        </br>

        <?php

        $db = new mysqli("localhost", "root", "", "gym_genius");

        if ($db->connect_error) {
          die("Connection failed: " . $db->connect_error);
        }

        $SW = 0;
        $sql = "";

        if (empty($_POST["title"])) {
          $nameErr = "Please enter a workout title.";
          echo $nameErr;
        } else {
          $title = $_POST['title'];
          $sql = "SELECT entry_id, title, difficulty, description, image_url FROM admin_workouts WHERE title LIKE '%$title%'";
          $SW = 1;
        }

        if ($SW == 1) {
          $result = mysqli_query($db, $sql);
          $nr = $result->num_rows;

          if (!$result) {
            die('Invalid query: ' . mysqli_error($db));
          }

          if ($nr > 0) {
            echo '<div class="responsive-table-scroll">';
            echo "<table class=\"responsive-table\">";
            echo "<thead><tr><th width=\"200\"><b>Title</b></th><th width=\"150\"><b>Difficulty</b></th><th width=\"300\"><b>Description</b></th><th width=\"150\"><b>Duration</b></th><th width=\"150\"><b>Image</b></th><th width=\"100\"><b>Actions</b></th></tr></thead><tbody>";
            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
              echo "<tr><td>";
              echo $row["title"];
              echo "</td><td>";
              echo $row["difficulty"];
              echo "</td><td>";
              echo $row["description"];
              echo "</td><td>";
              echo $row["duration"];
              echo "</td><td>";
              echo "<img src='" . $row["image_url"] . "' alt='Workout Image' style='width:200px;'>";
              echo "</td><td>";
              echo "<a href='modificare.php?id=" . $row["entry_id"] . "'>Edit</a>";
              echo "</td></tr>";
            }
            echo "</tbody></table>";
          } else {
            echo "</br>No records found matching your search!";
          }
        }

        $db->close();
        ?>

        </br>
        <a href="admin_workouts.php" class="button">Back to Workouts</a>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
