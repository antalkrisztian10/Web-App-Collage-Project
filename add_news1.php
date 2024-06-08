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
                <h2>Add News</h2>
                <form method="post" action="add_news.php" enctype="multipart/form-data">
                    <label>Title:
                        <input type="text" name="title" required>
                    </label>
                    <label>Description:
                        <textarea name="description" required></textarea>
                    </label>
                    <label>Content:
                        <textarea name="content" required></textarea>
                    </label>
                    <label>Image:
                        <input type="file" name="image_url" accept="image/*" required>
                    </label>
                    <button type="submit" class="button">Add News</button>
                </form>
                <br>
                <a href="admin_news.php" class="button">Back to News</a>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
