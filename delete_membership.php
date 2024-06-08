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
            <h2>Delete Membership Plan</h2>
            </br>

            <?php
            $db = mysqli_connect("localhost", "root", "", "gym_genius");

            if (!$db) {
                die("Connection failed: " . mysqli_connect_error());
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $plan_name = $_POST["plan_name"];

                if (empty($plan_name)) {
                    echo "You must enter the membership plan's name.";
                } else {
                    $result = mysqli_query($db, "DELETE FROM membership_plans WHERE plan_name = '$plan_name'");

                    if (!$result) {
                        die('Invalid query: ' . mysqli_error($db));
                    } else {
                        if (mysqli_affected_rows($db) > 0) {
                            echo "The membership plan '" . htmlspecialchars($plan_name) . "' has been deleted.";
                        } else {
                            echo "No membership plan found with the name '" . htmlspecialchars($plan_name) . "'.";
                        }
                    }
                }
            }

            mysqli_close($db);
            ?>

            </br>
            </br>
            <a href="admin_memberships.php" class="button">Back to Operations</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
