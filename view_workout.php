<?php
require_once("connection.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
    redirect("index.php");
}

include 'headerlogged.php';
?>

<main>

</main>

<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $db = new mysqli("localhost", "root", "", "gym_genius");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $sql = "SELECT * FROM admin_workouts WHERE entry_id='$id'";
    $result = $db->query($sql);

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        ?>

        <div class="grid-container">
            <div class="grid-x grid-padding-x">
                <div class="cell">
                    <h1><?php echo $row['title']; ?></h1>
                    <img src="<?php echo $row['image_url']; ?>" alt="Workout Image" style="width: 50%; max-width: 400px;">
                    <h2>Difficulty: <?php echo $row['difficulty']; ?></h2>
                    <p><?php echo $row['description']; ?></p>
                    <p><strong>Details:</strong> <?php echo $row['details']; ?></p>
                </div>
            </div>
            <a href="antrenamente.php" class="button">Back to Workouts</a>
        </div>

        <?php
    } else {
        echo "<p>No workout found with this ID.</p>";
    }

    $db->close();
} else {
    echo "<p>No workout ID specified.</p>";
}
?>

<?php include 'footer.php'; ?>
