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
            <h2>Delete Equipment</h2>
            </br>

            <?php
            $db = mysqli_connect("localhost", "root", "", "gym_genius");

            if (!$db) {
                die("Connection failed: " . mysqli_connect_error());
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = $_POST["name"];

                if (empty($name)) {
                    echo "You must enter the equipment's name.";
                } else {
                    $result = mysqli_query($db, "DELETE FROM admin_equipments WHERE name = '$name'");

                    if (!$result) {
                        die('Invalid query: ' . mysqli_error($db));
                    } else {
                        if (mysqli_affected_rows($db) > 0) {
                            echo "The equipment '" . htmlspecialchars($name) . "' has been deleted.";
                        } else {
                            echo "No equipment found with the name '" . htmlspecialchars($name) . "'.";
                        }
                    }
                }
            }

            mysqli_close($db);
            ?>

            </br>
            </br>
            <a href="admin_equipments.php" class="button">Back to Operations</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
