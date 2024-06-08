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
            <h2>Edit Workout</h2>

            <?php
            $db = new mysqli("localhost", "root", "", "gym_genius");

            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }

            if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id'])) {
                $id = $_GET['id'];

                $sql = "SELECT * FROM admin_workouts WHERE entry_id='$id'";
                $result = mysqli_query($db, $sql);

                if (!$result) {
                    die('Invalid query: ' . mysqli_error($db));
                }

                if (mysqli_num_rows($result) == 1) {
                    $row = mysqli_fetch_assoc($result);
                    ?>

                    <form method="post" action="modificare.php?id=<?php echo $id; ?>" enctype="multipart/form-data">
                        <div class="row">
                            <div class="large-8 medium-8 small-12 columns">
                                Title: <input type="text" name="title" value="<?php echo $row['title']; ?>" required>
                                Difficulty: 
                                <select name="difficulty" required>
                                    <option value="beginner" <?php if($row['difficulty'] == 'beginner') echo 'selected'; ?>>Beginner</option>
                                    <option value="intermediate" <?php if($row['difficulty'] == 'intermediate') echo 'selected'; ?>>Intermediate</option>
                                    <option value="advanced" <?php if($row['difficulty'] == 'advanced') echo 'selected'; ?>>Advanced</option>
                                </select>
                                Description: <textarea name="description" required><?php echo $row['description']; ?></textarea>
                                Details: <textarea name="details" required><?php echo $row['details']; ?></textarea>
                                Duration: <textarea name="duration" required><?php echo $row['duration']; ?></textarea>
                                <label>Image:
                                    <input type="file" name="image_url" accept="image/*">
                                </label>
                            </div>
                            <div class="large-8 medium-8 small-8 columns">
                                <button type="submit" class="success button" name="btnSubmit">Update</button>
                            </div>
                        </div>
                    </form>

                    <?php
                } else {
                    echo "</br>No record found with this ID!";
                }
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_GET['id'])) {
                $id = $_GET['id'];
                $title = $_POST['title'];
                $difficulty = $_POST['difficulty'];
                $description = $_POST['description'];
                $details = $_POST['details'];

                if (!empty($_FILES['image_url']['name'])) {
                    $image = $_FILES['image_url']['name'];
                    $target_dir = "images/";
                    $target_file = $target_dir . basename($image);

                    if (move_uploaded_file($_FILES['image_url']['tmp_name'], $target_file)) {
                        $sql_upd = "UPDATE admin_workouts SET title='$title', difficulty='$difficulty', description='$description', details='$details', image_url='$target_file' WHERE entry_id='$id'";
                    } else {
                        echo "<p>Failed to upload image</p>";
                        $sql_upd = "UPDATE admin_workouts SET title='$title', difficulty='$difficulty', description='$description', details='$details' WHERE entry_id='$id'";
                    }
                } else {
                    $sql_upd = "UPDATE admin_workouts SET title='$title', difficulty='$difficulty', description='$description', details='$details' WHERE entry_id='$id'";
                }

                $result_upd = mysqli_query($db, $sql_upd);

                if (!$result_upd) {
                    die('Invalid query: ' . mysqli_error($db));
                } else {
                    echo "The record has been updated.</br>";
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
