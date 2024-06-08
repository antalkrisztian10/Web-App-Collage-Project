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
                if (empty($_POST["title"])) {
                    $nameErr = "It's necessary to enter the recipe title.";
                    echo $nameErr;
                } else {
                    $title = $_POST["title"];
                    $sql = "SELECT entry_id, title, type, purpose, description, image_url FROM admin_recipes WHERE title LIKE '%$title%'";
                    $SW = 1;
                }

                if ($SW == 1) {
                    $result = mysqli_query($db, $sql);

                    $nr = mysqli_num_rows($result);
                    if ($nr > 0) {
                        echo "<table>";
                        echo "<thead><tr><th>Title</th><th>Type</th><th>Purpose</th><th>Description</th><th>Image</th><th>Actions</th></tr></thead><tbody>";
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr><td>";
                            echo $row["title"];
                            echo "</td><td>";
                            echo $row["type"];
                            echo "</td><td>";
                            echo $row["purpose"];
                            echo "</td><td>";
                            echo $row["description"];
                            echo "</td><td>";
                            echo "<img src='" . $row["image_url"] . "' alt='Recipe Image' style='width:200px;'>";
                            echo "</td><td>";
                            echo "<a href='edit_recipe.php?id=" . $row["entry_id"] . "' class='button'>Edit</a>";
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
                <a href="admin_recipes.php" class="button">Back to Recipes</a>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
