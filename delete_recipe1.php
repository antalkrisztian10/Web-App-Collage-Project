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
        <form method="post" action="delete_recipe.php">
          <label>Title:
            <input type="text" name="title" required>
          </label>
          <button type="submit" class="button">Delete Recipe</button>
        </form>
        <br>
        <a href="admin_recipes.php" class="button">Back to Recipes</a>
      </div>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>
