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
            <h1>Gym Recipes</h1>
        </div>
    </div>

    <?php
    $db = new mysqli("localhost", "root", "", "gym_genius");

    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    }

    $sql = "SELECT entry_id, title, type, purpose, description, image_url FROM admin_recipes";
    $result = $db->query($sql);

    if ($result->num_rows > 0) {
        echo '<div class="grid-x grid-padding-x">';
        while($row = $result->fetch_assoc()) {
            $type_class = strtolower($row['type']);
            echo '
                <div class="cell medium-4">
                    <div class="recipe ' . $type_class . '">
                        <h2>' . $row["title"] . '</h2>
                        <img src="' . $row["image_url"] . '" alt="Recipe Image">
                        <p>' . $row["description"] . '</p>
                        <a href="viz_recipe.php?id=' . $row["entry_id"] . '" class="button expanded">View Details</a>
                    </div>
                </div>';
        }
        echo '</div>';
    } else {
        echo "<p>No recipes found.</p>";
    }

    $db->close();
    ?>
</div>

<?php include 'footer.php'; ?>
