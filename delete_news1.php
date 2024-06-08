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
                <h2>Delete News</h2>
                <form method="post" action="delete_news.php">
                    <label>Title:
                        <input type="text" name="title" required>
                    </label>
                    <button type="submit" class="button">Delete News</button>
                </form>
                <br>
                <a href="admin_news.php" class="button">Back to News</a>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
