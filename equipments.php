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
            <h1>Equipments</h1>
        </div>
    </div>

    <?php

    $db = new mysqli("localhost", "root", "", "gym_genius");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $sql = "SELECT id, name, description, image_url FROM admin_equipments";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="grid-x grid-padding-x">';
        while($row = $result->fetch_assoc()) {
            echo '
            <div class="cell medium-4">
                <div class="equipment">
                    <h2>' . $row["name"] . '</h2>
                    <img src="' . $row["image_url"] . '" alt="Equipment Image" style="width: 400px; height: 400px;">
                    <p>' . $row["description"] . '</p>
                </div>
            </div>';
        }
        echo '</div>';
    } else {
        echo "<p>No equipment found.</p>";
    }

    $db->close();
    ?>
</div>

<?php include 'footer.php'; ?>
