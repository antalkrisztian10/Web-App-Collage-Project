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
                <h2>Search News</h2>
                <form method="post" action="search_news.php">
                    <label>Title:
                        <input type="text" name="title">
                    </label>
                    <button type="submit" class="button">Search News</button>
                </form>
                <br>
                <a href="admin_news.php" class="button">Back to News</a>
            </div>
        </div>
    </div>
</main>

<?php include 'footer.php'; ?>
