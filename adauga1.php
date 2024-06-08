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
            <h2>Add Workout</h2>
            <form method="post" action="adauga.php" enctype="multipart/form-data">
                <label>Title:
                    <input type="text" name="title" required>
                </label>
                <label>Difficulty:
                    <select name="difficulty" required>
                        <option value="beginner">Beginner</option>
                        <option value="intermediate">Intermediate</option>
                        <option value="advanced">Advanced</option>
                    </select>
                </label>
                <label>Description:
                    <textarea name="description" required></textarea>
                </label>
                <label>Details:
                    <textarea name="details" required></textarea>
                </label>
                <label>Duration:
                    <input type="text" name="duration" required>
                </label>
                <label>Image:
                    <input type="file" name="image_url" accept="image/*" required>
                </label>
                <button type="submit" class="button">Add Workout</button>
            </form>
            <br>
            <a href="admin_workouts.php" class="button">Back to Operations</a>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
