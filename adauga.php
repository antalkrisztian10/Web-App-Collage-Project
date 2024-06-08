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
            <h2>Add Workout</h2>
            </br>

            <?php
            $db = new mysqli("localhost", "root", "", "gym_genius");

            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $title = $_POST['title'];
                $difficulty = $_POST['difficulty'];
                $description = $_POST['description'];
                $details = $_POST['details'];
                $duration = $_POST['duration'];
                $image = $_FILES['image_url']['name'];
                $target_dir = "images/";
                $target_file = $target_dir . basename($image);

                if (!is_dir($target_dir)) {
                    mkdir($target_dir, 0777, true);
                }

                if (empty($title)) {
                    $nameErr = "You must enter a title.";
                    echo $nameErr;
                } else {
                    if (move_uploaded_file($_FILES['image_url']['tmp_name'], $target_file)) {
                        $sql = "INSERT INTO admin_workouts (title, difficulty, description, details, duration, image_url) VALUES ('$title', '$difficulty', '$description', '$details', '$duration', '$target_file')";
                        
                        $results = mysqli_query($db, $sql);
                        if (!$results) {
                            die('Invalid query: ' . mysqli_error($db));
                        } else {
                            echo "The record has been added.</br>";
                        }
                    } else {
                        echo "<p>Failed to upload image</p>";
                    }
                }
            }

            $db->close();
            ?>

            <a href="admin_workouts.php" class="button">Back to Operations</a>
        </div>
    </div>
</div>
</div>

<?php include 'footer.php'; ?>
