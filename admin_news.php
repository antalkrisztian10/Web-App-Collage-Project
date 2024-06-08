<?php
require_once("connection.php");

if (!isset($_SESSION["user_id"]) || $_SESSION["user_id"] == "") {
    redirect("index.php");
}

include 'headerlogged.php';
?>

<div class="grid-container">
    <div class="grid-x grid-padding-x">
        <div class="large-12 cell">
            <center><h2>News Operations</h2></center>
            </br><center><a href="view_news.php" class="button">View All News</a></center>
            </br><center><a href="add_news1.php" class="button">Add News</a></center>
            </br><center><a href="delete_news1.php" class="button">Delete News</a></center>
            </br><center><a href="search_news1.php" class="button">Search News</a></center>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
