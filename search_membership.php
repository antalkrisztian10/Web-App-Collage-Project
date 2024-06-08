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
                <h2>Search Results</h2>
                </br>

                <?php
                $db = mysqli_connect("localhost", "root", "", "gym_genius");

                $SW = 0;
                if (empty($_POST["plan_name"])) {
                    $nameErr = "It's necessary to enter the plan name.";
                    echo $nameErr;
                } else {
                    $plan_name = $_POST["plan_name"];
                    $sql = "SELECT id, plan_name, price, duration, benefits FROM membership_plans WHERE plan_name LIKE '%$plan_name%'";
                    $SW = 1;
                }

                if ($SW == 1) {
                    $result = mysqli_query($db, $sql);

                    $nr = mysqli_num_rows($result);
                    if ($nr > 0) {
                        echo "<table class=\"unstriped\">";
                        echo "<thead><tr><th>Plan Name</th><th>Price</th><th>Duration (days)</th><th>Benefits</th><th>Actions</th></tr></thead><tbody>";
                        while ($row = mysqli_fetch_assoc($result)) {
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
                    } else {
                        echo "</br>No records found matching the search!";
                    }
                }

                mysqli_close($db);
                ?>

                </br>
                <a href="admin_memberships.php" class="button">Back to Membership Plans</a>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
