<?php
require_once("connection.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
    redirect("index.php");
}

include 'headerlogged.php';
?>

<main>
    <div class="grid-container">
        <div class="grid-x grid-padding-x">
            <div class="large-12 cell">
                <h2>Delete Workout</h2>
                </br>

                <?php
                $db = mysqli_connect("localhost", "root", "", "gym_genius");

                $SW = 0;
                if (empty($_POST["title"])) {
                    $nameErr = "It's necessary to type the workout's name.";
                    echo $nameErr;
                } else {
                    $title = $_POST["title"];
                    $sql = "DELETE FROM admin_workouts WHERE title = '$title'";
                    $SW = 1;
                }

                if ($SW == 1) {
                    $result = mysqli_query($db, $sql);

                    if (!$result) {
                        die('Invalid query: ' . mysqli_error($db));
                    } else {
                        if (mysqli_affected_rows($db) > 0) {
                            echo "The workout '" . htmlspecialchars($title) . "' has been deleted.";
                        } else {
                            echo "Didn't find the workout named '" . htmlspecialchars($title) . "'.";
                        }
                    }
                }

                mysqli_close($db);
                ?>

                </br>
                </br>
                <a href="vizualizare.php" class="button">View All Workouts</a></br>
                <a href="admin_workouts.php" class="button">Back to Operations</a>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
