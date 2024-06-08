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
            <center><h2>Recipes Operations</h2></center>
            </br><center><a href="view_recipes.php" class="button">View All Recipes</a></center>
            </br><center><a href="add_recipe1.php" class="button">Add Recipe</a></center>
            </br><center><a href="delete_recipe1.php" class="button">Delete Recipe</a></center>
            </br><center><a href="search_recipe1.php" class="button">Search Recipe</a></center>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
