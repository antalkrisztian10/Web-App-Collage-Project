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
                <h2>All Membership Plans</h2>
                </br>

                <?php
                $db = new mysqli("localhost", "root", "", "gym_genius");

                if ($db->connect_error) {
                    die("Connection failed: " . $db->connect_error);
                }

                $sqlv = "SELECT id, plan_name, price, duration, benefits FROM membership_plans";
                $resultv = mysqli_query($db, $sqlv);

                if (!$resultv) {
                    die('Invalid query:' . mysqli_error($db));
                } else {
                    echo '<div class="table-responsive">';
                    echo "<table class=\"unstriped\">";
                    echo "<thead><tr><th><b>Plan Name</b></th><th><b>Price</b></th><th><b>Duration (days)</b></th><th><b>Benefits</b></th><th><b>Actions</b></th></tr></thead><tbody>";
                    while ($row = mysqli_fetch_array($resultv, MYSQLI_ASSOC)) {
                        echo "<tr><td>";
                        echo $row["plan_name"];
                        echo "</td><td>";
                        echo $row["price"];
                        echo "</td><td>";
                        echo $row["duration"];
                        echo "</td><td>";
                        echo $row["benefits"];
                        echo "</td><td>";
                        echo "<a href='edit_membership.php?id=" . $row["id"] . "' class='button'>Edit</a>";
                        echo "</td></tr>";
                    }
                    echo "</tbody></table>";
                    echo '</div>';
                }

                $db->close();
                ?>

                </br>
                <a href="admin_memberships.php" class="button">Back to Operations</a>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
