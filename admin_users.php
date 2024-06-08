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
            <center><h2>User Operations</h2></center>
            </br><center><a href="view_users.php" class="button">View All Users</a></center>
            </br><center><a href="add_user1.php" class="button">Add User</a></center>
            </br><center><a href="delete_user1.php" class="button">Delete User</a></center>
            </br><center><a href="search_user1.php" class="button">Search User</a></center>
        </div>
    </div>
</div>

<?php include 'footer.php'; ?>
