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
      <div class="cell">
        <h1>Workouts</h1>
      </div>
    </div>

    <?php
    $db = new mysqli("localhost", "root", "", "gym_genius");

    if ($db->connect_error) {
      die("Connection failed: " . $db->connect_error);
    }

    $sql = "SELECT entry_id, title, difficulty, description, details, duration, image_url FROM admin_workouts";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
      echo '<div class="responsive-table-scroll">';
      echo "<table class=\"responsive-table\">";
      echo "<thead><tr><th width=\"200\"><b>Title</b></th><th width=\"150\"><b>Difficulty</b></th><th width=\"300\"><b>Description</b></th><th width=\"150\"><b>Duration</b></th><th width=\"150\"><b>Image</b></th><th width=\"100\"><b>Actions</b></th></tr></thead><tbody>";
      while($row = $result->fetch_assoc()) {
        $difficulty_class = strtolower($row['difficulty']);
        echo "<tr><td>";
        echo $row["title"];
        echo "</td><td>";
        echo $row["difficulty"];
        echo "</td><td>";
        echo $row["description"];
        echo "</td><td>";
        echo $row["duration"];
        echo "</td><td>";
        echo "<img src='" . $row["image_url"] . "' alt='Workout Image' style='width: 100px;'>";
        echo "</td><td>";
        echo "<a href='modificare.php?id=" . $row["entry_id"] . "' class='button expanded'>Edit</a>";
        echo "</td></tr>";
      }
      echo "</tbody></table>";
      echo '</div>';
    } else {
      echo "<p>No workouts found.</p>";
    }

    $db->close();
    ?>
  </div>

<?php include 'footer.php'; ?>
