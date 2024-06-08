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
            <h2>Add Membership Plan</h2>
            </br>

            <?php

            $db = new mysqli("localhost", "root", "", "gym_genius");

            if ($db->connect_error) {
                die("Connection failed: " . $db->connect_error);
            }

            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $plan_name = $_POST['plan_name'];
                $price = $_POST['price'];
                $duration = $_POST['duration'];
                $benefits = $_POST['benefits'];

                if (empty($plan_name)) {
                    $nameErr = "You must enter a plan name.";
                    echo $nameErr;
                } else {
                    $sql = "INSERT INTO membership_plans (plan_name, price, duration, benefits) VALUES ('$plan_name', '$price', '$duration', '$benefits')";
                    
                    $results = mysqli_query($db, $sql);
                    if (!$results) {
                        die('Invalid query: ' . mysqli_error($db));
                    } else {
                        echo "Membership plan added successfully.</br>";
                    }
                }
            }

            $db->close();
            ?>

            <a href="admin_memberships.php" class="button">Back to Membership Plans</a>
        </div>
    </div>
</div>
</div>

<?php include 'footer.php'; ?>
