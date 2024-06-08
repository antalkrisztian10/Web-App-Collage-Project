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
            <h2>All Reviews</h2>
            </br>

            <?php
            $db = new mysqli("localhost", "root", "", "gym_genius");

            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }

            $sqlv = "SELECT reviews.id, reviews.rating, reviews.comment, reviews.review_date, admin_equipments.name AS equipment_name, users.username 
                     FROM reviews 
                     JOIN admin_equipments ON reviews.equipment_id = admin_equipments.id 
                     JOIN users ON reviews.user_id = users.id
                     ORDER BY reviews.review_date DESC";
            $resultv = mysqli_query($db, $sqlv);

            if (!$resultv) {
                die('Invalid query:' . mysqli_error($db));
            } else {
                echo "<table class=\"unstriped\">";
                echo "<thead><tr><th><b>Equipment</b></th><th><b>User</b></th><th><b>Rating</b></th><th><b>Comment</b></th><th><b>Date</b></th></tr></thead><tbody>";
                while ($row = mysqli_fetch_array($resultv, MYSQLI_ASSOC)) {
                    echo "<tr><td>";
                    echo $row["equipment_name"];
                    echo "</td><td>";
                    echo $row["username"];
                    echo "</td><td>";
                    echo $row["rating"];
                    echo "</td><td>";
                    echo $row["comment"];
                    echo "</td><td>";
                    echo $row["review_date"];
                    echo "</td></tr>";
                }
                echo "</tbody></table>";
            }

            $db->close();
            ?>

            </br>
            <a href="admin_reviews.php" class="button">Back to Operations</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
