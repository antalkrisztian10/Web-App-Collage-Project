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
        <div class="cell">
            <h1>Membership Plans</h1>
        </div>
    </div>

    <?php

    $db = new mysqli("localhost", "root", "", "gym_genius");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $sql = "SELECT id, plan_name, price, duration, benefits FROM membership_plans";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="grid-x grid-padding-x">';
        while($row = $result->fetch_assoc()) {
            echo '
            <div class="cell medium-4">
                <div class="membership-plan">
                    <h2>' . $row["plan_name"] . '</h2>
                    <p>Price: ' . $row["price"] . '</p>
                    <p>Duration: ' . $row["duration"] . ' days</p>
                    <p>Benefits: ' . $row["benefits"] . '</p>
                </div>
            </div>';
        }
        echo '</div>';
    } else {
        echo "<p>No membership plans found.</p>";
    }

    $db->close();
    ?>
</div>

<?php include 'footer.php'; ?>
