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
            <h2>Search Results</h2>
            </br>

            <?php
            $db = mysqli_connect("localhost", "root", "", "gym_genius");

            $SW = 0;
            if (empty($_POST["name"])) {
                $nameErr = "You must enter the equipment's name.";
                echo $nameErr;
            } else {
                $name = $_POST["name"];
                $sql = "SELECT id, name, description, image_url FROM admin_equipments WHERE name LIKE '%$name%'";
                $SW = 1;
            }

            if ($SW == 1) {
                $result = mysqli_query($db, $sql);

                $nr = mysqli_num_rows($result);
                if ($nr > 0) {
                    echo "<table class=\"unstriped\">";
                    echo "<thead><tr><th>Name</th><th>Description</th><th>Image</th><th>Actions</th></tr></thead><tbody>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<tr><td>";
                        echo $row["name"];
                        echo "</td><td>";
                        echo $row["description"];
                        echo "</td><td>";
                        echo "<img src='" . $row["image_url"] . "' alt='Equipment Image' style='width:200px;'>";
                        echo "</td><td>";
                        echo "<a href='edit_equipment.php?id=" . $row["id"] . "' class='button'>Edit</a>";
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
            <a href="admin_equipments.php" class="button">Back to Operations</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
