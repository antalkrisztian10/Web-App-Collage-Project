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
            <h2>Add Recipe</h2>
            <form method="post" action="add_recipe.php" enctype="multipart/form-data">
                <label>Title:
                    <input type="text" name="title" required>
                </label>
                <label>Type:
                    <select name="type" required>
                        <option value="vegan">Vegan</option>
                        <option value="nonvegan">Non-Vegan</option>
                    </select>
                </label>
                <label>Purpose:
                    <select name="purpose" required>
                        <option value="weightloss">Weight Loss</option>
                        <option value="weightgain">Weight Gain</option>
                    </select>
                </label>
                <label>Description:
                    <textarea name="description" required></textarea>
                </label>
                <label>Details:
                    <textarea name="details" required></textarea>
                </label>
                <label>Image:
                    <input type="file" name="image_url" accept="image/*" required>
                </label>
                <button type="submit" class="button">Add Recipe</button>
            </form>
            <br>
            <a href="admin_recipes.php" class="button">Back to Recipes</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
