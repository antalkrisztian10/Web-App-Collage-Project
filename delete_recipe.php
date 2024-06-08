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
            <h2>Delete Recipe</h2>
            </br>

            <?php
            $db = mysqli_connect("localhost", "root", "", "gym_genius");

            $title = "";
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (empty($_POST["title"])) {
                    echo "It's necessary to type the recipe's name.";
                } else {
                    $title = $_POST["title"];
                    $result = mysqli_query($db, "DELETE FROM admin_recipes WHERE title = '$title'");

                    if (mysqli_affected_rows($db) > 0) {
                        echo "The recipe '" . htmlspecialchars($title) . "' has been deleted.";
                    } else {
                        echo "Didn't find the recipe named '" . htmlspecialchars($title) . "'.";
                    }
                }
            }

            mysqli_close($db);
            ?>

            </br>
            </br>
            <a href="view_recipes.php" class="button">View All Recipes</a></br>
            <a href="admin_recipes.php" class="button">Back to Recipes</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
